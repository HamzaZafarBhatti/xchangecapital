<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password | {{ $set->title }}</title>
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
                            @include('user.alert')
                            <div class="card">
                                <div class="card-body">
                                    <div class="auth-form">
                                        <a href="https://arbyvest.com/" target="_blank"><img style="display: block; margin-left: auto; margin-right: auto;" src="https://arbyvest.com/asset/images/logo_1672177094.png" width="278" height="59" /></a>
                                        <p class="text-center mt-1"><strong>Foreign Currency Trading
                                                Platform</strong></p>
                                        <h3 class="text-center">Reset Password</h3>
                                        <form method="POST" action="{{ route('password.store') }}">
                                            @csrf
                                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control @if ($errors->get('email')) is-invalid @endif" id="email" name="email"
                                                    placeholder="name@example.com" value="{{ old('email', $request->email) }}" readonly required
                                                    autocomplete="false">
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
                                            <div class="form-floating mb-2">
                                                <input type="password" name="password" class="form-control @if ($errors->get('password')) is-invalid @endif"
                                                    id="password" placeholder="Password" required autocomplete="false">
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
                                            <div class="form-floating mb-2">
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    id="password_confirmation" placeholder="Confirm Password" required autocomplete="false">
                                                <label for="password_confirmation">Confirm Password</label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Reset Password</button>
                                            </div>
                                            {{-- @include('user.auth.social_login') --}}
                                        </form>
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

{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
