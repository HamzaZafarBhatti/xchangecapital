@extends('front.layout.master')

@section('title', 'Home')

@section('css')
    <style>
        .team-item .team-text {
            padding-top: 5px;
        }
    </style>
@endsection

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="https://arbyvest.com/asset/front/img/uploads/carousel-111.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8">
                                    <p
                                        class="d-inline-block border border-white rounded text-primary fw-semi-bold py-1 px-3 animated slideInDown">
                                        Welcome to Arbyvest Technology</p>
                                    <h1 class="display-1 mb-4 animated slideInDown">The Foremost Foreign & Local Currency
                                        Trader
                                    </h1>
                                    <a href="https://arbyvest.com/app/register"
                                        class="btn btn-primary py-3 px-5 animated slideInDown">Trade Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="https://arbyvest.com/asset/front/img/uploads/carousel-222.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <p
                                        class="d-inline-block border border-white rounded text-primary fw-semi-bold py-1 px-3 animated slideInDown">
                                        Foreign Currency Trading Platform</p>
                                    <h1 class="display-1 mb-4 animated slideInDown">Dollar & Pound Private Trading Platform
                                    </h1>
                                    <a href="https://arbyvest.com/app/register"
                                        class="btn btn-primary py-3 px-5 animated slideInDown">Trade Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 align-items-end mb-4">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" src="https://arbyvest.com/asset/front/img/uploads/about-2img-min.png">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">About Us</p>
                    <h1 class="display-5 mb-4">South Africa based Dollars & Pounds Private Trading Platform</h1>
                    <p><strong>ARBYVEST is the foremost Foreign Currency private trading platform based in South
                            Africa.</strong> <em>Our uniqueness as a platform allows members to buy USD, and GBP at our
                            South Africa e-wallet platform rates and sell at the local black-market rates either in <span
                                style="text-decoration: underline;">South Africa Rand</span> or in <span
                                style="text-decoration: underline;">Nigerian Naira</span> on our platform.</em></p>
                    <a href="https://arbyvest.com/asset/whitepaper/how-it-works/document/Trading%20Foreign%20Currencies%20with%20ARBYVEST%20TECHNOLOGY.pdf"
                        class="btn btn-primary py-3 px-5 mt-3">Download The GUIDE Now!</a>
                    <div class="border rounded p-4">
                        <nav>
                            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                <button class="nav-link fw-semi-bold active" id="nav-story-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-story" type="button" role="tab" aria-controls="nav-story"
                                    aria-selected="true">What We Do</button>
                                <button class="nav-link fw-semi-bold" id="nav-mission-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-mission" type="button" role="tab" aria-controls="nav-mission"
                                    aria-selected="false">Our Services</button>
                                <button class="nav-link fw-semi-bold" id="nav-vision-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-vision" type="button" role="tab" aria-controls="nav-vision"
                                    aria-selected="false">Exclusive VIP</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-story" role="tabpanel"
                                aria-labelledby="nav-story-tab">
                                <p><strong>ARBYVEST</strong> handles all the foreign currency trading process within days,
                                    and you will get the black-market value after a successful sale to your local currency
                                    account.</p>
                            </div>
                            <div class="tab-pane fade" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <p><strong>ARBYVEST</strong> as a unique Foreign Currency Trading platform would help you
                                    source for 🇺🇸 USD &amp;&nbsp; 🇬🇧 GBP at our South Africa e-wallet platform rates, at
                                    good rates, and also help you sell it at black-market rates in your local Rand &amp;
                                    Naira rates, all in one foreign currency trading platform.</p>
                            </div>
                            <div class="tab-pane fade" id="nav-vision" role="tabpanel" aria-labelledby="nav-vision-tab">
                                <p>On <strong>ARBYVEST</strong>, you can be one of our private members. You get to be
                                    entitled to some exclusive VIP offers, benefits, and welfare from
                                    <strong>ARBYVEST</strong> monthly. If you reach any of the below total monthly
                                    transactions on <strong>ARBYVEST</strong>, you are entitled to claim the benefits
                                    attached.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded p-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4">
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                        <div class="h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-times text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h4>No Hidden Charges</h4>
                                    <span>We'll only charge 10% reasonable market fees (lowest ever) for your sales and
                                        exchange.</span>
                                </div>
                                <div class="border-end d-none d-lg-block"></div>
                            </div>
                            <div class="border-bottom mt-4 d-block d-lg-none"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                        <div class="h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-users text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h4>Dedicated Experts</h4>
                                    <span>We source for USD & GBP at our South Africa e-wallet platform rates for your
                                        sales.</span>
                                </div>
                                <div class="border-end d-none d-lg-block"></div>
                            </div>
                            <div class="border-bottom mt-4 d-block d-lg-none"></div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                        <div class="h-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-phone text-white"></i>
                                </div>
                                <div class="ps-3">
                                    <h4>24/7 Support Service</h4>
                                    <span>We deliver top-notch Support Consultancy Services to our private members with
                                        speed.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-fluid facts my-5 py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-users fa-3x text-white mb-3"></i>
                    <h1>Over</h1>
                    <h1 class="display-4 text-white" data-toggle="counter-up">50000</h1>
                    <span class="fs-5 text-white">Happy Members</span>
                    <hr class="bg-white w-25 mx-auto mb-0">
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-check fa-3x text-white mb-3"></i>
                    <h1>Over</h1>
                    <h1 class="display-4 text-white" data-toggle="counter-up">3000000</h1>
                    <span class="fs-5 text-white">Trades Completed</span>
                    <hr class="bg-white w-25 mx-auto mb-0">
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-users-cog fa-3x text-white mb-3"></i>
                    <h1>Over</h1>
                    <h1 class="display-4 text-white" data-toggle="counter-up">412</h1>
                    <span class="fs-5 text-white">Dedicated Experts</span>
                    <hr class="bg-white w-25 mx-auto mb-0">
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fa fa-award fa-3x text-white mb-3"></i>
                    <h1>Over</h1>
                    <h1 class="display-4 text-white" data-toggle="counter-up">26</h1>
                    <span class="fs-5 text-white">Awards & Certifications</span>
                    <hr class="bg-white w-25 mx-auto mb-0">
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Features Start -->
    <div class="container-xxl feature py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Why You Should Choose
                        ARBYVEST!</p>
                    <h1 class="display-5 mb-4">Reasons Why People Choose ARBYVEST!</h1>
                    <p><strong>ARBYVEST</strong> Foreign Currencies Trading Platform involves buying a currency that you
                        will eventually sell for profit. That is the sole aim and goal.</p>
                    <p>With <strong>ARBYVEST</strong>, you can as well do this by buying Foreign Currencies such as USD or
                        GBP from our South Africa e-wallet market rates and selling them at your local currencies' black
                        market rates in Rand or in Naira on our platform. <strong><em>We've come to bridge the gap of buying
                                and selling foreign currencies under one umbrella.</em></strong></p>
                    <a class="btn btn-primary py-3 px-5" href="https://arbyvest.com/app/register">Start Trading Now!</a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-6">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="feature-box border rounded p-4">
                                        <i class="fa fa-check fa-3x text-primary mb-3"></i>
                                        <h4 class="mb-3">Fast Executions</h4>
                                        <p class="mb-3">Experience the superb-power of our vast network that processes
                                            your transaction with speed and reliability.</p>
                                        <a class="fw-semi-bold" href="https://arbyvest.com/app/register">Trade Now!<i
                                                class="fa fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                                    <div class="feature-box border rounded p-4">
                                        <i class="fa fa-check fa-3x text-primary mb-3"></i>
                                        <h4 class="mb-3">24/7 Support</h4>
                                        <p class="mb-3">Superb top-notch Support Consultancy Services to our private
                                            members with speed.</p>
                                        <a class="fw-semi-bold" href="https://arbyvest.com/app/register">Trade Now!<i
                                                class="fa fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                            <div class="feature-box border rounded p-4">
                                <i class="fa fa-check fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Financial Secuity & Payouts</h4>
                                <p class="mb-3">No Need to worry about your funds, sales and transactions. Everything is
                                    secured with our segregated 256bit SSL Security and Robust Data network security with
                                    optimum FAST PAYOUTS!</p>
                                <a class="fw-semi-bold" href="https://arbyvest.com/app/register">Trade Now!<i
                                        class="fa fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Service Start -->
    <div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Our Services</p>
                <h1 class="display-5 mb-5">What We Do At ARBYVEST!</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav nav-pills d-flex justify-content-between w-100 h-100 me-4">
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-4 active"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>Foreign Currencies & Trading
                            </h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-4"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>Black-Market (Local) Sales</h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-4"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>Our Foreign Currencies Agents
                                Consultancy</h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-0"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>Business Loans</h5>
                        </button>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content w-100">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100"
                                            src="https://arbyvest.com/asset/front/img/uploads/staff-office-arbyvest.png"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">South Africa based Foreign Currency - Dollars & Pounds Trading for
                                        Rand & Naira</h3>
                                    <p><strong>At ARBYVEST</strong>, you can be buying Foreign Currencies such as USD or GBP
                                        from our South Africa e-wallet market rates and sell them at your local currencies'
                                        black market rates in Rand or in Naira on our platform. <em>We've come to bridge the
                                            gap of buying and selling foreign currencies under one umbrella.</em></p>
                                    <p><strong>ARBYVEST</strong> Foreign Currencies Trading Platform involves buying a
                                        currency that you will eventually sell for profit. That is the sole aim and goal.
                                    </p>
                                    <p>&nbsp;</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100"
                                            src="https://arbyvest.com/asset/front/img/uploads/theservice2.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">Robust Private source of Foreign Currencies using South African
                                        e-wallet system for Rand & Naira instantly.</h3>
                                    <p>Let's help you source for 🇺🇸 USD &amp;&nbsp; 🇬🇧 GBP at our South Africa e-wallet
                                        platform rates, at good rates, and also help you sell it at black-market rates in
                                        your local Rand &amp; Naira rates, all in one foreign currency trading
                                        platform.<strong> ARBYVEST is for South African &amp; Nigerian Traders.</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100"
                                            src="https://arbyvest.com/asset/front/img/uploads/service5.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">Earn an extra $1000 or £1000 Monthly as one of our Foreign Currency
                                        Agents!</h3>
                                    <p>By transferring &amp; selling Foreign Currencies to your friends and associates.</p>
                                    <p><em><strong>Want to make a 3% commission by selling our Foreign Currencies to your
                                                friends, family, and associates?</strong></em></p>
                                    <p>Want to become one of ARBYVEST's Foreign Currency Agents?</p>
                                    <p><span style="text-decoration: underline;"><strong>Want to make an extra $1000 or
                                                &pound;1000 Monthly?</strong></span></p>
                                    <p>Then join ARBYVEST Foreign Currency Agents and make an extra income transferring and
                                        selling foreign currencies.</p>
                                    <a href="https://arbyvest.com/foreign-currency-resellers"
                                        class="btn btn-primary py-3 px-5 mt-3">Join ARBYVEST's AGENTS!</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100"
                                            src="https://arbyvest.com/asset/front/img/uploads/service4.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">Quick Business Loans to $100,000</h3>
                                    <p>Easy access to our Business Loans through our digital application forms and automated
                                        repayment process. Top-up is available. If you need additional financing during your
                                        course of your active loan, you may also request.</p>
                                    <p><strong>Access Quick Business Loans to $100,000</strong></p>
                                    <p><span class="fe5nidar khvhiq1o r5qsrrlp i5tg98hk f9ovudaz przvwfww gx1rr48f gfz4du6o r7fjleex nz2484kf svot0ezm dcnh1tix sxl192xd t3g6t33p"
                                            style="background-image: url('/img/2617e32ba41ae37a81350005624747b8_w_155-40.png');"><span
                                                class="mpj7bzys xzlurrtv">✅</span></span>Must have transacted up to 50% of
                                        the Loan amount required</p>
                                    <p><span class="fe5nidar khvhiq1o r5qsrrlp i5tg98hk f9ovudaz przvwfww gx1rr48f gfz4du6o r7fjleex nz2484kf svot0ezm dcnh1tix sxl192xd t3g6t33p"
                                            style="background-image: url('/img/2617e32ba41ae37a81350005624747b8_w_155-40.png');"><span
                                                class="mpj7bzys xzlurrtv">✅</span></span>Affordable interest rate</p>
                                    <p><span class="fe5nidar khvhiq1o r5qsrrlp i5tg98hk f9ovudaz przvwfww gx1rr48f gfz4du6o r7fjleex nz2484kf svot0ezm dcnh1tix sxl192xd t3g6t33p"
                                            style="background-image: url('/img/2617e32ba41ae37a81350005624747b8_w_155-40.png');"><span
                                                class="mpj7bzys xzlurrtv">✅</span></span>Quick processing time</p>
                                    <a href="https://arbyvest.com/contact" class="btn btn-primary py-3 px-5 mt-3">Contact
                                        Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Latest Updates Start -->
    <div class="container-xxl latest-updates py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Latest Updates</p>
                {{-- <h1 class="display-5 mb-5">What We Do At ARBYVEST!</h1> --}}
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-6">
                    <h4 class="text-center">Latest Registrations</h4>
                    <table class="table table-responsive table-striped text-center">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Account ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($registrations)
                                @foreach ($registrations as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <th class="text-uppercase" style="vertical-align: middle">{{ $item->account_id }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <h4 class="text-center">Latest Payouts</h4>
                    <table class="table table-responsive table-striped text-center">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($whithdraws)
                                @foreach ($whithdraws as $item)
                                    <tr>
                                        <td>{{ $item->user->name ?? 'N/A' }}</td>
                                        <th class="text-uppercase" style="vertical-align: middle">{{ '₦' . number_format($item->amount, 2) }}</th>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Latest Updates End -->


    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Blogs</p>
                <h1 class="display-5 mb-5">Latest Blog Updates</h1>
            </div>
            <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.3s">
                @if ($blogs->isNotEmpty())
                    @foreach ($blogs as $item)
                        <div class="project-item pe-5 pb-5">
                            <div class="project-img mb-3">
                                <img class="img-fluid rounded" src="{{ asset('asset/images/' . $item->image) }}"
                                    alt="">
                                <a href="{{ route('front.blog', [$item->id, Str::of($item->title)->slug('-')]) }}"><i
                                        class="fa fa-link fa-3x text-primary"></i></a>
                            </div>
                            <div class="project-title">
                                <h4 class="mb-0">{{ $item->title }}</h4>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Projects End -->




@endsection
