<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Verify Email | {{ $set->title }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('asset/images/' . $set->favicon) }}" />
    <link rel="stylesheet" href="{{ asset('asset/user/css/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/user/css/coinex.css?v=1.0.0') }}">
</head>

<body class="" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->
    <div style="background-image: url('{{ asset('asset/user/images/au00th/01.png') }}')">
        <div class="wrapper">
            <section class="vh-100 bg-image">
                <div class="container h-100">
                    <div class="row justify-content-center h-100 align-items-center">
                        <div class="col-md-5 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="auth-form">
                                         <a href="https://arbyvest.com/" target="_blank"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://arbyvest.com/asset/images/logo_1672177094.png" width="278" height="59" /></a>
                                        <p class="text-center mt-1"><strong>Foreign Currency Trading
                                                Platform</strong></p>
                                        <div class="text-center">
                                            <a href="#">
                                                <svg width="50" height="50" viewBox="0 0 86 91" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M44.4591 8.17875C44.5206 6.49608 43.205 5.07083 41.5222 5.12862C33.9539 5.3885 26.5686 7.64158 20.1257 11.6843C12.8201 16.2684 7.06402 22.9415 3.60569 30.8362C0.147358 38.731 -0.853289 47.4822 0.733814 55.9525C2.32092 64.4228 6.42237 72.2203 12.5051 78.3316C18.5877 84.4429 26.3703 88.5853 34.8413 90.2203C43.3122 91.8553 52.0797 90.9074 60.0041 87.4997C67.9285 84.0921 74.6433 78.3823 79.2758 71.1125C83.36 64.7031 85.6591 57.3425 85.9649 49.7873C86.0331 48.1031 84.6141 46.7777 82.9292 46.8293C81.2442 46.8809 79.9333 48.2907 79.8453 49.9742C79.5143 56.3048 77.5522 62.4618 74.1259 67.8387C70.1511 74.0764 64.3895 78.9756 57.5901 81.8995C50.7907 84.8234 43.2679 85.6368 35.9995 84.2339C28.7312 82.8309 22.0534 79.2766 16.8343 74.033C11.6151 68.7893 8.09591 62.0987 6.73412 54.8309C5.37233 47.5631 6.23092 40.0542 9.19829 33.2802C12.1657 26.5063 17.1046 20.7805 23.3731 16.8472C28.7786 13.4554 34.9573 11.5317 41.3 11.2396C42.9818 11.1621 44.3975 9.86122 44.4591 8.17875Z"
                                                        fill="#FF971D" />
                                                    <path
                                                        d="M40.0116 54.5643L76.8682 18.1495C78.1776 16.8557 80.2719 16.8169 81.6283 18.0614C83.0867 19.3993 83.124 21.687 81.7099 23.0717L40.0116 63.9056L21.8367 46.082C20.6246 44.8933 20.615 42.9441 21.8153 41.7435C22.9745 40.5842 24.8423 40.5472 26.0464 41.6598L40.0116 54.5643Z"
                                                        fill="#FF971D" />
                                                </svg>
                                            </a>
                                            <h2 class="mt-3">Registration Successful!</h2>
                                            <p class="mt-3">
                                                {{ __('Thanks for registering! Before getting started, could you VERIFY your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                                            </p>
                                            @if (session('status') == 'verification-link-sent')
                                                <div class="mt-3 font-medium text-sm text-success">
                                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                                </div>
                                            @endif
                                            <div class="d-flex align-items-center flex-column gap-2 mt-3">
                                                <form method="POST" action="{{ route('verification.send') }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Resend Verification Email') }}
                                                    </button>
                                                </form>
                                                <a type="button" href="{{ route('user.logout') }}" class="btn btn-primary">
                                                    {{ __('Log Out') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>



    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('asset/user/js/libs.min.js') }}"></script>
    <!-- widgetchart JavaScript -->
    <script src="{{ asset('asset/user/js/charts/widgetcharts.js') }}"></script>
    <!-- fslightbox JavaScript -->
    <script src="{{ asset('asset/user/js/fslightbox.js') }}"></script>
    <!-- app JavaScript -->
    <script src="{{ asset('asset/user/js/app.js') }}"></script>
    <!-- apexchart JavaScript -->
    <script src="{{ asset('asset/user/js/charts/apexcharts.js') }}"></script>
</body>

</html>
