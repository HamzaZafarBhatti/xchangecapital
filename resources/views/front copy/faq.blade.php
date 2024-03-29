@extends('front.layout.master')

@section('title', 'FAQs')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">FAQs</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Frequent Asked Questions</p>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12">
                    <div class="accordion" id="accordionExample">
                        @forelse ($faqs as $item)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $loop->iteration }}">
                                    <button class="accordion-button @if(!$loop->first) collapsed @endif" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}">
                                        {{ $item->question }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse @if($loop->first) show @endif" aria-labelledby="heading{{ $loop->iteration }}"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $item->answer !!}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h3>No faqs!</h3>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
