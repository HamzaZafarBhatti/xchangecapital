@extends('front.layout.master')

@section('title', 'About')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">About</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 align-items-end mb-4">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" src="https://arbyvest.com/asset/front/img/uploads/about.jpeg">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">About Us</p>
                    <h1 class="display-5 mb-4">South Africa based Dollars & Pounds Private Trading Platform</h1>
                    <p><strong>ARBYVEST is the foremost Foreign Currency private trading platform based in South
                            Africa.</strong> <em>Our uniqueness as a platform allows members to buy USD, and GBP at our
                            South Africa e-wallet platform rates and sell at the local black-market rates either in <span
                                style="text-decoration: underline;">South Africa Rand</span> or in <span
                                style="text-decoration: underline;">Nigerian Naira</span> on our platform.</em></p>

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
                                    attached.</p>
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
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Our Licenses & Certifications
                </p>
                <h1 class="display-5 mb-5">We are regulated by Financial Authorities in South Africa and Registered as a
                    Corporate Body in Nigeria.</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav nav-pills d-flex justify-content-between w-100 h-100 me-4">
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-4 active"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>FCA - LICENSE No. 99811</h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-4"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>Companies & Intellectual
                                Properties Commission Reistration Certificate</h5>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-4"
                            data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                            <h5 class="m-0"><i class="fa fa-bars text-primary me-3"></i>Corporate Affairs Commission of
                                Nigeria</h5>
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
                                            src="https://arbyvest.com/asset/front/img/uploads/fca.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">FINANCIAL SECTOR CONDUCT AUTHORITY - LICENSE No. 99811</h3>

                                    <p>&nbsp;</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100"
                                            src="https://arbyvest.com/asset/front/img/uploads/south_africa_certificate_business-scaled.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">Certificate issued by the Commissioner of Companies & Intellectual
                                        Property Commission - COR14.3: Registration Certificate. - SOUTH AFRICAN ENTERPRISE
                                        CERTIFCATE NUMBER - 2022/345466/022</h3>
                                    <p><a href="https://arbyvest.com/asset/front/img/uploads/south_africa_certificate_business.jpg"
                                            target="_blank"><strong>Enlarge Document</strong></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100"
                                            src="https://arbyvest.com/asset/front/img/uploads/cac-ng.jpeg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-4">Corporate Affairs Commission - Registered Company in Nigeria -
                                        ARBYVEST TECHNOLOGY</h3>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute rounded w-100 h-100"
                                            src="{{ asset('asset/front/img/service-4.jpg') }}" style="object-fit: cover;"
                                            alt="">
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
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Our Team</p>
                <h1 class="display-5 mb-5">The Exclusive Team</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <img class="img-fluid rounded"
                            src="https://arbyvest.com/asset/front/img/uploads/151693062948199.jpg" alt="">
                        <div class="team-text">
                            <div>
                                <h4 class="mb-0">Ms Kutlwano Moke</h4>
                                <h5 class="mb-0 text-center">CEO, ARBYVEST TECH.</h5>
                            </div>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle mx-1"
                                    href="https://za.linkedin.com/in/kutlwano-ck-moke-aaa98a12b" target="_blank"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <img class="img-fluid rounded"
                            src="https://arbyvest.com/asset/front/img/uploads/1654725181285.jpg" alt="">
                        <div class="team-text">
                            <div>
                                <h4 class="mb-0">Benjamin E. M</h4>
                                <h5 class="mb-0 text-center">Director</h5>
                            </div>
                            <div class="team-social d-flex">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <img class="img-fluid rounded"
                            src="https://arbyvest.com/asset/front/img/uploads/1586798980937.jpg" alt="">
                        <div class="team-text">
                            <div>
                                <h4 class="mb-0">Stephen Odu</h4>
                                <h5 class="mb-0 text-center">Director, Nigeria</h5>
                            </div>
                            <div class="team-social d-flex">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
