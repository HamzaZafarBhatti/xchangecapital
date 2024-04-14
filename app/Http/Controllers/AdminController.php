<?php

namespace App\Http\Controllers;

use App\Models\BlackmarketLog;
use App\Models\FundWalletLog;
use App\Models\Setting;
use App\Models\TransferBalanceLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    //
    public function login()
    {
        return view('admin.auth.login');
    }

    public function do_login(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('error', 'Oops! You have entered invalid credentials');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::guard()->logout();
        return redirect()->route('admin.login')->with('success', 'Just Logged Out!');
    }

    public function user_transfer_balance_logs()
    {
        $logs = TransferBalanceLog::with('vendor', 'user')->latest('id')->get();
        return view('admin.logs.transfer_balance', compact('logs'));
    }

    public function user_fund_wallet_logs()
    {
        $logs = FundWalletLog::with('user')->latest('id')->get();
        return view('admin.logs.fund_wallet', compact('logs'));
    }

    public function user_black_market_logs()
    {
        $logs = BlackmarketLog::with('user')->latest('id')->get();
        return view('admin.logs.black_market', compact('logs'));
    }

    public function delete_user_black_market_log($id)
    {
        try {
            $log = BlackmarketLog::with('user')->find($id);
            if ($log->currency == 'usd') {
                $update_data = [
                    'usd_wallet' => $log->user->usd_wallet + $log->amount_sold
                ];
            } else {
                $update_data = [
                    'sct_wallet' => $log->user->sct_wallet + $log->amount_sold
                ];
            }
            $log->user->update($update_data);
            $log->delete();
            return back()->with('success', 'Black Market Record Deleted!');
        } catch (\Throwable $th) {
            Log::error('Error! ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function account()
    {
        return view('admin.account.index');
    }

    public function account_update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $data = User::findOrFail(auth()->user()->id);
        $input = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        $res = $data->update($input);
        if ($res) {
            return back()->with('success', 'Update was Successful!');
        } else {
            return back()->with('alert', 'An error occured');
        }
    }
}
