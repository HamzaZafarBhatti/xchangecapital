<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <title>Bitrader - Professional Multipurpose HTML Template for Your Crypto, Forex, Stocks & Day Trading Business
    </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Sites meta Data -->
    <meta name="application-name"
        content="Bitrader - Professional Multipurpose HTML Template for Your Crypto, Forex, Stocks & Day Trading Business">
    <meta name="author" content="thetork">
    <meta name="keywords" content="Bitrader, Crypto, Forex, and Stocks Trading Business">
    <meta name="description"
        content="Experience the power of Bitrader, the ultimate HTML template designed to transform your trading business. With its sleek design and advanced features, Bitrader empowers you to showcase your expertise, engage clients, and dominate the markets. Elevate your online presence and unlock new trading possibilities with Bitrader.">

    <!-- OG meta data -->
    <meta property="og:title"
        content="Bitrader - Professional Multipurpose HTML Template for Your Crypto, Forex, Stocks & Day Trading Business">
    <meta property="og:site_name" content=Bitrader>
    <meta property="og:url" content="https://thetork.com/demos/html/Bitrader/">
    <meta property="og:description"
        content="Welcome to Bitrader, the game-changing HTML template meticulously crafted to revolutionize your trading business. With its sleek and modern design, Bitrader provides a cutting-edge platform to showcase your expertise, attract clients, and stay ahead in the competitive trading markets.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('asset/new_front/images/og.png') }}">
    <link rel="shortcut icon" href="{{ asset('asset/new_front/images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('asset/new_front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/new_front/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/new_front/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/new_front/css/swiper-bundle.min.css') }}">
    <!-- main css for template -->
    <link rel="stylesheet" href="{{ asset('asset/new_front/css/style.css') }}">
    @yield('styles')
</head>

<body class="home-5">
    <!-- ===============>> Preloader start here <<================= -->
    <div class="preloader">
        <img src="{{ asset('asset/new_front/images/logo/preloader.png') }}" alt="preloader icon">
    </div>
    <!-- ===============>> Preloader end here <<================= -->

    <!-- ===============>> light&dark switch start here <<================= -->
    <div class="lightdark-switch ">
        <span class="switch-btn switch-btn--style2" id="btnSwitch"><img
                src="{{ asset('asset/new_front/images/icon/moon.svg') }}" alt="light-dark-switchbtn"
                class="swtich-icon"></span>
    </div>
    <!-- ===============>> light&dark switch start here <<================= -->

    @include('front.layout.navbar')

    @yield('content')

    @include('front.layout.footer')

    <!-- ===============>> scrollToTop start here <<================= -->
    <a href="#" class="scrollToTop scrollToTop--style2"><i class="fa-solid fa-arrow-up-from-bracket"></i></a>
    <!-- ===============>> scrollToTop ending here <<================= -->

    <!-- vendor plugins -->
    <script src="{{ asset('asset/new_front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/new_front/js/all.min.js') }}"></script>
    <script src="{{ asset('asset/new_front/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('asset/new_front/js/aos.js') }}"></script>
    <script src="{{ asset('asset/new_front/js/fslightbox.js') }}"></script>
    <script src="{{ asset('asset/new_front/js/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('asset/new_front/js/custom.js') }}"></script>
    @yield('scripts')
</body>

</html>
