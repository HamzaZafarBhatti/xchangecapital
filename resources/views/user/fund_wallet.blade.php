@extends('user.layout.app')

@section('title', 'Fund Wallet')

@section('css')
    <style>
        .vr {
            width: 2px;
        }

        .text-yellow {
            color: yellow;
        }

        @media (max-width: 430px) {
            .flutterwave-btn {
                font-size: 0.75rem;
                padding: 0.5rem 0.25rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="header-title">
                <h3 class="card-title pb-3">Fund Your Foreign Currency Wallet - Dollars or Pounds instantly using the OFFICIAL MARKET RATES with a secured Online Payment Gateway</h3>
                
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 d-flex align-items-center justify-content-between justify-content-sm-center gap-sm-5">
                    <h4 class="text-center">
                        <a href="{{ route('user.market_rates') }}" class="text-info">
                            MARKET RATES
                        </a>
                    </h4>
                    <span class="vr text-info opacity-100"></span>
                    <h4 class="text-center">
                        <a href="https://arbyvest.com/foreign-currency-resellers" target="_blank" class="text-info">
                            CONTACT CURRENCY AGENTS
                        </a>
                    </h4>
                </div>
                <div class="col-6">
                    <div class="text-center">
                        <img src="{{ asset('asset/user/images/flags/usa.svg') }}" class="img-fluid avatar avatar-70"
                            alt="img60">
                        <br class="d-block d-md-none">
                        <span class="fs-5 me-2">US Dollars</span>
                        <br class="d-block d-md-none">
                        <small><a href="#">wallet</a></small>
                        <div class="pt-2">
                            <h4 style="visibility: visible;">USD Balance</h4>
                            <h4 class="counter" style="visibility: visible;">{{ auth()->user()->get_usd_wallet }}</h4>
                        </div>
                        <div class="pt-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdropLive1">
                                Fund USD @ ₦553 by Flutterwave
                            </button>
                            {{-- <a href="javascript:void(0)" onclick="openModal('usd')" class="btn btn-primary flutterwave-btn"
                                type="button">
                                Fund USD @ ₦553 by Flutterwave
                            </a> --}}
                        </div>
                        <p class="text-info">Instant Funding upon payment confirmation</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-center">
                        <img src="{{ asset('asset/user/images/flags/uk.svg') }}" class="img-fluid avatar avatar-70"
                            alt="img60">
                        <br class="d-block d-md-none">
                        <span class="fs-5 me-2">British Pound</span>
                        <br class="d-block d-md-none">
                        <small><a href="#">wallet</a></small>
                        <div class="pt-2">
                            <h4 style="visibility: visible;">GBP Balance</h4>
                            <h4 class="counter" style="visibility: visible;">{{ auth()->user()->get_gbp_wallet }}</h4>
                        </div>
                        <div class="pt-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdropLive2">
                                Fund GBP @ ₦675 by Flutterwave
                            </button>
                            {{-- <a href="javascript:void(0)" onclick="openModal('gbp')" class="btn btn-primary flutterwave-btn"
                                type="button">
                                Fund GBP by Flutterwave
                            </a> --}}
                        </div>
                        <p class="text-info">Instant Funding upon payment confirmation</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr size="5px" class="opacity-100">
                </div>
                <div class="col-md-12">
                    <div class="header-title">
                <h3 class="card-title pb-3">Fund Your Foreign Currency Wallet with ACCOUNT ID: <span class="text-uppercase">{{ auth()->user()->account_id }}</span> Of Dollars/ Pounds using the OFFICIAL MARKET RATES from our Currency AGENTS | Get Agent to Fund you Dollars @ ₦553 & Pounds @ ₦675 rate</h3>
                       <br><span class="card-subtitle text-primary">You can FUND or BUY USD/GBP by asking any of our CURRENCY AGENTS to transfer you funds using Official Market Rates To ACCOUNT ID: <span class="text-uppercase">{{ auth()->user()->account_id }}</span> or you can simply fund instantly via Online Payment Gatway by Flutterwave</span>
                    <br>
                        Contact them & Send them your ACCOUNT ID: <span class="text-uppercase">{{ auth()->user()->account_id }}</span> To Transfer either DOLLAR or POUNDS to you
                        using OFFICIAL Market rate.
                        <br><br>
                         <a href="https://arbyvest.com/foreign-currency-resellers" target="_blank" class="btn btn-primary w-100" type="button">
                                            <i class="fa fa-external-link" aria-hidden="true"></i> Click Here to Contact our Currency AGENTS To Fund Your USD or GBP Wallet <span class="text-uppercase">{{ auth()->user()->account_id }}</span>
                                        </a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="header-title">
                <h4 class="card-title">Online Payment - Fund Wallet Logs</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">FUND WALLET REFERENCE</th>
                            <th scope="col">FUND AMOUNT</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">DATE/TIMESTAMP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($logs->isNotEmpty())
                            @foreach ($logs as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-uppercase">{{ $item->ref_id }}</td>
                                    <td>{{ $item->get_requested_amount }}</td>
                                    <td>{{ $item->get_status }}</td>
                                    <td>{{ date('M d, Y H:i A', strtotime($item->created_at)) }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No Data Found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdropLive1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLive1Label" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLive1Label">Fund USD by Flutterwave</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{ route('user.do_fund_wallet') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Enter Amount ($)</label>
                            <input type="hidden" name="currency" value="usd">
                            <input type="text" name="amount" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Fund</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdropLive2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLive2Label" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLive2Label">Fund GBP by Flutterwave</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{ route('user.do_fund_wallet') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Enter Amount (£)</label>
                            <input type="hidden" name="currency" value="gbp">
                            <input type="text" name="amount" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Fund</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if (Session::has('fund_success') && !empty(session('fund_success')->data))
        <script>
            swal({
                    title: "Your Payment Link is Ready!",
                    icon: "{{ session('fund_success')->status }}",
                    buttons: {
                        confirm: {
                            text: "Make Payment Now!",
                            value: "{{ session('fund_success')->data->link }}",
                        }
                    }
                })
                .then((value) => {
                    console.log(value);
                    if (value) {
                        window.location.href = value
                    }
                })
        </script>
    @endif
@endsection
