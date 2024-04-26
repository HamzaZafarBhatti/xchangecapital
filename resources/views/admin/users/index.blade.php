@extends('admin.layout.master')

@section('title', 'Users')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Users</h6>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Account ID</th>
                                    <th>Refferal Upline</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($records as $k => $val)
                                    <tr>
                                        <td>{{ ++$k }}.</td>
                                        <td>{{ $val->name }}</td>
                                        <td>{{ $val->username }}</td>
                                        <td class="text-uppercase">{{ $val->account_id }}</td>
                                        <td>{{ $val->parent->name ?? 'N/A' }}</td>
                                        <td>{{ $val->email }}</td>
                                        <td>{{ $val->country ? $val->country->name : 'N/A' }}</td>
                                        <td>{{ $val->roles[0]?->name }}</td>
                                        <td>
                                            @if ($val->is_verified)
                                                <span class="badge badge-info">Verified</span>
                                            @else
                                                <span class="badge badge-danger">Unverified</span>
                                            @endif
                                        </td>
                                        <td>{{ date('Y/m/d', strtotime($val->created_at)) }}</td>
                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class='dropdown-item' href="{{ route('admin.users.edit', $val->id) }}"><i
                                                                class="icon-cogs spinner mr-2"></i>Manage account</a>
                                                        @if (!$val->hasRole('Vendor'))
                                                            <a class='dropdown-item'
                                                                href="{{ route('admin.users.make-vendor', $val->id) }}"><i
                                                                    class="icon-pencil mr-2"></i>Update to Vendor</a>
                                                        @endif
                                                        @if ($val->hasRole('Vendor'))
                                                            <a class='dropdown-item'
                                                                href="{{ route('admin.users.unmake-vendor', $val->id) }}"><i
                                                                    class="icon-pencil mr-2"></i>Remove from Vendor</a>
                                                        @endif
                                                        @if (!$val->is_blocked)
                                                            <a class='dropdown-item'
                                                                href="{{ route('admin.users.block', $val->id) }}"><i
                                                                    class="icon-eye-blocked2 mr-2"></i>Block</a>
                                                        @else
                                                            <a class='dropdown-item'
                                                                href="{{ route('admin.users.unblock', $val->id) }}"><i
                                                                    class="icon-eye mr-2"></i>Unblock</a>
                                                        @endif
                                                        <a data-toggle="modal" data-target="#{{ $val->id }}delete"
                                                            class="dropdown-item"><i class="icon-bin2 mr-2"></i>Delete
                                                            account</a>
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
                                                    <a href="{{-- {{ route('admin.users.delete', $val->id) }} --}}" class="btn bg-danger">Proceed</a>
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
        </div>
    </div>
@stop
