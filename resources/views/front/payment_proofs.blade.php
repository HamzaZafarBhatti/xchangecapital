@extends('front.layout.master')

@section('title', 'Payment Proofs')

@section('css')
    <style>
        .img-class {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .img-container {
            width: 100%;
            height: 400px
        }
    </style>
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Payment Proofs</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Payment Proofs</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Payment Proofs</p>
            </div>
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                <h3><em><span style="color: #000080;"><strong>Withdrawal PROOF from our esteemed traders on
                                ARBYVEST.</strong></span></em></h3>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                @forelse ($proofs as $item)
                    <div class="col-lg-4">
                        <div class="testimonial-item">
                            <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                                <div class="btn-square bg-white border rounded-circle">
                                    <i class="fa fa-quote-right fa-2x text-primary"></i>
                                </div>
                                {{ $item->caption }}
                            </div>
                            <div class="img-container">
                                <img src="{{ asset('/asset/payment_proofs/' . $item->image) }}" alt=""
                                    class="img-class">
                            </div>
                            {{-- <img class="rounded-circle mb-3 w-25" src="{{ asset($item->user->image ? '/asset/images/' . $item->user->image : 'asset/user/images/avatars/01.png') }}" alt=""> --}}
                            <h4>Name: {{ $item->user->name }}</h4>
                            <h6>Username: {{ $item->user->username }}</h6>
                            <h6>Account ID: <span class="text-uppercase">{{ $item->user->account_id }}</span></h6>
                            <h6>Upload Date: {{ date('M d, Y', strtotime($item->created_at)) }}</h6>
                        </div>
                    </div>
                @empty
                    <h4>There are no Payment Proofs yet!</h4>
                @endforelse
            </div>
        </div>
    </div>
@endsection
