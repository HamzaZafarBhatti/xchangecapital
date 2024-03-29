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
</head>

<body>

    <!-- ===============>> Preloader start here <<================= -->
    <div class="preloader">
        <img src="{{ asset('asset/new_front/images/logo/preloader.png') }}" alt="preloader icon">
    </div>
    <!-- ===============>> Preloader end here <<================= -->

    <!-- ===============>> account start here <<================= -->
    <section class="account padding-top padding-bottom sec-bg-color2">
        <div class="container">
            <div class="account__wrapper" data-aos="fade-up" data-aos-duration="800">
                <div class="account__inner">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="account__thumb">
                                <img src="{{ asset('asset/new_front/images/account/1.png') }}" alt="account-image"
                                    class="dark">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="account__content account__content--style2">

                                <!-- account tittle -->
                                <div class="account__header">
                                    <h2>Reset password</h2>
                                    <p class="mb-0">Hey there! Forgot your password? No worries! Just click on "Reset
                                        password" and follow
                                        the steps. Easy as pie!</p>
                                </div>


                                <!-- account form -->
                                <form action="{{ route('password.store') }}" method="post"
                                    class="account__form needs-validation" novalidate>
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div>
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Enter your email"
                                                    value="{{ old('email', $request->email) }}" readonly required>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div>
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" placeholder="Enter your password" required>
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div>
                                                <label for="password_confirmation" class="form-label">Confirm
                                                    Password</label>
                                                <input type="password_confirmation" class="form-control"
                                                    id="password_confirmation" name="password_confirmation"
                                                    placeholder="Confirm password" required>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit"
                                        class="trk-btn trk-btn--border trk-btn--primary d-block mt-4">Reset
                                        Password</button>
                                </form>


                                <div class="account__switch">
                                    <p>
                                        <a href="{{ route('user.login') }}" class="style2">
                                            <i class="fa-solid fa-arrow-left-long"></i> Back to <span>Login</span>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ===============>> account end here <<================= -->





    <!-- vendor plugins -->

    <script src="{{ asset('asset/new_front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset/new_front/js/all.min.js') }}"></script>
    <script src="{{ asset('asset/new_front/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('asset/new_front/js/aos.js') }}"></script>
    <script src="{{ asset('asset/new_front/js/fslightbox.js') }}"></script>
    <script src="{{ asset('asset/new_front/js/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('asset/new_front/js/custom.js') }}"></script>


</body>

</html>
