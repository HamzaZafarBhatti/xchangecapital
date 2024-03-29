@extends('front.layout.master')

@section('title', $blog->title)

@section('css')
    <style>
        .blog_image {
            object-fit: cover;
            height: 500px;
        }

        .page-header {
            background: none;
            padding-top: 0;
        }
    </style>
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="page-header" data-wow-delay="0.1s">
    </div>
    <!-- Page Header End -->


    <!-- Blogs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Blog</p>
                <h1 class="display-5 mb-4">{{ $blog->title }}</h1>
            </div>
            <div class="row wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-12">
                    <img src="{{ asset('asset/images/' . $blog->image) }}" width="100%" class="blog_image">
                </div>
                <div class="col-lg-12 mt-3">
                    <h5>Date Posted: {{ $blog->get_post_date }}</h5>
                </div>
                <div class="col-lg-12 mt-4">
                    {!! $blog->details !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Projects End -->
@endsection
