<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register | {{ $set->title }}</title>
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
    <div style="background-image: url('{{ asset('asset/front/img/uploads/arbyvest-bg-004-m0in.png') }}')">
        <div class="wrapper">
            <section class="vh-100 bg-image">
                <div class="container h-100">
                    <div class="row justify-content-center h-100 align-items-center">
                        <div class="col-md-6 mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="auth-form">
                                        <a href="https://arbyvest.com/" target="_blank"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://arbyvest.com/asset/images/logo_1672177094.png" width="278" height="59" /></a>
                                        <p style="text-align: center;"><strong>Foreign Currency Trading
                                                Platform</strong></p>
                                        <h3 style="text-align: center;"><strong>ARBYVEST ACCOUNT REGISTRATION</strong>
                                        </h3><br>
                                        <form method="POST" action="{{ route('user.do_register') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="text"
                                                            class="form-control @if ($errors->get('name')) is-invalid @endif"
                                                            id="name" name="name" value="{{ old('name') }}"
                                                            placeholder="Name" required>
                                                        <label for="name">Full Names</label>
                                                        @if ($errors->get('name'))
                                                            <div class="invalid-feedback">
                                                                <ul>
                                                                    @foreach ((array) $errors->get('name') as $message)
                                                                        <li>{{ $message }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="text"
                                                            class="form-control @if ($errors->get('username')) is-invalid @endif"
                                                            id="username" name="username" value="{{ old('username') }}"
                                                            placeholder="Username" required>
                                                        <label for="username">Username</label>
                                                        @if ($errors->get('username'))
                                                            <div class="invalid-feedback">
                                                                <ul>
                                                                    @foreach ((array) $errors->get('username') as $message)
                                                                        <li>{{ $message }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="email"
                                                            class="form-control @if ($errors->get('email')) is-invalid @endif"
                                                            id="email" name="email" value="{{ old('email') }}"
                                                            placeholder="name@example.com" required>
                                                        <label for="email">Email</label>
                                                        @if ($errors->get('email'))
                                                            <div class="invalid-feedback">
                                                                <ul>
                                                                    @foreach ((array) $errors->get('email') as $message)
                                                                        <li>{{ $message }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3">
                                                        <input type="text"
                                                            class="form-control @if ($errors->get('phone')) is-invalid @endif"
                                                            id="phone" name="phone" value="{{ old('phone') }}"
                                                            placeholder="Phone" required>
                                                        <label for="phone">Phone</label>
                                                        @if ($errors->get('phone'))
                                                            <div class="invalid-feedback">
                                                                <ul>
                                                                    @foreach ((array) $errors->get('phone') as $message)
                                                                        <li>{{ $message }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-2">
                                                        <input type="password"
                                                            class="form-control @if ($errors->get('password')) is-invalid @endif"
                                                            id="password" name="password" placeholder="Password"
                                                            required>
                                                        <label for="password">Password</label>
                                                        @if ($errors->get('password'))
                                                            <div class="invalid-feedback">
                                                                <ul>
                                                                    @foreach ((array) $errors->get('password') as $message)
                                                                        <li>{{ $message }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-2">
                                                        <input type="password" class="form-control"
                                                            id="password_confirmation" name="password_confirmation"
                                                            placeholder="Password" required>
                                                        <label for="password_confirmation">Confirm Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3">
                                                        <select name="country_id" id="country_id" class="form-control"
                                                            placeholder="Country">
                                                            @foreach ($countries as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="country_id">Country</label>
                                                    </div>
                                                </div>
                                                @if ($referral)
                                                    <div class="col-md-12">
                                                        <div class="form-floating mb-3">
                                                            <input type="text"
                                                                class="form-control @if ($errors->get('referral')) is-invalid @endif"
                                                                id="referral" name="referral"
                                                                value="{{ $referral }}" placeholder="Referral"
                                                                readonly required>
                                                            <label for="referral">Referral</label>
                                                            @if ($errors->get('referral'))
                                                                <div class="invalid-feedback">
                                                                    <ul>
                                                                        @foreach ((array) $errors->get('referral') as $message)
                                                                            <li>{{ $message }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">REGISTER
                                                    ACCOUNT</button>
                                            </div>
                                            {{-- @include('user.auth.social_login') --}}
                                        </form>
                                        <div class="new-account mt-3 text-center">
                                            <br><p>By registering an account, you agree to our <a href="https://arbyvest.com/terms-of-service" target="_blank">Terms of Service</a>, <a href="https://arbyvest.com/privacy-policy" target="_blank">Privacy Policy</a> and <a href="https://arbyvest.com/disclaimer" target="_blank">Disclaimer</a></p><br><p>Already have an Account <a class="text-primary"
                                                    href="{{ route('user.login') }}">Login to your Account</a>
                                            </p>
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
