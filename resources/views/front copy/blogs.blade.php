@extends('front.layout.master')

@section('title', 'Blogs')

@section('css')
    <style>
        .img-fluid {
            height: 250px;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Blogs</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blogs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Blogs</p>
            </div>
            <h3><span style="color: #000080;"><strong><span style="color: #000080;">All The BLOG Updates on ARBYVEST</span><br /></strong></span></h3>
            <div class="row wow fadeInUp" data-wow-delay="0.3s">
                @forelse ($blogs as $item)
                    <div class="col-lg-4 project-item pe-5 pb-5 mb-4">
                        <div class="project-img mb-3">
                            <img class="img-fluid rounded" src="{{ asset('asset/images/' . $item->image) }}""
                                alt="" width="100%">
                            <a href="{{ route('front.blog', [$item->id, Str::of($item->title)->slug('-')]) }}">
                                <h4>
                                    Read more
                                </h4>
                            </a>
                        </div>
                        <div class="project-title">
                            <h5 class="mb-0">{{ $item->title }}</h5>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <h4>Page content is empty!</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Projects End -->
@endsection
