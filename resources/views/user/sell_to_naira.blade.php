@extends('user.layout.app')

@section('title', 'Sell to Black Market')

@section('css')
    <style>
        .deadline {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .deadline span {
            font-size: 2rem;
        }

        .deadline-format {
            width: 5rem;
            height: 5rem;
            display: grid;
            place-items: center;
            text-align: center;
        }

        .deadline-format span {
            display: block;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.85rem;
        }

        .deadline h4:not(.expired) {
            font-size: 2rem;
            margin-bottom: 0.25rem;
            letter-spacing: var(--spacing);
        }
    </style>
@endsection

@section('content')
    @include('user.partials.user_verfication_notice')
    @include('user.partials.naira_form')
    @if ($latest_log)
        <div class="card text-center text-md-start">
            <div class="card-header">
                <div class="header-title ">
                    <h4 class="card-title">Latest Black Market Sale</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ asset('asset/user/images/flags/uk.svg') }}" class="img-fluid avatar avatar-70"
                                alt="img60">
                            <h3>BLACK-MARKET Trading Window in progress...</h3>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3 class="text-success text-uppercase">{{ $latest_log->currency == 'usd' ? 'Dollar' : 'Pound' }}
                            sales added to black market pool</h3>
                    </div>
                    <div class="col-md-12">
                        <h5>
                            You have successfully placed black market sales of your {{ $latest_log->get_amount_sold }}
                            <br>
                            Please wait in for your SALES to be SUCCESSFULLY SOLD to the eWallet BUREAU DE CHANGE
                        </h5>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center">
                            <br>
                            <h4 class="deadline-heading">Remaining Time For Trade To Complete</h4>
                            <input type="hidden" id="extract_end_date"
                                value="{{ \Carbon\Carbon::parse($latest_log->completed_at) }}">
                            <div class="deadline">
                                <div class="deadline-format">
                                    <div>
                                        <h4 class="days"></h4>
                                        <span>days</span>
                                    </div>
                                </div>
                                <span>:</span>
                                <div class="deadline-format">
                                    <div>
                                        <h4 class="hours"></h4>
                                        <span>hours</span>
                                    </div>
                                </div>
                                <span>:</span>
                                <div class="deadline-format">
                                    <div>
                                        <h4 class="minutes"></h4>
                                        <span>mins</span>
                                    </div>
                                </div>
                                <span>:</span>
                                <div class="deadline-format">
                                    <div>
                                        <h4 class="seconds"></h4>
                                        <span>secs</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3 class="text-warning text-uppercase">
                            Expected Sales return: {{ $latest_log->get_amount_exchanged }}
                        </h3>
                    </div>
                    <div class="col-md-12">
                        <h3 class="text-uppercase">
                            Transaction Pool reference: {{ $latest_log->ref_id }}
                        </h3><br><br>
                        <a href="https://arbyvest.com/app/sell_to_blackmarket" class="btn btn-primary w-100" type="button">
                            CLICK HERE TO PLACE ANOTHER BLACK MARKET TRADE
                        </a>
                    </div>
                </div>

            </div>
        </div>
    @endif
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
                        @if ($logs->isNotEmpty())
                            @foreach ($logs as $item)
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
                                                Pending<img src="https://arbyvest.com/asset/user/images/Cube-0.5s-187px.gif"
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
@endsection

@section('script')
    <script src="{{ asset('asset/user/js/naira.js') }}"></script>
    <script>
        function getRemainingTime() {
            const today = new Date().getTime();
            var t = futureTime - today;

            const oneDay = 24 * 60 * 60 * 1000;
            const oneHour = 60 * 60 * 1000;
            const oneMinute = 60 * 1000;

            let days = Math.floor(t / oneDay);
            let hours = Math.floor((t % oneDay) / oneHour);
            let minutes = Math.floor((t % oneHour) / oneMinute);
            let seconds = Math.floor((t % oneMinute) / 1000);

            const values = [days, hours, minutes, seconds];

            function format(value) {
                if (value < 10) {
                    return (value = `0${value}`);
                }
                return value;
            }

            items.forEach(function(item, index) {
                item.innerHTML = format(values[index]);
            });
            if (t < 0) {
                // console.log('finished');
                clearInterval(countdown);
                $('.deadline').addClass('d-none');
                $('.deadline-heading').addClass('d-none')
                now = new Date();
                if (futureDateUTC < now) {
                    window.location.href = "{{ route('user.thankyou') }}"
                }
            }
        }

        function startCountdown() {
            countdown = setInterval(function() {
                getRemainingTime()
            }, 1000);
            getRemainingTime();
        }

        const items = document.querySelectorAll(".deadline-format h4");
        let countdown;
        var futureDate;
        var futureTime;
        var endDate = document.getElementById('extract_end_date')?.value;
        var futureDateUTC = new Date(Date.UTC(endDate?.slice(0, 4), endDate?.slice(5, 7) - 1, endDate?.slice(8, 10), endDate
            ?.slice(11, 13) - 1, endDate?.slice(14, 16), endDate?.slice(17, 19)));
        var now = new Date()
        console.log(futureDateUTC < now);
        if (futureDateUTC > now) {
            futureDate = futureDateUTC
            futureTime = futureDate.getTime();
            startCountdown();
        }
    </script>
@endsection
