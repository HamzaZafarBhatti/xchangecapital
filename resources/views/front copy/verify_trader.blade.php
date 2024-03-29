@extends('front.layout.master')

@section('title', 'Verify Currency Agents')

@section('css')
    <style>
        .verified ul {
            list-style-type: none;
        }
    </style>
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Verify Currency Agents</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Verify Currency Agents</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-xxl service py-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title pb-3">Verify Currency Agent</h3>
                    @if (!isset($verification_result))
                        @include('front.partials.trader_verify_form')
                    @else
                        <div class="traderVerificationResult">
                            @if (isset($is_verified) && $is_verified)
                                @include('front.partials.trader_verified')
                            @else
                                @include('front.partials.trader_unverified')
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
