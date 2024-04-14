@extends('admin.layout.master')

@section('title', 'User Account')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">
                            Update account information
                        </h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Username:</label>
                                <div class="col-lg-10">
                                    <input type="" hidden value="{{ $user->id }}" name="id">
                                    <input type="text" name="username" class="form-control"
                                        value="{{ $user->username }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Name:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Email:</label>
                                <div class="col-lg-10">
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Mobile:</label>
                                <div class="col-lg-4">
                                    <input type="text" name="mobile" class="form-control" value="{{ $user->phone }}">
                                </div>
                                <label class="col-form-label col-lg-2">Pin:</label>
                                <div class="col-lg-4">
                                    <input type="text" name="pin" class="form-control" value="{{ $user->pin }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">NGN Wallet:</label>
                                <div class="col-lg-4">
                                    <input type="text" name="ngn_wallet" class="form-control"
                                        value="{{ $user->ngn_wallet }}">
                                </div>
                                <label class="col-form-label col-lg-2">Referral NGN Wallet:</label>
                                <div class="col-lg-4">
                                    <input type="text" name="ref_ngn_wallet" class="form-control"
                                        value="{{ $user->ref_ngn_wallet }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">USD Wallet:</label>
                                <div class="col-lg-4">
                                    <input type="text" name="usd_wallet" class="form-control"
                                        value="{{ $user->usd_wallet }}">
                                </div>
                                <label class="col-form-label col-lg-2">GBP Wallet:</label>
                                <div class="col-lg-4">
                                    <input type="text" name="sct_wallet" class="form-control"
                                        value="{{ $user->sct_wallet }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Country:</label>
                                <div class="col-lg-10">
                                    <select name="country_id" id="country_id" class="form-control">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($item->id === $user->country_id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">City:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="city" class="form-control" value="{{ $user->city }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Zip code:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="zip_code" class="form-control"
                                        value="{{ $user->zip_code }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Address:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="address" class="form-control"
                                        value="{{ $user->address }}">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn bg-dark">Update<i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Update user pin</h6>
                    </div>
                    <div class="card-body">
                        <div>
                            <ul class="list list-unstyled mb-0">
                                <li>Joined: <span
                                        class="font-weight-semibold">{{ date('Y/m/d h:i:A', strtotime($user->created_at)) }}</span>
                                </li>
                                <li>Last Updated: <span
                                        class="font-weight-semibold">{{ date('Y/m/d h:i:A', strtotime($user->updated_at)) }}</span>
                                </li>
                                <li>Birthday: <span
                                        class="font-weight-semibold">{{ $user->birthdate ?? 'Not Selected' }}</span>
                                </li>
                                <li>Document Type: <span
                                        class="font-weight-semibold">{{ $user->document_type ? $user->document_type->name : 'Not Selected' }}</span>
                                </li>
                                <li>Document:
                                    <span>
                                        @if (!$ext)
                                            <p>No Verfication Document Uploaded</p>
                                        @else
                                            @if ($ext == 'pdf')
                                                <a href="{{ $user_document_url }}" target="_blank">View Document</a>
                                            @else
                                                <img src="{{ $user_document_url }}" width="100%">
                                            @endif
                                        @endif
                                    </span>
                                </li>
                                <li>Selfie:
                                    <span>
                                        @if ($user->selfie)
                                            <img src="{{ asset($user->get_user_selfie) }}" width="100%">
                                        @else
                                            <p>No Selfie Uploaded</p>
                                        @endif
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-end" style="gap: .5rem;">
                            @if ($user->is_verified)
                                <form action="{{ route('admin.users.un_verify_account') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $user->id }}" name="user_id">
                                    <div class="text-right mt-3">
                                        <button type="submit" class="btn bg-dark">Unverify User</button>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('admin.users.verify_account') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $user->id }}" name="user_id">
                                    <div class="text-right mt-3">
                                        <button type="submit" class="btn bg-dark">Verify User</button>
                                    </div>
                                </form>
                            @endif
                            <form action="{{ route('admin.users.delete_verification') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $user->id }}" name="user_id">
                                <div class="text-right mt-3">
                                    <button type="submit" class="btn bg-danger">Decline</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Update user password</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update_password', $user->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Password:</label>
                                <div class="col-lg-10">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <div class="col-lg-10">
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                            <div class="text-right mt-3">
                                <button type="submit" class="btn bg-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Referrals</h6>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Downline Username</th>
                                    <th>Downline Name</th>
                                    <th>Email</th>
                                    <th>Account ID</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($downlines as $k => $val)
                                    <tr>
                                        <td>{{ ++$k }}.</td>
                                        <td>{{ $val->downline->username ?? 'N/A' }}</td>
                                        <td>{{ $val->downline->name ?? 'N/A' }}</td>
                                        <td>{{ $val->downline->email ?? 'N/A' }}</td>
                                        <td>{{ $val->downline->account_id ?? 'N/A' }}</td>
                                        <td>{{ $val->get_amount ?? 'No Transfer has been done!' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Transfer Balance logs</h6>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Ref</th>
                                    <th>Sender</th>
                                    <th>Receiver</th>
                                    <th>Amount</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transfer_logs as $k => $val)
                                    <tr>
                                        <td>{{ ++$k }}.</td>
                                        <td>{{ $val->ref_id }}</td>
                                        <td>{{ $val->vendor->name ?? 'N/A' }}</td>
                                        <td>{{ $val->user->name ?? 'N/A' }}</td>
                                        <td>{{ substr($val->amount, 0, 9) . ' ' . $val->currency }}</td>
                                        <td>{{ date('Y/m/d', strtotime($val->created_at)) }}</td>
                                        <td>{{ date('Y/m/d h:i:A', strtotime($val->updated_at)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Black Market Logs</h6>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Ref</th>
                                    <th>User</th>
                                    <th>Amount Sold</th>
                                    <th>Amount Exchanged</th>
                                    <th>Status</th>
                                    <th>Estimated Time</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($black_market_logs as $k => $val)
                                    <tr>
                                        <td>{{ ++$k }}.</td>
                                        <td>{{ $val->ref_id }}</td>
                                        <td>{{ $val->user->name ?? 'N/A' }}</td>
                                        <td>{{ $val->get_amount_sold }}</td>
                                        <td>{{ $val->get_amount_exchanged }}</td>
                                        <td>{{ $val->get_status }}</td>
                                        <td>
                                            @if ($val->status)
                                                SUCCESSFUL
                                            @else
                                                {{ date('M d, Y H:i A', strtotime($val->completed_at)) }}
                                            @endif
                                        </td>
                                        <td>{{ date('M d, Y H:i A', strtotime($val->created_at)) }}</td>
                                        <td class="text-center">
                                            @if ($val->status)
                                                COMPLETED
                                            @else
                                                <div class="list-icons">
                                                    <div class="dropdown">
                                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                            <i class="icon-menu9"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a data-toggle="modal"
                                                                data-target="#{{ $val->id }}delete"
                                                                class="dropdown-item"><i
                                                                    class="icon-bin2 mr-2"></i>Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    <div id="{{ $val->id }}delete" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6 class="font-weight-semibold">Are you sure you want to delete
                                                        this?
                                                    </h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link"
                                                        data-dismiss="modal">Close</button>
                                                    <button
                                                        onclick="event.preventDefault(); document.getElementById('{{ $val->id }}delete_form').submit()"
                                                        class="btn bg-danger">Proceed</button>
                                                    <form id="{{ $val->id }}delete_form"
                                                        action="{{ route('admin.delete_user_black_market_log', $val->id) }}"
                                                        method="post" style="display: none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Flutterwave Funding Logs</h6>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Ref</th>
                                    <th>Flutterwave Transaction ID</th>
                                    <th>User</th>
                                    <th>Requested Amount</th>
                                    <th>Converted Amount</th>
                                    <th>Admin Fee</th>
                                    <th>Charged Amount</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fund_wallet_logs as $k => $val)
                                    <tr>
                                        <td>{{ ++$k }}.</td>
                                        <td>{{ $val->ref_id }}</td>
                                        <td>{{ $val->transaction_id ?? 'N/A' }}</td>
                                        <td>{{ $val->user->name ?? 'N/A' }}</td>
                                        <td>{{ $val->get_requested_amount }}</td>
                                        <td>{{ $val->get_converted_amount }}</td>
                                        <td>{{ $val->get_fee }}</td>
                                        <td>{{ $val->get_charged_amount }}</td>
                                        <td>{{ $val->get_status }}</td>
                                        <td>{{ date('Y/m/d', strtotime($val->created_at)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">NGN Wallet Withdraws</h6>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Account Name</th>
                                    <th>Amount</th>
                                    <th>Account Number</th>
                                    <th>Bank Name</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($withdraws as $k => $val)
                                    <tr>
                                        <td>{{ ++$k }}.</td>
                                        <td>{{ $val->user->name }}
                                        </td>
                                        <td>{{ $val->get_amount }}</td>
                                        <td>{{ $val->bank_user->account_number ?? 'N/A' }}</td>
                                        <td>{{ $val->bank_user->bank->name ?? 'N/A' }}</td>
                                        <td>
                                            @if ($val->status == 0)
                                                <span class="badge badge-danger">Unpaid</span>
                                            @elseif($val->status == 1)
                                                <span class="badge badge-success">Paid</span>
                                            @elseif($val->status == 2)
                                                <span class="badge badge-info">Declined</span>
                                            @endif
                                        </td>
                                        <td>{{ date('Y/m/d h:i:A', strtotime($val->created_at)) }}</td>
                                        <td>{{ date('Y/m/d h:i:A', strtotime($val->updated_at)) }}</td>
                                        <td>
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @if ($val->status == 0)
                                                            <a class='dropdown-item' data-toggle="modal"
                                                                data-target="#{{ $val->id }}pay"><i
                                                                    class="icon-thumbs-up3 mr-2"></i>Approve
                                                                request</a>
                                                            <a class='dropdown-item'
                                                                href="{{ route('admin.withdraws.decline', $val->id) }}"><i
                                                                    class="icon-thumbs-down3 mr-2"></i>Decline
                                                                request</a>
                                                        @endif
                                                        <a data-toggle="modal" data-target="#{{ $val->id }}delete"
                                                            class="dropdown-item"><i class="icon-bin2 mr-2"></i>Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div id="{{ $val->id }}delete" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6 class="font-weight-semibold">Are you sure you want to delete
                                                        this?
                                                    </h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link"
                                                        data-dismiss="modal">Close</button>
                                                    <a href="{{ route('admin.withdraws.delete', $val->id) }}"
                                                        class="btn bg-danger">Proceed</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="{{ $val->id }}pay" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <form action="{{ route('admin.withdraws.approve') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $val->id }}">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="d-block font-weight-semibold">Select
                                                                Payment</label>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="payment" value="0">
                                                                    Full Payment
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="payment" value="1">
                                                                    Custom Payment
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group payment_value d-none">
                                                            <input type="text" name="payment_value"
                                                                class="form-control" placeholder="₦5000">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn bg-success">Approve</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Referral Earning Withdraws</h6>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Account Name</th>
                                    <th>Amount</th>
                                    <th>Account Number</th>
                                    <th>Bank Name</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ref_withdraws as $k => $val)
                                    <tr>
                                        <td>{{ ++$k }}.</td>
                                        <td>{{ $val->user->name }}</td>
                                        <td>{{ $val->get_amount }}</td>
                                        <td>{{ $val->bank_user->account_number ?? 'N/A' }}</td>
                                        <td>{{ $val->bank_user->bank->name ?? 'N/A' }}</td>
                                        <td>
                                            @if ($val->status == 0)
                                                <span class="badge badge-danger">Unpaid</span>
                                            @elseif($val->status == 1)
                                                <span class="badge badge-success">Paid</span>
                                            @elseif($val->status == 2)
                                                <span class="badge badge-info">Declined</span>
                                            @endif
                                        </td>
                                        <td>{{ date('Y/m/d h:i:A', strtotime($val->created_at)) }}</td>
                                        <td>{{ date('Y/m/d h:i:A', strtotime($val->updated_at)) }}</td>
                                        <td>
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @if ($val->status == 0)
                                                            <a class='dropdown-item' data-toggle="modal"
                                                                data-target="#{{ $val->id }}pay"><i
                                                                    class="icon-thumbs-up3 mr-2"></i>Approve
                                                                request</a>
                                                            <a class='dropdown-item'
                                                                href="{{ route('admin.referral_withdraws.decline', $val->id) }}"><i
                                                                    class="icon-thumbs-down3 mr-2"></i>Decline
                                                                request</a>
                                                        @endif
                                                        <a data-toggle="modal" data-target="#{{ $val->id }}delete"
                                                            class="dropdown-item"><i class="icon-bin2 mr-2"></i>Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div id="{{ $val->id }}delete" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6 class="font-weight-semibold">Are you sure you want to delete
                                                        this?
                                                    </h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link"
                                                        data-dismiss="modal">Close</button>
                                                    <a href="{{ route('admin.referral_withdraws.delete', $val->id) }}"
                                                        class="btn bg-danger">Proceed</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="{{ $val->id }}pay" class="modal fade" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <form action="{{ route('admin.referral_withdraws.approve') }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $val->id }}">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="d-block font-weight-semibold">Select
                                                                Payment</label>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="payment" value="0">
                                                                    Full Payment
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input"
                                                                        name="payment" value="1">
                                                                    Custom Payment
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group payment_value d-none">
                                                            <input type="text" name="payment_value"
                                                                class="form-control" placeholder="₦5000">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn bg-success">Approve</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
