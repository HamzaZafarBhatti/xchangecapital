<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ContentPage;
use App\Models\Faq;
use App\Models\MarketPrice;
use App\Models\PaymentProof;
use App\Models\ReferralWithdrawLog;
use App\Models\TopEarner;
use App\Models\User;
use App\Models\Withdraw;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::latest()->take(5)->get();
        $registrations = User::latest()->take(5)->get();
        $whithdraws = collect();
        $whithdraws->push(Withdraw::with('user:id,name')->where('status', 1)->latest('id')->take(5)->get());
        $whithdraws->push(ReferralWithdrawLog::with('user:id,name')->where('status', 1)->latest('id')->take(5)->get());
        $whithdraws = $whithdraws->flatten(1)->sortByDesc('created_at')->take(5);
        return view('front.index', compact('blogs', 'registrations', 'whithdraws'));
    }
    public function about()
    {
        return view('front.about');
    }
     public function arbitrage_business_training()
    {
        return view('front.arbitrage_business_training');
    }
    public function how_it_works()
    {
        return view('front.how_it_works');
    }
    public function foreign_currency_resellers()
    {
        $vendors = User::with('bank_detail.bank')->role('Vendor')->get();
        return view('front.foreign_currency_resellers', compact('vendors'));
    }
    public function verify_trader()
    {
        return view('front.verify_trader');
    }
    public function do_verify_trader(Request $request)
    {
        $data = verify_trader($request->account_id);
        return view('front.verify_trader', $data);
    }
    public function payment_proofs()
    {
        $proofs = PaymentProof::with('user')->approved()->latest('id')->get();
        return view('front.payment_proofs', compact('proofs'));
    }
    public function blogs()
    {
        $blogs = Blog::published()->latest('post_date')->get();
        return view('front.blogs', compact('blogs'));
    }
    public function blog($id)
    {
        $blog = Blog::find($id);
        return view('front.blog', compact('blog'));
    }
    public function faq()
    {
        $faqs = Faq::all();
        return view('front.faq', compact('faqs'));
    }
    public function privacy_policy()
    {
        $page = ContentPage::where('key', 'privacy_policy')->pluck('value');
        return view('front.privacy_policy', compact('page'));
    }
    public function terms_of_service()
    {
        $page = ContentPage::where('key', 'terms_of_service')->pluck('value');
        return view('front.terms_of_service', compact('page'));
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function disclaimer()
    {
        $page = ContentPage::where('key', 'disclaimer')->pluck('value');
        return view('front.disclaimer', compact('page'));
    }
    public function top_traders()
    {
        $topearners = TopEarner::with('user')->orderBy('amount', 'DESC')->take(50)->get();
        return view('front.top_traders', compact('topearners'));
    }
    public function exclusive_offers()
    {
        $page = ContentPage::where('key', 'exclusive_offers')->pluck('value');
        return view('front.exclusive_offers', compact('page'));
    }

    public function market_rates()
    {
        $market_prices = MarketPrice::whereIsActive(1)->get();
        return view('front.market_rates', compact('market_prices'));
    }
}
