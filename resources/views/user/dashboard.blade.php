@extends('user.layout.app')

@section('title', 'Account Dashboard')

@section('css')
    <style>
        select.form-select {
            -webkit-appearance: menulist !important;
            -moz-appearance: menulist !important;
            -ms-appearance: menulist !important;
            -o-appearance: menulist !important;
            appearance: menulist !important;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row align-items-center mb-4">
                <div class="col-12 col-lg-6">
                    <div class="card mb-xl-0">
                        <div class="card-body ">
                            <div class="d-flex flex-column align-items-center flex-md-row gap-3">
                                <img src="{{ asset(auth()->user()->image ? auth()->user()->get_user_image : 'asset/user/images/avatars/01.png') }}"
                                    class="img-fluid avatar avatar-90 avatar-rounded" alt="img8"
                                    style="object-fit: cover">
                                <div class="d-flex flex-column justify-content-evenly text-center text-md-start">
                                    <span class="h5">
                                        Welcome, {{ auth()->user()->name }}!
                                    </span>
                                    <span class="text-primary">
                                        Account ID: <span class="text-uppercase">{{ auth()->user()->account_id }}</span>
                                    </span>
                                    <span class="text-white">
                                        Account Verification Status:
                                        @if (auth()->user()->is_verified)
                                            <span class="text-uppercase text-success">verified</span>
                                        @else
                                            <span class="text-uppercase text-danger">unverified</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card shining-card">
                                <div class="card-body text-center text-md-start">
                                    <img src="{{ asset('asset/user/images/flags/usa.svg') }}"
                                        class="img-fluid avatar avatar-70" alt="img60">
                                    <br class="d-block d-md-none">
                                    <span class="fs-5 me-2">SafeCAPITAL USD</span>
                                    <small><a href="#">wallet</a></small>
                                    <div class="pt-2">
                                        <h4 style="visibility: visible;">SafeCAPITAL Balance</h4>
                                        <h4 class="counter" style="visibility: visible;">{{ auth()->user()->getSctWallet }}
                                        </h4>
                                    </div>
                                    <div class="pt-2">
                                        <a href="{{ route('user.buy_capital.merchants') }}" class="btn btn-primary w-100"
                                            type="button">
                                            Buy SCT from Merchants
                                        </a>
                                    </div>
                                    <div class="pt-2">
                                        <a href="{{ route('user.sell_to_blackmarket') }}" class="btn btn-primary w-100"
                                            type="button">
                                            Convert SCT to USD
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shining-card">
                                <div class="card-body text-center text-md-start">
                                    <img src="{{ asset('asset/user/images/flags/uk.svg') }}"
                                        class="img-fluid avatar avatar-70" alt="img60">
                                    <br class="d-block d-md-none">
                                    <span class="fs-5 me-2">US Dollars</span>
                                    <small><a href="#">wallet</a></small>
                                    <div class="pt-2">
                                        <h4 style="visibility: visible;">USD Balance</h4>
                                        <h4 class="counter" style="visibility: visible;">{{ auth()->user()->getUsdWallet }}
                                        </h4>
                                    </div>
                                    <div class="pt-2">
                                        <a href="{{ route('user.buy_capital.merchants') }}" class="btn btn-primary w-100"
                                            type="button">
                                            Convert USD to NAIRA
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shining-card">
                                <div class="card-body text-center text-md-start">
                                    <img src="{{ asset('asset/user/images/flags/nigeria.svg') }}"
                                        class="img-fluid avatar avatar-70" alt="img60">
                                    <br class="d-block d-md-none">
                                    <span class="fs-5 me-2">Nigerian Naira</span>
                                    <small><a href="#">wallet</a></small>
                                    <div class="pt-2">
                                        <h4 style="visibility: visible;">NGN Balance</h4>
                                        <h4 class="counter" style="visibility: visible;">{{ auth()->user()->getNgnWallet }}
                                        </h4>
                                    </div>
                                    <div class="pt-2">
                                        <a href="{{ route('user.withdraw') }}" class="btn btn-primary w-100"
                                            type="button">
                                            Withdraw to Bank
                                        </a>
                                    </div>
                                    <p style="text-align: center;">Withdrawals is Every Wednesdays (7am to 10am)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shining-card">
                                <div class="card-body text-center text-md-start">
                                    <img src="{{ asset('asset/user/images/flags/nigeria.svg') }}"
                                        class="img-fluid avatar avatar-70" alt="img60">
                                    <br class="d-block d-md-none">
                                    <span class="fs-5 me-2">Refferal Earnings</span>
                                    <small><a href="#">wallet</a></small>
                                    <div class="pt-2">
                                        <h4 style="visibility: visible;">Refferal Balance</h4>
                                        <h4 class="counter" style="visibility: visible;">
                                            {{ auth()->user()->getRefNgnWallet }}
                                        </h4>
                                    </div>
                                    <div class="pt-2">
                                        <a href="https://arbyvest.com/app/withdraw_referral" class="btn btn-primary w-100"
                                            type="button">
                                            Withdraw Ref Earnings
                                        </a>
                                    </div>
                                    <p style="text-align: center;">Withdrawals is Every Sundays (7am to 10am)</p>
                                </div>
                            </div>
                        </div>
                        @include('user.partials.user_verfication_notice')
                        <div class="col-lg-12">
                            @include('user.partials.blackmarket_form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="header-title">
                        <h4 class="card-title">FUNDING LOG</h4>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-inline m-0 p-0">
                        @if ($transfer_logs->isNotEmpty())
                            @foreach ($transfer_logs as $item)
                                <li class="d-flex  align-items-center pt-3">
                                    <div class="d-flex justify-content-between rounded-pill">
                                        <div class="ms-3 flex-grow-1">
                                            <h6
                                                class="mb-2 {{ $item->vendor_account_id == $user_account_id ? 'text-danger' : 'text-success' }}">
                                                {{ $item->get_amount }} Transfer
                                                {{ $item->vendor_account_id == $user_account_id ? 'to ' . ($item->user->name ?? 'N/A') : 'from ' . ($item->vendor->name ?? 'N/A') }}
                                            </h6>
                                            <p class="text-primary mb-2">
                                                {{ date('M d, Y - h:i:sa', strtotime($item->created_at)) }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li class="d-flex  align-items-center pt-3">
                                No Record Found
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="header-title">
                        <h4 class="card-title">Black Market Sell Logs</h4>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-inline m-0 p-0">
                        @if ($blackmarket_logs->isNotEmpty())
                            @foreach ($blackmarket_logs as $item)
                                <li class="d-flex  align-items-center pt-3">
                                    <div class="d-flex justify-content-between rounded-pill">
                                        <div class="ms-3 flex-grow-1">
                                            <h6 class="mb-2">-<span
                                                    class="text-uppercase">{{ $item->get_amount_sold }}</span> Sold from
                                                Black Market to NGN Wallet</h6>
                                            <p class="text-primary mb-2">
                                                {{ date('M d, Y - h:i:sa', strtotime($item->updated_at)) }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li class="d-flex  align-items-center pt-3">
                                No Record Found
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="header-title">
                        <h4 class="card-title">Withdrawal Logs</h4>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-inline m-0 p-0">
                        @if ($withdraws->isNotEmpty())
                            @foreach ($withdraws as $item)
                                <li class="d-flex  align-items-center pt-3">
                                    <div class="d-flex justify-content-between rounded-pill">
                                        <div class="ms-3 flex-grow-1">

                                            <h6 class="mb-2">-{{ $item->get_amount }} Withdrawal
                                                {{ $item->get_status }} from NGN Wallet to Bank Account
                                            </h6>
                                            <p class="text-primary mb-2">
                                                {{ date('M d, Y - h:i:sa', strtotime($item->updated_at)) }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <li class="d-flex  align-items-center pt-3">
                                No Record Found
                            </li>
                        @endif
                        {{-- 
                        <li class="d-flex  align-items-center pt-3">
                            <div class="d-flex justify-content-between rounded-pill">
                                <div class="ms-3 flex-grow-1">
                                    <h6 class="mb-2">-₦56,990 Withdrawal DECLINED from NGN Wallet to Bank Account</h6>
                                    <p class="text-primary mb-2">11/02/21</p>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex  align-items-center pt-3">
                            <div class="d-flex justify-content-between rounded-pill">
                                <div class="ms-3 flex-grow-1">
                                    <h6 class="mb-2">-₦56,990 Withdrawal PENDING from NGN Wallet to Bank Account</h6>
                                    <p class="text-primary mb-2">11/02/21</p>
                                </div>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="header-title">
                        <h3 class="card-title pb-3">BLACK MARKET HISTORY</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Amount Sold</th>
                                    <th scope="col">Exchanged Value</th>
                                    <th scope="col">Estimated Sales Time</th>
                                    <th scope="col">Transaction Reference</th>
                                    <th scope="col">Sell Time</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($blackmarketlogs->isNotEmpty())
                                    @foreach ($blackmarketlogs as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->get_amount_sold }}</td>
                                            <td>{{ $item->get_amount_exchanged }}</td>
                                            <td>
                                                @if ($item->status)
                                                    <span class="badge bg-success">
                                                        SUCCESSFUL
                                                    </span>
                                                @else
                                                    {{ date('M d, Y H:i A', strtotime($item->completed_at)) }}
                                                @endif
                                            </td>
                                            <td class="text-uppercase">{{ $item->ref_id }}</td>
                                            <td>{{ date('M d, Y H:i A', strtotime($item->created_at)) }}</td>
                                            <td>
                                                @if ($item->status)
                                                    <span class="badge bg-success">
                                                        Completed<img
                                                            src="https://arbyvest.com/asset/front/img/uploads/check0marke3-removebg-preview.png"
                                                            width="21" height="21" />
                                                    </span>
                                                @else
                                                    <span class="badge bg-warning">
                                                        Pending<img
                                                            src="https://arbyvest.com/asset/user/images/Cube-0.5s-187px.gif"
                                                            width="24" height="24" />
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">No Data Found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('asset/user/js/blackmarket.js') }}"></script>
@endsection
