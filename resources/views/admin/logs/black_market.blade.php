@extends('admin.layout.master')

@section('title', 'Black Market Logs')

@section('content')
    <div class="content">
        <div class="row">
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
                                @if ($logs->isNotEmpty())
                                    @foreach ($logs as $k => $val)
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
                                                            <a href="#" class="list-icons-item"
                                                                data-toggle="dropdown">
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
