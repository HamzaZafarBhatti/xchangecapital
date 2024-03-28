<!doctype html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NKY0PCWGLW"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NKY0PCWGLW');
</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ $set->title }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('asset/images/' . $set->favicon) }}" />
    <link rel="stylesheet" href="{{ asset('asset/user/css/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/user/css/coinex.css?v=1.0.0') }}">
    <style>
        #svg_arrow {
            max-width: 100px;
            width: 100%;
        }

        .nav-link {
            white-space: unset !important;
        }

        .swal-modal {
            background-color: rgb(15 15 16);
            border: 3px solid var(--bs-primary);
        }

        .swal-text,
        .swal-title {
            color: #ffffff;
        }

        .swal-button.swal-button--confirm {
            background-color: var(--bs-primary);
        }

        .swal-button.swal-button--confirm:not([disabled]):hover {
            color: #fff;
            background-color: #d98019;
            border-color: #cc7917;
        }

        .swal-icon--success:after,
        .swal-icon--success:before,
        .swal-icon--success__hide-corners {
            background: #0f0f10;
        }

        .swal-icon--success {
            border-color: #000000;
        }
    </style>
    @yield('css')

<script src="https://use.fontawesome.com/7364f5dd4a.js"></script>
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-b360ba0e-17b6-4a65-95ac-b1b6185d7343"></div>
</head>

<body class=" ">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->
    @include('user.layout.sidebar')

    <main class="main-content">
        <div class="position-relative">
            @include('user.layout.navbar')
        </div>
        <div class="container-fluid content-inner pb-0">
            @include('user.alert')
            @yield('content')
        </div>
        @include('user.layout.footer')
    </main>

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

    <script src="{{ asset('asset/admin/global_assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>
    <script>
        // alert('{{ Route::is("user.upload_proof") }}')
        if ("{{ $user_proof }}" == 1 && !parseInt('{{ Route::is("user.upload_proof") }}')) {
            swal({
                    title: "Upload Your Payment PROOF!",
                    text: "✨CONGRATULATIONS ON YOUR LATEST CASHOUT. ✨",
                    icon: "success",
                    buttons: true,
                    dangerMode: false,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = "{{ route('user.upload_proof') }}"
                    }
                });
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @if (Session::has('verify_success'))
        <script>
            swal({
                title: "{{ session('verify_success') }}",
                icon: "success",
            })
        </script>
    @endif
    @yield('script')
</body>

</html>
