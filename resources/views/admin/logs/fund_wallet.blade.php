@extends('admin.layout.master')

@section('title', 'Fund Wallet Logs')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Fund Wallet Logs</h6>
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
                                @if ($logs->isNotEmpty())
                                    @foreach ($logs as $k => $val)
                                        <tr>
                                            <td>{{ ++$k }}.</td>
                                            <td>{{ $val->ref_id }}</td>
                                            <td>{{ $val->transaction_id }}</td>
                                            <td>{{ $val->user->name ?? 'N/A' }}</td>
                                            <td>{{ $val->get_requested_amount }}</td>
                                            <td>{{ $val->get_converted_amount }}</td>
                                            <td>{{ $val->get_fee }}</td>
                                            <td>{{ $val->get_charged_amount }}</td>
                                            <td>{{ $val->get_status }}</td>
                                            <td>{{ date('Y/m/d', strtotime($val->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="10">No log record found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
