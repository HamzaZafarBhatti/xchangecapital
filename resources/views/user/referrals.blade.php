@extends('user.layout.app')

@section('title', 'My Referrals')

@section('css')
    <style>
        .swal2-popup.swal2-toast {
            width: unset !important;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <div class="header-title">
                        <h3 class="card-title pb-3">My Referrals</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Downline Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($downlines->isNotEmpty())
                                    @foreach ($downlines as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->downline_referral_log->get_amount ?? 'No Transfer has been done!' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">No Data Found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <div class="header-title">
                        <h3 class="card-title pb-3">My Referral Link</h3>
                    </div>
                </div>
                <div class="card-body">
                     <p><strong>Earn 3% Referral Earning from your downlines and referalls when they buy/Fund any Foreign
                        Currency to your Referral Earning Wallet.</strong></p>
                <br />
                <p><strong>Withdraw REFERRAL EARNINGS to your BANK in Naira/Rand every SUNDAY from 7am to 9am.</strong></p>
                    <div class="row align-items-center">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"
                                value="{{ route('user.register') . '?referral=' . auth()->user()->username }}"
                                placeholder="Referral Link" aria-label="Referral Link" id="referral_link"
                                aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">
                                <i class="icon">
                                    <svg style="color: rgb(255, 151, 29);" width="25" height="25" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 2C7.44772 2 7 2.44772 7 3C7 3.55228 7.44772 4 8 4H10C10.5523 4 11 3.55228 11 3C11 2.44772 10.5523 2 10 2H8Z"
                                            fill="#ff971d"></path>
                                        <path
                                            d="M3 5C3 3.89543 3.89543 3 5 3C5 4.65685 6.34315 6 8 6H10C11.6569 6 13 4.65685 13 3C14.1046 3 15 3.89543 15 5V11H10.4142L11.7071 9.70711C12.0976 9.31658 12.0976 8.68342 11.7071 8.29289C11.3166 7.90237 10.6834 7.90237 10.2929 8.29289L7.29289 11.2929C6.90237 11.6834 6.90237 12.3166 7.29289 12.7071L10.2929 15.7071C10.6834 16.0976 11.3166 16.0976 11.7071 15.7071C12.0976 15.3166 12.0976 14.6834 11.7071 14.2929L10.4142 13H15V16C15 17.1046 14.1046 18 13 18H5C3.89543 18 3 17.1046 3 16V5Z"
                                            fill="#ff971d"></path>
                                        <path d="M15 11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H15V11Z"
                                            fill="#ff971d"></path>
                                    </svg>
                                </i>
                            </span>
                        </div>
                    </div>
                </div>
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
            $('#basic-addon2').click(function() {
                var text = $('#referral_link').val();
                copyToClipboard(text);
                // swal({
                //     text: "Copied",
                //     toast: true,
                //     icon: "success",
                // })
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    text: 'Referral Link Successfully Copied!',
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
