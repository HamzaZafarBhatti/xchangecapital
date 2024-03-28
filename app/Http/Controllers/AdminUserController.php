<?php

namespace App\Http\Controllers;

use App\Events\AccountVerification;
use App\Mail\AccountVerificationEmail;
use App\Models\BlackmarketLog;
use App\Models\Country;
use App\Models\FundWalletLog;
use App\Models\ReferralLog;
use App\Models\ReferralWithdrawLog;
use App\Models\TransferBalanceLog;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class AdminUserController extends Controller
{
    public function index()
    {
        //
        $roleIds = config('app.userVendorRoleIds');
        $roleIds = explode(',', $roleIds);
        $records = User::with("roles", "country", "parent")->whereHas("roles", function ($q) use ($roleIds) {
            $q->whereIn("id", $roleIds);
        })->latest('id')->get();
        return view('admin.users.index', compact('records'));
    }

    public function kyc_index()
    {
        //
        $roleIds = config('app.userVendorRoleIds');
        $roleIds = explode(',', $roleIds);
        $records = User::with('country')
            ->whereNotNull('birthdate')
            ->whereNotNull('document_type_id')
            ->whereNotNull('document_pic')
            ->whereNotNull('selfie')
            // ->whereHas("roles", function ($q) use ($roleIds) {
            //     $q->whereIn("id", $roleIds);
            // })
            ->latest('id')->get();
        return view('admin.users.kyc_index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $user_account_id = $user->account_id;
        $transfer_logs = TransferBalanceLog::with('vendor', 'user')->where('vendor_account_id', $user_account_id)->orWhere('user_account_id', $user_account_id)->latest()->get();
        $downlines = ReferralLog::with('downline:id,name,username,email,account_id')->where('upline_id', $user->id)->latest('id')->get();
        $black_market_logs = BlackmarketLog::where('user_id', $user->id)->latest('id')->get();
        $fund_wallet_logs = FundWalletLog::with('user')->where('user_id', $user->id)->latest('id')->get();
        $ref_withdraws = ReferralWithdrawLog::where('user_id', $user->id)->latest('id')->get();
        $withdraws = Withdraw::where('user_id', $user->id)->latest('id')->get();
        $countries = Country::where('is_active', 1)->get();
        $user_document_url = asset($user->get_user_document);
        $ext = pathinfo($user_document_url);
        if (isset($ext['extension'])) {
            $ext = $ext['extension'];
        } else {
            $ext = null;
        }
        return view('admin.users.edit', compact(
            'user',
            'ext',
            'user_document_url',
            'transfer_logs',
            'downlines',
            'black_market_logs',
            'fund_wallet_logs',
            'withdraws',
            'countries',
            'ref_withdraws'
        ));
    }

    public function update_password(Request $request, $id)
    {
        try {
            $request->validate([
                'password' => 'required|confirmed',
            ]);
            $user = User::find($id);
            $user->update($request->only('password'));
            return redirect()->route('admin.users.index')->with('success', 'User password updated!');
        } catch (\Throwable $th) {
            Log::error('Error! ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function kyc_info($id)
    {
        //
        $user = User::find($id);
        $user_document_url = asset($user->get_user_document);
        $ext = pathinfo($user_document_url);
        if (isset($ext['extension'])) {
            $ext = $ext['extension'];
        } else {
            $ext = null;
        }
        return view('admin.users.kyc_info', compact('user', 'ext', 'user_document_url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        try {
            $data = $request->except('_token', '_method');
            $user->update($data);
            return redirect()->route('admin.users.index')->with('success', 'User updated!');
        } catch (\Throwable $th) {
            Log::error('Error! ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        try {
            $user->delete();
            return back()->with('deleted', 'User deleted!');
        } catch (\Throwable $th) {
            Log::error('Error! ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function makeVendor($id)
    {
        try {
            $user = User::find($id);
            $user->assignRole('Vendor');
            return back()->with('success', 'User has become vendor!');
        } catch (Throwable $th) {
            Log::error('Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function unmakeVendor($id)
    {
        try {
            $user = User::find($id);
            $user->removeRole('Vendor');
            return back()->with('success', 'User role has been removed!');
        } catch (Throwable $th) {
            Log::error('Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function block($id)
    {
        try {
            $user = User::find($id);
            $user->update(['is_blocked' => 1]);
            return back()->with('success', 'User has been blocked!');
        } catch (Throwable $th) {
            Log::error('Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function unblock($id)
    {
        try {
            $user = User::find($id);
            $user->update([
                'is_blocked' => 0,
                'unblocked_at' => now()
            ]);
            return back()->with('success', 'User has been unblocked!');
        } catch (Throwable $th) {
            Log::error('Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function do_verify_account(Request $request)
    {
        try {
            $user = User::find($request->user_id);
            $user->update([
                'is_verified' => 1
            ]);
            // Mail::to($user->email)->send(new AccountVerificationEmail($user->name));
            return back()->with('success', 'User has been verified!');
        } catch (Throwable $th) {
            Log::error('Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function do_un_verify_account(Request $request)
    {
        try {
            $user = User::find($request->user_id);
            $user->update([
                'is_verified' => 0
            ]);
            return back()->with('success', 'User has been unverified!');
        } catch (Throwable $th) {
            Log::error('Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }

    public function delete_verification(Request $request)
    {
        try {
            $user = User::find($request->user_id);
            $user->update([
                'is_verified' => 0,
                'birthdate' => null,
                'document_type_id' => null,
                'document_pic' => null,
                'selfie' => null,
            ]);
            return back()->with('success', 'User KYC details has been deleted!');
        } catch (Throwable $th) {
            Log::error('Error: ' . $th->getMessage());
            return back()->with('error', 'Something went wrong!');
        }
    }
}
