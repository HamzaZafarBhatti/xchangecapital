@extends('admin.layout.master')

@section('title', 'Payment Proof Logs')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Payment Proof logs</h6>
                    </div>
                    <div class="">
                        <table class="table {{-- datatable-button-init-basic --}}datatable-basic">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Phone</th>
                                    <th>Caption</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($paymentproofs as $k => $val)
                                    <tr>
                                        <td>{{ ++$k }}.</td>
                                        <td>{{ $val->user->name ?? 'N/A' }}</td>
                                        <td>{{ $val->user->email ?? 'N/A' }}</td>
                                        <td>{{ $val->user->phone ?? 'N/A' }}</td>
                                        <td>{{ $val->caption }}</td>
                                        <td><img src="{{ asset('asset/payment_proofs/' . $val->image) }}"
                                                style="height: auto; max-width: 40%;"></td>
                                        <td>{{ $val->get_status }}</td>
                                        <td>{{ date('Y/m/d h:i:A', strtotime($val->created_at)) }}</td>
                                        <td>{{ date('Y/m/d h:i:A', strtotime($val->updated_at)) }}</td>
                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @if ($val->status == 0)
                                                            <a class='dropdown-item'
                                                                href="{{ route('admin.paymentproofs.approve', $val->id) }}"><i
                                                                    class="icon-thumbs-up3 mr-2"></i>Approve request</a>
                                                            <a class='dropdown-item'
                                                                href="{{ route('admin.paymentproofs.decline', $val->id) }}"><i
                                                                    class="icon-thumbs-down3 mr-2"></i>Decline request</a>
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
                                                    <h6 class="font-weight-semibold">Are you sure you want to delete this?
                                                    </h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link"
                                                        data-dismiss="modal">Close</button>
                                                    <a href="{{ route('admin.paymentproofs.delete', $val->id) }}"
                                                        class="btn bg-danger">Proceed</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="10">No Data found!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
