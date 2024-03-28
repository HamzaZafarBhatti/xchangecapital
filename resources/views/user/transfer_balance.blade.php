@extends('user.layout.app')

@section('title', 'Transfer Balance')

@section('content')
    @include('user.partials.user_verfication_notice')
    <div class="card">
        <div class="card-header">
            <div class="header-title">
                <h3><strong>Foreign Currency Tranfer Window<br /></strong></h3>
                <h4 class="card-title pb-3">TRANSFER Dollars or Pounds to anyone on ARBYVEST</h4>
                <span class="card-subtitle">
                    Only APPROVED CURRENCY AGENTS can be able to Transfer Foreign Currencies of US Dollars or British Pounds
                    to anyone
                </span>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('user.do_transfer_balance') }}" method="post">
                @csrf
                <p class="h5 text-success">Minimum Transfer Amount: $10/£10</p>
                <p class="h5 text-success">Maximum Transfer Amount:
                    ${{ $set->max_deposit_by_vendor }}/£{{ $set->max_deposit_by_vendor }}</p><br>
                <p class="h5 text-success">Enter Amount & Click on "TRANSFER NOW".</p>
                <div class="row align-items-center">
                    <div class="col-md-4 col-12 pt-3">
                        <div class="form-group">
                            <h3 class="text-warning">AMOUNT TO TRANSFER</h3>
                            <input type="number" name="amount" step=".01" min="0.00"
                                class="form-control @if ($errors->get('amount')) is-invalid @endif" placeholder="0.00"
                                aria-label="0.00" aria-describedby="amount">
                            @if ($errors->get('amount'))
                                <div class="invalid-feedback">
                                    @foreach ((array) $errors->get('amount')[0] as $message)
                                        {{ $message }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4 col-12 pt-3">
                        <h3 class="text-warning">SELECT CURRENCY</h3>
                        <div class="form-check @if ($errors->get('currency')) is-invalid @endif">
                            <input type="radio" class="form-check-input" name="currency" id="usd" value="usd">
                            <label for="usd" class="form-check-label pl-2">US Dollars
                                ({{ auth()->user()->get_usd_wallet }})</label>
                        </div>
                        <div class="form-check @if ($errors->get('currency')) is-invalid @endif">
                            <input type="radio" class="form-check-input" name="currency" id="gbp" value="gbp">
                            <label for="gbp" class="form-check-label pl-2">British Pounds
                                ({{ auth()->user()->get_gbp_wallet }})</label>
                        </div>
                        @if ($errors->get('currency'))
                            <div class="invalid-feedback">
                                @foreach ((array) $errors->get('currency')[0] as $message)
                                    {{ $message }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4 col-12 pt-3">
                        <div class="form-group">
                            <h3 class="text-warning">RECIPIENT ACCOUNT ID</h3>
                            <input type="text" name="account_id"
                                class="form-control @if ($errors->get('account_id')) is-invalid @endif"
                                aria-describedby="account_id">
                            @if ($errors->get('account_id'))
                                <div class="invalid-feedback">
                                    @foreach ((array) $errors->get('account_id')[0] as $message)
                                        {{ $message }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-12 pt-3">
                        <div class="form-group">
                            <h3 class="text-warning">PIN</h3>
                            <input type="text" name="pin"
                                class="form-control @if ($errors->get('pin')) is-invalid @endif"
                                aria-describedby="pin">
                            @include('user.partials.change_pin')
                            @if ($errors->get('pin'))
                                <div class="invalid-feedback">
                                    @foreach ((array) $errors->get('pin')[0] as $message)
                                        {{ $message }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="pt-2">
                            <button class="btn btn-primary" type="submit">
                                TRANSFER NOW
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <p><span style="color: #ffffff;"><strong>Want to become one of our CURRENCY AGENTS and make Over $1000 Monthly in
                profits? <a href="https://arbyvest.com/contact" target="_blank">Simply Contact Us&nbsp;
                    Now!</a></strong></span></p>
    <div class="card">
        <div class="card-header">
            <div class="header-title">
                <h4 class="card-title">Transfer Balance Logs</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">S/N</th>
                            <th scope="col">TRANSFER REFERENCE</th>
                            <th scope="col">SENDER</th>
                            <th scope="col">RECEIVER</th>
                            <th scope="col">AMOUNT</th>
                            <th scope="col">DATE/TIMESTAMP</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($transfer_logs->isNotEmpty())
                            @foreach ($transfer_logs as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-uppercase">#{{ $item->ref_id }}</td>
                                    <td>{{ $item->vendor->name }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td class="text-uppercase">{{ $item->get_amount }}</td>
                                    <td>{{ date('M d, Y H:i A', strtotime($item->created_at)) }}</td>
                                    <td>
                                        @php
                                            $created_at_time = new Carbon\Carbon($item->created_at);
                                            $time_diff = $created_at_time->diffInHours(Carbon\Carbon::now());
                                        @endphp
                                        @if (!$item->is_reversed)
                                            @if ($time_diff < 1)
                                                <a href="{{ route('user.reverse_transfer_balance', $item->id) }}"
                                                    class="btn btn-primary" type="submit">
                                                    Reverse Transfer
                                                </a>
                                            @else
                                                COMPLETED
                                            @endif
                                        @else
                                            REVERSED
                                        @endif
                                    </td>
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
@endsection
