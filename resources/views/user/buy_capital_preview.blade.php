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

        .flex-display {
            display: flex;
            align-items: center;
            justify-content: space-between;
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
        <div class="card-header">
            <h3>Buy Capital Token Order Details</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="flex-display">
                    <h6>Buying</h6>
                    <h6>SCT{{ $transaction->sct_amount }}</h6>
                </div>
            </div>
            <div class="container">
                <div class="flex-display">
                    <h6>Please Pay</h6>
                    <h6>NGN {{ $transaction->ngn_amount }}</h6>
                </div>
            </div>
            <div class="container">
                <h6>Merchant Username</h6>
                <p>{{ $vendor->name }}</p>
                <h6>Merchant WhatsApp</h6>
                <p>{{ $vendor->phone }}</p>
                <h6>Merchant Terms</h6>
                <div class="mb-3">
                    {!! $vendor->terms ? $vendor->terms : '<b>No Terms and Conditions</b>' !!}
                </div>
                <h6>Order Created</h6>
                <p>{{ $transaction->created_at->diffForHumans() }}</p>
                <h6>Order ID</h6>
                <p>{{ $transaction->order_id }}</p>
                <h6>Order Status</h6>
                <p>{{ $transaction->status }}</p>
                <h6>Payment Time Limit</h6>
                <p class="mb-0">{{ $settings->sct_buy_time }} minutes</p>
                <h5>
                    <span class="badge text-bg-success rounded-pill">00:
                        <span id="minutes">{{ $settings->sct_buy_time }}</span>:
                        <span id="seconds">00</span>
                    </span>
                </h5>
            </div>
            <div class="container">
                <p>Transfer amount to the merchant account provided below.</p>
                <h6>Merchant Bank Name</h6>
                <p>Guarranty Trust Bank</p>
                <h6>Merchant Account Name</h6>
                <p>John doe</p>
                <h6>Merchant Account Number</h6>
                <p>1234123123124</p>
            </div>
            <div class="container">
                <p>After Transferring the amount, upload screenshot and click on "Transferred, Notify Merchant" Button.</p>
                <form action="{{ route('user.buy_capital.complete') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                    <div class="form-group">
                        <input type="file" name="proof" id="proof" required class="form-control">
                    </div>
                    <div class="d-md-flex gap-3">
                        <button type="submit" class="btn btn-success">Transferred, Notify Merchant</button>
                        <button type="reset" class="btn btn-danger mt-sm-0 mt-3">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const minSpan = $('#minutes');
        const secSpan = $('#seconds');
        const sctBuyTime = '{{ $settings->sct_buy_time }}'
        const transactionCreateTime = '{{ $transaction->created_at }}'

        function getTime(timezone) {
            const date = new Date();
            const formatter = new Intl.DateTimeFormat('en-US', {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                timeZone: timezone
            });

            const dateString = formatter.format(date);
            return new Date(dateString).getTime();
        }

        function startTimer(initialDateTime, durationMinutes) {
            // Convert initialDateTime to milliseconds
            const initialTime = new Date(initialDateTime).getTime();

            // Calculate the end time by adding durationMinutes to initialTime
            const endTime = initialTime + (durationMinutes * 60 * 1000);

            // Update the timer every second
            const timerInterval = setInterval(updateTimer, 1000);

            function updateTimer() {
                // Get the current time
                const currentTime = getTime('{{ \Carbon\Carbon::now()->timezoneName }}');

                // Calculate the remaining time
                const remainingTime = endTime - currentTime;

                // Check if the timer has reached zero
                if (remainingTime <= 0) {
                    clearInterval(timerInterval); // Stop the timer
                    console.log("Timer has ended!");
                    minSpan.text('00')
                    secSpan.text('00')
                    return;
                }

                // Convert remaining time to minutes and seconds
                let minutes = Math.floor(remainingTime / (1000 * 60));
                if (parseInt(minutes) < 10) {
                    minutes = '0' + minutes
                }
                let seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
                if (parseInt(seconds) < 10) {
                    seconds = '0' + seconds
                }

                // Display the remaining time
                minSpan.text(minutes)
                secSpan.text(seconds)
            }
        }

        startTimer(transactionCreateTime, sctBuyTime);
    </script>
@endsection
