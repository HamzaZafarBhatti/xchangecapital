@extends('front.layout.master')

@section('title', 'Top Traders')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Top Traders</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Top Traders</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Top Traders</p>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12">
                    <table class="table table-striped table-hover table-borderless table-sm">
                        <tr>
                            <thead>
                                <td>S/N</td>
                                <td>NAME</td>
                                <td>AMOUNT</td>
                                <td>STATUS</td>
                            </thead>
                        </tr>
                        @forelse ($topearners as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name ?? 'N/A' }}</td>
                                <td>{{ $item->get_amount }}</td>
                                <td>
                                    <span class="badge rounded-pill bg-success">
                                        TOTAL CASHOUT
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No Top trader yet</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
