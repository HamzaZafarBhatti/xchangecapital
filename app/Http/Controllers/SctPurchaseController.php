<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class SctPurchaseController extends Controller
{
    //
    public function index()
    {
        $transactions = Transaction::with('user')->where('merchant_id', auth()->user()->id)->latest()->get();
        return view('user.capital_purchases.index', compact('transactions'));
    }

    public function accept($id)
    {
        $transaction = Transaction::find($id);
        $merchant = auth()->user();
        $user = User::find($transaction->user_id);
        if($merchant->sct_wallet < $transaction->sct_amount) {
            return redirect()->back()->with('error', 'Insufficient SCT balance');
        } 
        $merchant->sct_wallet -= $transaction->sct_amount;
        $merchant->save();
        $user->sct_wallet += $transaction->sct_amount;
        $user->save();
        $transaction->status = 'accepted';
        $transaction->save();

        return redirect()->back()->with('success', 'SCT balance Transferred');
    }

    public function reject($id)
    {
        $transaction = Transaction::find($id);

        $transaction->status = 'rejected';
        $transaction->save();

        return redirect()->back()->with('success', 'SCT balance request is rejected');
    }
}
