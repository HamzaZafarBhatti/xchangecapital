@extends('front.layout.master')

@section('title', 'Foreign Currency Agents')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="{{ asset('asset/front/lib/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <style>
        .account_id:hover {
            color: #05419d;
        }

        li:not(:last-child) {
            margin-bottom: 1rem;
        }
    </style>
@endsection

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Foreign Currency Agents</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Foreign Currency Agents</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="display-5 mb-5">FOREIGN CURRENCY AGENTS</h1>
            </div>
            <h2 class="text-center">Contact any Currency AGENTS below To
                Get You FUNDED First in US DOLLARS or in BRITISH POUNDS to your Wallet Before Making Payments To Them in NAIRA or in RAND.</h2>
            <br>
            <!-- #######  HEY, I AM THE SOURCE EDITOR! #########-->
<h3><span style="text-decoration: underline;"><strong>STEPS ON HOW TO GET FUNDED OF YOUR FOREIGN ACCOUNT FUNDED FROM OUR CURRENCY AGENTS</strong></span></h3>
<p>1. Make sure the AGENT you want to transact with or pay for your foreign currency funding is LISTED on this <strong><a href="https://arbyvest.com/foreign-currency-resellers" target="_blank">FOREIGN APPROVED AGENTS page</a></strong>.</p>
<p>2. Get the <strong>NAME of the AGENT</strong> and <strong>ACCOUNT ID</strong> and <strong><a href="https://arbyvest.com/verify-trader">VERIFY</a> </strong>if the AGENT has up to the AMOUNT in US Dollars or British Pounds in their account. For example, ACCOUNT ID: <strong>1412E9E26U</strong> should be entered and verified on <strong>https://arbyvest.com/verify-trader</strong> if they have the amount you need for FUNDING.</p>
<p>3. <strong>Once you are able to confirm the AGENT has the amount of the foreign currency, you may proceed to REQUEST that the AGENT funds your ACCOUNT of USD or GBP.</strong> You are required to proceed to send the AGENT your <strong>ACCOUNT ID</strong> so the AGENT can transfer the USD or GBP to your WALLET.</p>
<h4><span style="color: #008000;"><strong><span style="background-color: #ffff99;"> After the successful transfer, you are to MAKE PAYMENTS immediately of the equivalent NAIRA BALANCE to the CURRENCY AGENT'S BANK Account.</span></strong></span></h4>
<p>4. <strong>MAKE SURE YOU ARE FUNDED FIRST BY THE CURRENCY AGENT BEFORE MAKING EQUIVALENT PAYMENTS IN NAIRA TO THE AGENT.</strong></p>
<p>5. If you fail to make payments to the CURRENCY AGENT in less than 1hour, the AGENT has the right to REVERSE the transaction.</p>
<p><strong>&nbsp;</strong></p>
            <br>
            <h2 style="text-align: center;">Contact any Currency AGENTS below To
                Get You FUNDED First in US DOLLARS or in BRITISH POUNDS to your Wallet Before Making Payments To Them in NAIRA or in RAND.</h2>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                @forelse ($vendors as $item)
                    <div class="col-lg-6">
                        <div class="nav nav-pills d-flex justify-content-between w-100 h-100 me-4">
                            <button class="nav-link w-100 d-flex align-items-center text-start border p-4" type="button">
                                <div class="w-100 d-flex align-items-center justify-content-between">
                                    <img src="{{ asset($item->image ? $item->get_user_image : 'asset/user/images/avatars/01.png') }}"
                                        alt="User-Profile" class="img-fluid rounded-circle" width="50"
                                        style="object-fit: cover">
                                    <div class="text-center">
                                        <h5 class="m-0">
                                            {{ $item->name }}
                                        </h5>
                                        <h6 class="m-0"><strong>Account ID:</strong> <span data-=""
                                                class="text-uppercase account_id"><span>{{ $item->account_id ?? 'N/A' }}</span>&nbsp;<i
                                                    class="fas fa-copy"></i></span></h6>
                                        <h6 class="m-0"><strong>Phone:
                                            {{ $item->whatsapp_number ?? 'N/A' }}</strong></h6>
                                        <h6 class="m-0"><strong>Bank:</strong>
                                            {{ $item->bank_detail->bank->name ?? 'N/A' }}</h6>
                                    </div>
                                    @php
                                        if (!empty($item->whatsapp_number)) {
                                            $whatsapp_url = 'https://api.whatsapp.com/send?phone=' . $item->whatsapp_number . '&text=' . urlencode($set->msg_to_vendor);
                                        } else {
                                            $whatsapp_url = null;
                                        }
                                    @endphp
                                    <a target="_blank" href="{{ $whatsapp_url ? $whatsapp_url : 'javascript:void(0)' }}"
                                        @if ($whatsapp_url == null) onclick="event.preventDefault()" @endif>
                                        <img src="{{ asset('asset/front/img/whatsapp.png') }}" alt="User-Profile"
                                            class="img-fluid" width="50" style="object-fit: cover">
                                    </a>
                                </div>
                            </button>
                        </div>
                    </div>
                @empty
                    No vendor found!
                @endforelse
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('asset/front/lib/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        function copyToClipboard(text) {
            var sampleTextarea = document.createElement("textarea");
            document.body.appendChild(sampleTextarea);
            sampleTextarea.value = text; //save main text in it
            sampleTextarea.select(); //select textarea contenrs
            document.execCommand("copy");
            document.body.removeChild(sampleTextarea);
        }

        $(document).ready(function() {
            $('.account_id').click(function() {
                var text = $(this).find('span').text();
                copyToClipboard(text);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    text: 'Copied!',
                    toast: true,
                    showConfirmButton: false,
                    showClass: {
                        popup: 'animate__animated animate__fadeInRight'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutRight'
                    },
                    timer: 2000
                })
            })
        })
    </script>
@endsection
