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

        .container {
            padding: 20px 20px;
            background: darkblue;
            border-radius: .5rem;
            margin-bottom: 1rem;
        }

        .card {
            width: 50%;
        }

        @media (max-width: 768px) {
            .card {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.buy_capital.store') }}" method="post">
                @csrf
                <input type="hidden" name="merchant_id" value="{{ $vendor->id }}">
                <div class="form-group">
                    <label>Enter the amount of SafeCapital Token you want to buy</label>
                    <input type="number" name="amount" id="amount" required class="form-control" step=".01">
                    @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-6"><b>Merchant</b></div>
                        <div class="col-sm-6">{{ $vendor->name }}</div>
                        <div class="col-sm-6"><b>Merchant Rate</b></div>
                        <div class="col-sm-6">N{{ $vendor->sct_sell_price }}/SCT</div>
                        <div class="col-sm-6"><b>Amount Worth</b></div>
                        <div class="col-sm-6">N{{ $vendor->sct_wallet * $vendor->sct_sell_price }}</div>
                        <div class="col-sm-6"><b>Available Aruba (AWG)</b></div>
                        <div class="col-sm-6">{{ $vendor->sct_wallet }}SCT</div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Amount of Naira (NGN) to pay</label>
                    <input type="number" name="ngn_amount" id="ngn_amount" required class="form-control" step=".01">
                    @error('ngn_amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">BUY</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
<script>
    const sctAmountInput = document.getElementById('amount');
    const ngnAmountInput = document.getElementById('ngn_amount');
    const rate = '{{$vendor->sct_sell_price}}';
    sctAmountInput.addEventListener('input', function(e) {
        ngnAmountInput.value = sctAmountInput.value * rate
    })
    ngnAmountInput.addEventListener('input', function(e) {
        sctAmountInput.value = ngnAmountInput.value / rate
    })
</script>
@endsection
