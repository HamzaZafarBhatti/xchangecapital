<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | {{ $set->title }}</title>
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
    <div style="background-image: url('{{ asset('asset/front/img/uploads/dark-blue-bg-arbyvest-m0in.png') }}')">
        <div class="wrapper">
            <section class="vh-100 bg-image">
                <div class="container h-100">
                    <div class="row justify-content-center h-100 align-items-center">
                        <div class="col-md-6 mt-5">
                            @if ($errors->get('email'))
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z">
                                        </path>
                                    </symbol>
                                </svg>
                                @foreach ((array) $errors->get('email')[0] as $message)
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                                            <use xlink:href="#exclamation-triangle-fill"></use>
                                        </svg>
                                        <div>
                                            {{ $message }}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            @include('user.alert')
                            <div class="card">
                                <div class="card-body">
                                    <div class="auth-form">
                                        <a href="https://arbyvest.com/" target="_blank"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://arbyvest.com/asset/images/logo_1672177094.png" width="278" height="59" /></a>
                                        <p class="text-center mt-1"><strong>Foreign Currency Trading
                                                Platform</strong></p>
                                        <h3 class="text-center"><strong>LOGIN TO ARBYVEST</strong></h3><br>
                                        <form method="POST" action="{{ route('user.do_login') }}">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input type="email"
                                                    class="form-control @if ($errors->get('email')) is-invalid @endif"
                                                    id="email" name="email" placeholder="name@example.com"
                                                    value="{{ old('email') }}" required autocomplete="false">
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input type="password" name="password"
                                                    class="form-control @if ($errors->get('email')) is-invalid @endif"
                                                    id="password" placeholder="Password" required autocomplete="false">
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="d-flex justify-content-between  align-items-center flex-wrap">
                                                <div class="form-group">
                                                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">LOGIN ACCOUNT</button>
                                            </div>
                                            {{-- @include('user.auth.social_login') --}}
                                        </form>
                                        <div class="new-account mt-3 text-center">
                                            <p>Don't have an account? <a class=""
                                                    href="{{ route('user.register') }}">Click
                                                    here to Register Account</a></p>
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
