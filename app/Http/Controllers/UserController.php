<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Mail\GeneralEmail;
use App\Models\BankUser;
use App\Models\BlackmarketLog;
use App\Models\ContentPage;
use App\Models\Country;
use App\Models\FundWalletLog;
use App\Models\MarketPrice;
use App\Models\PaymentProof;
use App\Models\ReferralLog;
use App\Models\ReferralWithdrawLog;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\TransferBalanceLog;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Http;
use Throwable;
use GuzzleHttp\Client;

class UserController extends Controller
{
    //
    public function login()
    {
        return view('user.auth.login');
    }

    public function do_login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function register(Request $request)
    {
        $referral = $request->referral;
        $countries = Country::active()->get();
        return view('user.auth.register', compact('referral', 'countries'));
    }

    public function do_register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'max:50'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $parent_id = null;
        if ($request->has('referral')) {
            $request->validate([
                'referral' => ['required', 'string']
            ]);
            $referral_user = User::where('username', $request->referral)->first();
            $parent_id = $referral_user->id;
        }

        $bytes = random_bytes(5);
        $account_id = bin2hex($bytes);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_id' => $request->country_id,
            'account_id' => $account_id,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(10),
            'parent_id' => $parent_id,
        ]);

        $user->email_verified_at = now();
        $user->save();

        $user->assignRole('User');

        // event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function dashboard()
    {
        $user_account_id = auth()->user()->account_id;
        $user_id = auth()->user()->id;
        $transfer_logs = TransferBalanceLog::with('vendor', 'user')->where('vendor_account_id', $user_account_id)->orWhere('user_account_id', $user_account_id)->latest()->take(5)->get();
        $blackMarketLogObj = BlackmarketLog::where('user_id', $user_id);
        $blackmarketlogs = $blackMarketLogObj->latest('id')->get();
        $blackmarket_logs = $blackMarketLogObj->where('status', 1)->latest()->take(5)->get();
        $withdraws = Withdraw::where('user_id', $user_id)->latest()->take(5)->get();
        return view('user.dashboard', compact('transfer_logs', 'user_account_id', 'blackmarket_logs', 'blackmarketlogs', 'withdraws'));
    }

    public function market_rates()
    {
        $market_prices = MarketPrice::whereIsActive(1)->get();
        return view('user.market_rates', compact('market_prices'));
    }

    public function merchants()
    {
        $vendors = User::role('Vendor')->when(auth()->user()->hasRole('Vendor'), fn($q) => $q->whereNot('id', auth()->user()->id))->get();
        $market_price = MarketPrice::where('symbol', 'SCT')->first();
        return view('user.merchants', compact('vendors', 'market_price'));
    }

    public function buy_capital($merchant_id)
    {
        $vendor = User::find($merchant_id);
        $market_price = MarketPrice::where('symbol', 'SCT')->first();
        return view('user.buy_capital', compact('vendor', 'market_price'));
    }

    public function do_buy_capital(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric',
            'merchant_id' => 'required'
        ]);
        $vendor = User::with('bank_detail')->find($data['merchant_id']);
        $settings = Setting::first();
        $market_price = MarketPrice::where('symbol', 'SCT')->first();
        $order_id = uniqid();
        $transaction = Transaction::where('user_id', auth()->user()->id)->where('status', 'pending')->first();
        if (!$transaction) {
            $transaction = Transaction::create([
                'order_id' => $order_id,
                'sct_amount' => $data['amount'],
                'ngn_amount' => $data['amount'] * $market_price->local_rate,
                'merchant_id' => $vendor->id,
                'user_id' => auth()->user()->id,
                'status' => 'pending'
            ]);
        }
        return view('user.buy_capital_preview', compact('vendor', 'transaction', 'settings'));
    }

    public function buy_capital_complete(Request $request)
    {
        $transaction = Transaction::find($request->transaction_id);
        if ($image = $request->file('proof')) {
            $filename = 'proof_' . time() . '.' . $image->getClientOriginalExtension();
            $location =  $transaction->getTransactionPath() . $filename;
            Image::make($image)->save($location);
            $data['image'] = $filename;
            $transaction->update($data);
        }
        return redirect()->route('user.buy_capital.merchants');
    }

    public function fund_wallet_callback(Request $request)
    {
        Log::info('request');
        Log::info($request);
        $tx_ref = $request->tx_ref;
        $log = FundWalletLog::where('ref_id', $tx_ref)->first();
        if ($request->status === 'failed') {
            $log->update(['status' => 2]);
            return redirect()->route('user.fund_wallet')->with('error', 'Payment failed');
        }
        if ($request->status === 'cancelled') {
            $log->update(['status' => 3]);
            return redirect()->route('user.fund_wallet')->with('error', 'Payment cancelled');
        }
        $transaction_id = $request->transaction_id;
        $user = User::find(auth()->user()->id);
        $setting = Setting::first();
        if ($log->currency === 'usd') {
            $data = [
                'usd_wallet' => $user->usd_wallet + $log->requested_amount,
            ];
            $bonus = $setting->usd_referral_bonus;
        } else {
            $data = [
                'sct_wallet' => $user->sct_wallet + $log->requested_amount,
            ];
            $bonus = $setting->gbp_referral_bonus;
        }
        $amount = ($log->converted_amount * $bonus / 100);
        if (!empty($user->parent)) {
            $referral_log = ReferralLog::where('upline_id', $user->parent->id)->where('downline_id', $user->id)->first();
            if (empty($referral_log)) {
                ReferralLog::create([
                    'upline_id' => $user->parent->id, 'downline_id' => $user->id, 'currency' => '₦', 'amount' => $amount, 'type' => 1
                ]);
                $user->parent->update(['ref_ngn_wallet' => $user->parent->ref_ngn_wallet + $amount]);
            }
        }
        $user->update($data);
        $log->update(['status' => 1, 'transaction_id' => $transaction_id]);
        return redirect()->route('user.fund_wallet')->with('success', 'Payment successful');
    }

    public function transfer_balance()
    {
        $user_account_id = auth()->user()->account_id;
        $transfer_logs = TransferBalanceLog::with('vendor', 'user')->where('vendor_account_id', $user_account_id)->orWhere('user_account_id', $user_account_id)->latest()->get();
        return view('user.transfer_balance', compact('transfer_logs', 'user_account_id'));
    }

    public function do_transfer_balance(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:10',
            'account_id' => 'required',
            'pin' => 'required',
            'currency' => 'required|in:usd,gbp'
        ]);
        $user = auth()->user();
        if (!$user->pin) {
            return back()->with('error', 'Please setup your Pin!');
        }
        if ($user->pin != $request->pin) {
            return back()->with('error', 'You have entered wrong Pin!');
        }
        $customer = User::with('parent')->where('account_id', $request->account_id)->first();
        if (!$user->hasRole('Vendor')) {
            return back()->with('error', 'Only APPROVED CURRENCY AGENTS can be able to Transfer Foreign Currencies of US Dollars or British Pounds to anyone!');
        }
        if (!$user->is_verified) {
            return back()->with('error', 'Your account is not verified!');
        }
        if (!$customer) {
            return back()->with('error', 'Invalid ACCOUNT ID!');
        }
        if ($user->account_id == $request->account_id) {
            return back()->with('error', 'You cannot transfer balance to yourself!');
        }
        $setting = Setting::first();
        if ($request->currency == 'usd') {
            if ($request->amount < $setting->min_deposit_by_vendor) {
                return back()->with('error', 'Minimum amount to transfer is $' . $setting->min_deposit_by_vendor);
            }
            if ($request->amount > $user->usd_wallet) {
                return back()->with('error', 'Your entered amount is more than your USD balance');
            }
            $logdata['ref_id'] = Str::random(10);
            $logdata['vendor_account_id'] = $user->account_id;
            $logdata['currency'] = $request->currency;
            $logdata['amount'] = $request->amount;
            $logdata['user_account_id'] = strtolower($request->account_id);
            $user_usd_wallet = $user->usd_wallet - $request->amount;
            $customer_usd_wallet = $customer->usd_wallet + $request->amount;
            $market_price = MarketPrice::whereSymbol('$')->pluck('local_rate');
            $amount = ($logdata['amount'] * $setting->usd_referral_bonus / 100) * $market_price[0];
            // return $logdata;
            DB::transaction(function () use ($user_usd_wallet, $customer_usd_wallet, $logdata, $user, $customer, $amount) {
                $user->update(['usd_wallet' => $user_usd_wallet]);
                $customer->update(['usd_wallet' => $customer_usd_wallet]);
                if (!empty($customer->parent)) {
                    $referral_log = ReferralLog::where('upline_id', $customer->parent->id)->where('downline_id', $customer->id)->first();
                    if (empty($referral_log)) {
                        ReferralLog::create([
                            'upline_id' => $customer->parent->id,
                            'downline_id' => $customer->id,
                            'currency' => '₦',
                            'amount' => $amount,
                            'type' => 1,
                            'transfer_balance_log_ref_id' => $logdata['ref_id'],
                        ]);
                        $customer->parent->update(['ref_ngn_wallet' => $customer->parent->ref_ngn_wallet + $amount]);
                    }
                }
                TransferBalanceLog::create($logdata);
            });
            $amount = '$ ' . $request->amount;
        } else {
            if ($request->amount < $setting->min_deposit_by_vendor) {
                return back()->with('error', 'Minimum amount to transfer is £' . $setting->min_deposit_by_vendor);
            }
            if ($request->amount > $user->sct_wallet) {
                return back()->with('error', 'Your entered amount is more than your GBP balance');
            }
            $logdata['ref_id'] = Str::random(10);
            $logdata['vendor_account_id'] = $user->account_id;
            $logdata['currency'] = $request->currency;
            $logdata['amount'] = $request->amount;
            $logdata['user_account_id'] = strtolower($request->account_id);
            $user_sct_wallet = $user->sct_wallet - $request->amount;
            $customer_sct_wallet = $customer->sct_wallet + $request->amount;
            $market_price = MarketPrice::whereSymbol('£')->pluck('local_rate');
            $amount = ($logdata['amount'] * $setting->gbp_referral_bonus / 100) * $market_price[0];
            DB::transaction(function () use ($user_sct_wallet, $customer_sct_wallet, $logdata, $user, $customer, $amount) {
                $user->update(['sct_wallet' => $user_sct_wallet]);
                $customer->update(['sct_wallet' => $customer_sct_wallet]);
                if (!empty($customer->parent)) {
                    $referral_log = ReferralLog::where('upline_id', $customer->parent->id)->where('downline_id', $customer->id)->first();
                    if (empty($referral_log)) {
                        ReferralLog::create([
                            'upline_id' => $customer->parent->id,
                            'downline_id' => $customer->id,
                            'currency' => '₦',
                            'amount' => $amount,
                            'type' => 1,
                            'transfer_balance_log_ref_id' => $logdata['ref_id'],
                        ]);
                        $customer->parent->update(['ref_ngn_wallet' => $customer->parent->ref_ngn_wallet + $amount]);
                    }
                }
                TransferBalanceLog::create($logdata);
            });
            $amount = '£ ' . $request->amount;
        }
        return redirect()->route('user.transfer_balance')->with('success', 'Amount ' . $amount . ' was Successfully Transferred to Account ID: ' . $customer->account_id . ' - ' . $customer->name);
    }

    public function reverse_transfer_balance($id)
    {
        $log = TransferBalanceLog::with('vendor', 'user.parent')->find($id);
        if ($log->is_reversed) {
            return back()->with('error', 'This transaction cannot be reversed. Contact Administration to dispute this transaction.');
        }
        if ($log->currency == 'usd') {
            if ($log->amount > $log->user->usd_wallet) {
                return back()->with('error', 'Unable to reverse the transaction as customer have less amount in their wallet. Contact Administration to dispute this transaction.');
            }
            $update_upline = 0;
            $ref_ngn_wallet = 0;
            $referral_log = null;
            if (!empty($log->user->parent)) {
                $referral_log = ReferralLog::where('transfer_balance_log_ref_id', $log->ref_id)->first();
                if (!empty($referral_log)) {
                    if ($referral_log->amount > $log->user->parent->ref_ngn_wallet) {
                        return back()->with('error', 'Unable to reverse the transaction as customer have less amount in their wallet. Contact Administration to dispute this transaction.');
                    }
                    $update_upline = 1;
                    $ref_ngn_wallet = $log->user->parent->ref_ngn_wallet - $referral_log->amount;
                }
            }
            $vendor_usd_wallet = $log->vendor->usd_wallet + $log->amount;
            $user_usd_wallet = $log->user->usd_wallet - $log->amount;
            DB::transaction(function () use ($user_usd_wallet, $vendor_usd_wallet, $log, $update_upline, $ref_ngn_wallet, $referral_log) {
                $log->user->update(['usd_wallet' => $user_usd_wallet]);
                $log->vendor->update(['usd_wallet' => $vendor_usd_wallet]);
                $log->update(['is_reversed' => true]);
                if ($update_upline) {
                    $log->user->parent->update(['ref_ngn_wallet' => $ref_ngn_wallet]);
                    $referral_log->delete();
                }
            });
        } else {
            if ($log->amount > $log->user->sct_wallet) {
                return back()->with('error', 'Unable to reverse the transaction as customer have less amount in their wallet. Contact Administration to dispute this transaction.');
            }
            $update_upline = 0;
            $ref_ngn_wallet = 0;
            $referral_log = null;
            if (!empty($log->user->parent)) {
                $referral_log = ReferralLog::where('transfer_balance_log_ref_id', $log->ref_id)->first();
                if (!empty($referral_log)) {
                    if ($referral_log->amount > $log->user->parent->ref_ngn_wallet) {
                        return back()->with('error', 'Unable to reverse the transaction as customer have less amount in their wallet. Contact Administration to dispute this transaction.');
                    }
                    $update_upline = 1;
                    $ref_ngn_wallet = $log->user->parent->ref_ngn_wallet - $referral_log->amount;
                }
            }
            $vendor_sct_wallet = $log->vendor->sct_wallet + $log->amount;
            $user_sct_wallet = $log->user->sct_wallet - $log->amount;
            DB::transaction(function () use ($user_sct_wallet, $vendor_sct_wallet, $log, $update_upline, $ref_ngn_wallet, $referral_log) {
                $log->user->update(['sct_wallet' => $user_sct_wallet]);
                $log->vendor->update(['sct_wallet' => $vendor_sct_wallet]);
                $log->update(['is_reversed' => true]);
                if ($update_upline) {
                    $log->user->parent->update(['ref_ngn_wallet' => $ref_ngn_wallet]);
                    $referral_log->delete();
                }
            });
        }
        return back()->with('success', 'Amount reversed successfully.');
    }

    public function withdraw()
    {
        $user_bank_details = BankUser::with('bank')->where('user_id', auth()->user()->id)->first();
        $withdraws = Withdraw::where('user_id', auth()->user()->id)->latest('id')->get();
        // return $withdraws;
        return view('user.withdraw', compact('user_bank_details', 'withdraws'));
    }

    public function do_withdraw(Request $request)
    {
        // $today = Carbon::now();
        // $day_of_week = $today->format('l');
        $day_of_week = date("l");
        // return $day_of_week;
        if (!in_array($day_of_week, ['Wednesday', 'Thursday'])) {
            return back()->with('warning', 'You can WITHDRAW your NGN Wallet every Wednesday and Thursday to your BANK Account from 7am to 10am weekly.');
        }
        $today_hour = date('H');

        // return $today_hour;
        // if ($today->hour < 7 || $today->hour > 10) {
        if ($today_hour < 7 || $today_hour >= 10) {
            return back()->with('warning', 'You can cashout your NGN Wallet every Wednesday and Thursday from 7am to 10am.');
        }
        $request->validate([
            'amount' => 'required|integer|min:10',
            'bank_user_id' => 'required',
            'pin' => 'required'
        ]);
        $bank_user = BankUser::find($request->bank_user_id);
        $user = auth()->user();
        $setting = Setting::first();
        if (!$user->is_verified) {
            return back()->with('error', 'Your account is not verified!');
        }
        if ($user->is_ngn_wallet_withdrawn) {
            return back()->with('error', 'Please be informed that you can only place a withdrawal 1 time per week either one time on WEDNESDAY or on THURSDAY!');
        }
        if (!$user->pin) {
            return back()->with('error', 'Please setup your Pin!');
        }
        if ($user->pin != $request->pin) {
            return back()->with('error', 'You have entered wrong Pin!');
        }
        $actual_amount = $request->amount;
        $bank_user_id = $request->bank_user_id;
        $after_fee_amount = $actual_amount - ($actual_amount * $setting->withdraw_fee / 100);
        // return $after_fee_amount;
        if ($actual_amount < $setting->min_withdrawal) {
            return back()->with('error', 'Minimum amount to withdraw is ₦' . $setting->min_withdrawal);
        }
        if ($actual_amount > $user->ngn_wallet) {
            return back()->with('error', 'Your entered amount is more than your NGN balance');
        }
        if ($actual_amount > $setting->max_withdrawal) {
            return back()->with('error', 'Maximum amount to withdraw is ₦' . $setting->max_withdrawal);
        }
        DB::transaction(function () use ($user, $actual_amount, $after_fee_amount, $bank_user_id) {
            $user->update([
                'ngn_wallet' => $user->ngn_wallet - $actual_amount,
                'is_ngn_wallet_withdrawn' => 1
            ]);
            $data = Withdraw::create([
                'user_id' => $user->id,
                'bank_user_id' => $bank_user_id,
                'amount' => $after_fee_amount,
                'status' => 0
            ]);
            // Mail::to($user->email)->send(new GeneralEmail($user->name, 'Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' is pending<br>Thanks for working with us.', 'Withdraw Request is pending'));
        });
        return redirect()->route('user.withdraw')->with('success', 'Amount ₦' . number_format($actual_amount, 2) . ' Withdrawal Request Successful to your Bank Account: ' . $bank_user->get_full_account);
    }

    public function withdraw_referral()
    {
        $user_bank_details = BankUser::with('bank')->where('user_id', auth()->user()->id)->first();
        $withdraws = ReferralWithdrawLog::where('user_id', auth()->user()->id)->latest('id')->get();
        // return $withdraws;
        return view('user.withdraw_referral', compact('user_bank_details', 'withdraws'));
    }

    public function do_withdraw_referral(Request $request)
    {
        // $today = Carbon::now();
        // $day_of_week = $today->format('l');
        $day_of_week = date("l");
        if ($day_of_week != 'Sunday') {
            return back()->with('warning', 'You can WITHDRAW your Referrals Earnings every Sunday to your BANK Account from 7am to 10am.');
        }
        $today_hour = date('H');
        // if ($today->hour < 7 || $today->hour > 10) {
        if ($today_hour < 7 || $today_hour >= 10) {
            return back()->with('warning', 'You can request your Referral Earnings Balance every Sundays from 7am to 10am.');
        }
        $request->validate([
            'amount' => 'required|integer|min:10',
            'bank_user_id' => 'required',
            'pin' => 'required'
        ]);
        $bank_user = BankUser::find($request->bank_user_id);
        $user = auth()->user();
        $setting = Setting::first();
        if (!$user->is_verified) {
            return back()->with('error', 'Your account is not verified!');
        }
        if ($user->is_ref_ngn_wallet_withdrawn) {
            return back()->with('alert', 'You can only withdraw once!');
        }
        if (!$user->pin) {
            return back()->with('error', 'Please setup your Pin!');
        }
        if ($user->pin != $request->pin) {
            return back()->with('error', 'You have entered wrong Pin!');
        }
        $actual_amount = $request->amount;
        $bank_user_id = $request->bank_user_id;
        $after_fee_amount = $actual_amount - ($actual_amount * $setting->referral_withdraw_fee / 100);
        // return $after_fee_amount;
        if ($actual_amount < $setting->min_withdrawal_referral) {
            return back()->with('error', 'Minimum amount to withdraw is ₦' . $setting->min_withdrawal_referral);
        }
        if ($actual_amount > $user->ref_ngn_wallet) {
            return back()->with('error', 'Your entered amount is more than your NGN balance');
        }
        if ($actual_amount > $setting->max_withdrawal_referral) {
            return back()->with('error', 'Maximum amount to withdraw is ₦' . $setting->max_withdrawal_referral);
        }
        DB::transaction(function () use ($user, $actual_amount, $after_fee_amount, $bank_user_id) {
            $user->update([
                'ref_ngn_wallet' => $user->ref_ngn_wallet - $actual_amount,
                'is_ref_ngn_wallet_withdrawn' => 1
            ]);
            $data = ReferralWithdrawLog::create([
                'user_id' => $user->id,
                'bank_user_id' => $bank_user_id,
                'amount' => $after_fee_amount,
                'status' => 0
            ]);
            // Mail::to($user->email)->send(new GeneralEmail($user->name, 'Referral Withdrawal request of ₦' . substr($data->amount, 0, 9) . ' is pending<br>Thanks for working with us.', 'Withdraw Request is pending', 1));
        });
        return redirect()->route('user.withdraw_referral')->with('success', 'Amount ₦' . number_format($actual_amount, 2) . ' Withdrawal Request Successful to your Bank Account: ' . $bank_user->get_full_account);
    }

    public function sell_to_blackmarket()
    {
        $blackMarketLogObj = BlackmarketLog::where('user_id', auth()->user()->id)->where('currency', 'sct');
        $logs = $blackMarketLogObj->latest('id')->get();
        $latest_log = $blackMarketLogObj->where('status', 0)->latest('id')->first();
        return view('user.sell_to_blackmarket', compact('logs', 'latest_log'));
    }

    public function do_sell_to_blackmarket(Request $request)
    {
        // return $request;
        // $today = Carbon::now();
        // $day_of_week = $today->format('l');
        // $days_not_allowed = ['Saturday', 'Sunday'];
        // if (in_array($day_of_week, $days_not_allowed)) {
        //     return back()->with('warning', 'You cannot use black market on Saturday and Sunday.');
        // }
        $request->validate([
            'amount_sold' => 'required|integer|min:10|max:35000',
            'amount_exchanged' => 'required|integer',
            'pin' => 'required',
        ]);
        $user = auth()->user();
        if (!$user->is_verified) {
            return back()->with('error', 'Your account is not verified!');
        }
        if (!$user->pin) {
            return back()->with('error', 'Please setup your Pin!');
        }
        if ($user->pin != $request->pin) {
            return back()->with('error', 'You have entered wrong Pin!');
        }
        $setting = Setting::first();
        $amount_sold = $request->amount_sold;
        $ref_id = Str::random(10);
        // return $after_fee_amount;
        if ($amount_sold > $user->sct_wallet) {
            return back()->with('error', 'Your entered amount is more than your SCT balance');
        }
        $user_data = [
            'sct_wallet' => $user->sct_wallet - $amount_sold
        ];
        $market_price = $setting->sct_to_usd;
        $amount_exchanged = $market_price * $amount_sold;
        $black_market_data = [
            'ref_id' => $ref_id,
            'user_id' => $user->id,
            'amount_sold' => $amount_sold,
            'amount_exchanged' => $amount_exchanged,
            'currency' => 'sct',
            'status' => 0,
            // 'completed_at' => Carbon::now()->addSeconds($setting->sct_convert_time)
            'completed_at' => Carbon::now()->addHours($setting->sct_convert_time)
        ];
        // return $black_market_data;
        try {
            DB::transaction(function () use ($user, $user_data, $black_market_data) {
                $user->update($user_data);
                $black_market_log = BlackmarketLog::create($black_market_data);
                // Mail::to($user->email)->send(new GeneralEmail($user->name, 'Black Market Sell request of ' . $black_market_log->get_amount_sold . ' is pending<br>Thanks for working with us.', 'Black Market Sell Request is pending', 1));
            });
            return redirect()->route('user.sell_to_blackmarket')->with('success', 'Black Market Sell request is placed.');
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function get_amount_exchanged(Request $request)
    {
        $settings = Setting::first();
        // $market_price = MarketPrice::query();
        // if ($request->currency == 'usd') {
        //     $market_price = $market_price->where('symbol', '$');
        // } else {
        $market_price = $settings->sct_to_usd;
        // }
        // $market_price = $market_price->first();
        $amount_exchanged = $market_price * $request->amountSold;
        return $amount_exchanged;
    }

    public function sell_to_naira()
    {
        $blackMarketLogObj = BlackmarketLog::where('user_id', auth()->user()->id)->where('currency', 'usd');
        $logs = $blackMarketLogObj->latest('id')->get();
        $latest_log = $blackMarketLogObj->where('status', 0)->latest('id')->first();
        return view('user.sell_to_naira', compact('logs', 'latest_log'));
    }

    public function do_sell_to_naira(Request $request)
    {
        // return $request;
        // $today = Carbon::now();
        // $day_of_week = $today->format('l');
        // $days_not_allowed = ['Saturday', 'Sunday'];
        // if (in_array($day_of_week, $days_not_allowed)) {
        //     return back()->with('warning', 'You cannot use black market on Saturday and Sunday.');
        // }
        $request->validate([
            'amount_sold' => 'required|integer|min:10|max:35000',
            'amount_exchanged' => 'required|integer',
            'pin' => 'required',
        ]);
        $user = auth()->user();
        if (!$user->is_verified) {
            return back()->with('error', 'Your account is not verified!');
        }
        if (!$user->pin) {
            return back()->with('error', 'Please setup your Pin!');
        }
        if ($user->pin != $request->pin) {
            return back()->with('error', 'You have entered wrong Pin!');
        }
        $setting = Setting::first();
        $amount_sold = $request->amount_sold;
        $ref_id = Str::random(10);
        // return $after_fee_amount;
        if ($amount_sold > $user->usd_wallet) {
            return back()->with('error', 'Your entered amount is more than your SCT balance');
        }
        $user_data = [
            'usd_wallet' => $user->usd_wallet - $amount_sold
        ];
        $market_price = $setting->usd_to_naira;
        $amount_exchanged = $market_price * $amount_sold;
        $black_market_data = [
            'ref_id' => $ref_id,
            'user_id' => $user->id,
            'amount_sold' => $amount_sold,
            'amount_exchanged' => $amount_exchanged,
            'currency' => 'usd',
            'status' => 0,
            // 'completed_at' => Carbon::now()->addSeconds($setting->usd_convert_time)
            'completed_at' => Carbon::now()->addHours($setting->usd_convert_time)
        ];
        // return $black_market_data;
        try {
            DB::transaction(function () use ($user, $user_data, $black_market_data) {
                $user->update($user_data);
                $black_market_log = BlackmarketLog::create($black_market_data);
                // Mail::to($user->email)->send(new GeneralEmail($user->name, 'Black Market Sell request of ' . $black_market_log->get_amount_sold . ' is pending<br>Thanks for working with us.', 'Black Market Sell Request is pending', 1));
            });
            return redirect()->route('user.sell_to_naira')->with('success', 'Black Market Sell request is placed.');
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function get_naira_amount_exchanged(Request $request)
    {
        $settings = Setting::first();
        // $market_price = MarketPrice::query();
        // if ($request->currency == 'usd') {
        //     $market_price = $market_price->where('symbol', '$');
        // } else {
        $market_price = $settings->usd_to_naira;
        // }
        // $market_price = $market_price->first();
        $amount_exchanged = $market_price * $request->amountSold;
        return $amount_exchanged;
    }

    public function verify_trader()
    {
        return view('user.verify_trader');
    }

    public function do_verify_trader(Request $request)
    {
        $data = verify_trader($request->account_id);
        return view('user.verify_trader', $data);
    }

    public function change_pin()
    {
        return view('user.change_pin');
    }

    public function do_change_pin(Request $request)
    {
        $request->validate([
            'old_pin' => ['required', 'string'],
            'new_pin' => ['required', 'confirmed'],
        ]);
        if ($request->new_pin == '000000') {
            return back()->with('warning', 'Your new pin cannot be "000000"');
        }
        try {
            $user = $request->user();
            $old_pin = $user->pin;
            if ($old_pin && $old_pin != $request->old_pin) {
                return back()->with('error', 'You have entered wrong old pin!');
            }
            $user->update([
                'pin' => $request->new_pin
            ]);
            return back()->with('success', 'Pin changed');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function thankyou()
    {
        return view('user.thankyou');
    }

    public function referral()
    {
        $downlines = User::select('id', 'username', 'email')->withOnly('downline_referral_log')->where('parent_id', auth()->user()->id)->get();
        // return $downlines;
        return view('user.referrals', compact('downlines'));
    }

    public function exclusive_offers()
    {
        $page = ContentPage::where('key', 'exclusive_offers')->first();
        // return $page;
        return view('user.exclusive_offers', compact('page'));
    }

    public function upload_proof()
    {
        return view('user.upload_proof');
    }

    public function do_upload_proof(Request $request)
    {
        $request->validate([
            'caption' => 'required',
            'image' => 'required|file|mimes:png,jpg,jpeg|max:2048',
        ]);
        $data = $request->except('_token');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'proof_' . time() . '.jpg';
            $location = 'asset/payment_proofs/' . $filename;
            Image::make($image)->save($location);
            $data['image'] = $filename;
        }
        $data['user_id'] = auth()->user()->id;
        $res = PaymentProof::create($data);
        if ($res) {
            auth()->user()->update([
                'show_popup' => 0
            ]);
            return back()->with('success', 'Payment Proof uploaded Successfully!');
        } else {
            return back()->with('error', 'Problem uploading payment proof');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/app/login');
    }
}
