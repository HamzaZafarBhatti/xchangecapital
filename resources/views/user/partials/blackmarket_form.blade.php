<div class="card text-center text-md-start">
    <div class="card-header">
        <div class="header-title ">
            <h3><strong>BLACK-MARKET Window to Trade Your FOREIGN CURRENCIES To Your Local Currency<br /></strong></h3>
            <h4 class="card-title">Trade Dollars or Pounds on the BLACK MARKET</h4>
            <span class="card-subtitle">The Black Market is opened Monday to Friday<br>(You can
                trade your USD and GBP now).</span>
        </div>
    </div>
    <div class="card-body">
        <p class="h5 text-success">Minimum Trade Amount: $10/£10</p>
        <p class="h5 text-success">Maximum Trade Amount: ${{ $set->max_deposit_by_vendor }}/£{{ $set->max_deposit_by_vendor }}</p>
        <p class="h5 text-success">Enter Amount & Click on "TRADE NOW".</p>
        <form action="{{ route('user.do_sell_to_blackmarket') }}" method="post">
            @csrf
            <input type="hidden" id="currency" value="sct">
            <div class="pt-3">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-12">
                        <h3 class="text-warning">YOU TRADE</h3>
                        <div class="input-group mb-3">
                            <input type="number" step=".01" min="0.00" class="form-control @if ($errors->get('amount_sold')) is-invalid @endif" placeholder="0.00"
                                name="amount_sold" id="amount_sold" aria-label="0.00" aria-describedby="sell">
                            <span class="input-group-text" id="sell">
                                SCT
                            </span>
                            @if ($errors->get('amount_sold'))
                                <div class="invalid-feedback">
                                    @foreach ((array) $errors->get('amount_sold')[0] as $message)
                                        {{ $message }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-2 text-center d-none d-xl-block">
                        <svg id="svg_arrow" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M21.25 16.334V7.665C21.25 4.645 19.111 2.75 16.084 2.75H7.916C4.889 2.75 2.75 4.635 2.75 7.665L2.75 16.334C2.75 19.364 4.889 21.25 7.916 21.25H16.084C19.111 21.25 21.25 19.364 21.25 16.334Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M16.0861 12H7.91406" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M12.3223 8.25205L16.0863 12L12.3223 15.748" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <div class="col-xl-5 col-12">
                        <h3 class="text-warning">YOU RECEIVE</h3>
                        <div class="input-group mb-3">
                            <input type="number" step=".01" min="0.00" class="form-control @if ($errors->get('amount_exchanged')) is-invalid @endif" placeholder="0.00"
                                name="amount_exchanged" id="amount_exchanged" aria-label="0.00"
                                aria-describedby="receive" readonly>
                            <span class="input-group-text" id="receive">
                                USD
                            </span>
                            @if ($errors->get('amount_exchanged'))
                                <div class="invalid-feedback">
                                    @foreach ((array) $errors->get('amount_exchanged')[0] as $message)
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
                    @if (auth()->user()->is_verified)
                        <div class="col-md-12 text-center">
                            <div class="pt-2">
                                <button class="btn btn-primary" type="submit" id="">
                                    TRADE NOW!
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
