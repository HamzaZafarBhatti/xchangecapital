@extends('user.layout.app')

@section('title', 'Fund Wallet')

@section('css')
    <style>
        .vr {
            width: 2px;
        }

        .text-yellow {
            color: yellow;
        }

        .heading {
            border-bottom: 1px solid #ccc;
            padding: 0 0 .25rem;
            margin-bottom: 1rem;
        }
    </style>
@endsection

@section('content')
    <div class="text-center mb-3">
        <h1>Buy Capital Token Order from our Merchants</h1>
        <p>Buy SafeCapital Token (SCT) from any of the available merchants below</p>
        <h5>- Current Average (SCT) price: ₦500.</h5>
        <h5>- If all merchants are sold-out for the day, check back from 7:00 am the next day.</h5>
        <h5>- Select any of the available merchants below, click on Buy SafeCapital Token (SCT)</h5>
        <h5>- Insert the desired amount you want to buy and follow payment instructions. Click on the Appeal button if you
            encounter any issues with your order.</h5>
    </div>
    <div class="row">
        <div class="col-md-4">
            @foreach ($vendors as $vendor)
                <div class="card">
                    <div class="card-body">
                        <h3 class="heading">Merchant ({{ $vendor->name }})</h3>
                        <h5>Selling Price of SafeCapital Token: NGN {{ $vendor->sct_sell_price }}</h5>
                        <h5>Total SafeCapital (SCT): {{ $vendor->sct_wallet }}</h5>
                        <h5>Amount Worth in Naira: N{{ $vendor->sct_wallet * $vendor->sct_sell_price }}</h5>
                        <h5>Status: {{ $vendor->sct_available ? 'Available' : 'Unavailable' }}</h5>
                        <h5>Payment: Bank Transfer</h5>
                        <a href="{{ route('user.buy_capital.index', $vendor->id) }}" type="button"
                            class="btn btn-primary w-100 mt-1">Buy
                            Capital (SCT)</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
@endsection
