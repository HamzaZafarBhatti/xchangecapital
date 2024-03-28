<?php

namespace App\Http\Controllers;

use App\Models\PaymentProof;
use Illuminate\Http\Request;

class PaymentProofController extends Controller
{
    public function index()
    {
        $paymentproofs = PaymentProof::with('user')->orderBy('id', 'DESC')->get();
        return view('admin.paymentproof.index', compact('paymentproofs'));
    }

    public function pending()
    {
        $paymentproofs = PaymentProof::with('user')->where('status', 0)->orderBy('id', 'DESC')->get();
        return view('admin.paymentproof.pending', compact('paymentproofs'));
    }

    public function approved()
    {
        $paymentproofs = PaymentProof::with('user')->where('status', 1)->orderBy('id', 'DESC')->get();
        return view('admin.paymentproof.approved', compact('paymentproofs'));
    }

    public function declined()
    {
        $paymentproofs = PaymentProof::with('user')->where('status', 2)->orderBy('id', 'DESC')->get();
        return view('admin.paymentproof.declined', compact('paymentproofs'));
    }

    public function approve($id)
    {
        $data = PaymentProof::find($id);
        $res = $data->update(['status' => 1]);
        if ($res) {
            return back()->with('success', 'Payment Proof was Successfully approved!');
        } else {
            return back()->with('alert', 'Problem With Approving Payment Proof');
        }
    }

    public function decline($id)
    {
        $data = PaymentProof::find($id);
        $res = $data->update(['status' => 2]);
        if ($res) {
            return back()->with('success', 'Payment Proof was Successfully declined!');
        } else {
            return back()->with('alert', 'Problem With Declining Payment Proof');
        }
    }

    public function delete($id)
    {
        $data = PaymentProof::find($id);
        unlink('asset/payment_proofs/' . $data->image);
        $res =  $data->delete();
        if ($res) {
            return back()->with('success', 'Payment Proof was Successfully deleted!');
        } else {
            return back()->with('alert', 'Problem With Deleting Payment Proof');
        }
    }

    public function approve_multi(Request $request)
    {
        // return $request;
        foreach ($request->ids as $id) {
            $data = PaymentProof::find($id);
            $res = $data->update(['status' => 1]);
        }
        return 1;
    }
}
