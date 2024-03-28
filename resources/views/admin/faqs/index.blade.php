@extends('admin.layout.master')
@section('title', 'Frequently Asked Questions')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Faqs</h6>
                        <div class="header-elements">
                            <a class="font-weight-semibold text-dark" href="{{ route('admin.faqs.create') }}"><i
                                    class="icon-file-plus mr-2"></i>Create faq</a>
                        </div>
                    </div>
                    <div class="">
                        <table class="table datatable-show-all">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Questions</th>
                                    <th>Answers</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($faqs as $k => $val)
                                    <tr>
                                        <td>{{ ++$k }}.</td>
                                        <td>{{ $val->question }}</td>
                                        <td>{!! $val->answer !!}</td>
                                        <td>{{ date('Y/m/d h:i:A', strtotime($val->created_at)) }}</td>
                                        <td>{{ date('Y/m/d h:i:A', strtotime($val->updated_at)) }}</td>
                                        <td class="text-center">
                                            <div class="list-icons">
                                                <div class="dropdown">
                                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                        <i class="icon-menu9"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.faqs.edit', $val->id) }}"><i
                                                                class="icon-pencil7 mr-2"></i>Edit</a>
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
                                                    <a href="{{ route('admin.faqs.destroy', $val->id) }}"
                                                        onclick="event.preventDefault(); document.getElementById('{{ $val->id }}logout-form').submit();"
                                                        class="btn bg-danger">Proceed</a>
                                                    <form id="{{ $val->id }}logout-form"
                                                        action="{{ route('admin.faqs.destroy', $val->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="6">No Faqs added yet!</td>
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
