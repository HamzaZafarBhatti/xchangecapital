@extends('admin.layout.master')
@section('title', 'Edit Frequently Asked Questions')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Edit Faq</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.faqs.update', $faq->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Question:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="question" class="form-control" value="{{ $faq->question }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Answer:</label>
                                <div class="col-lg-10">
                                    <textarea type="text" name="answer" class="form-control tinymce">{{ $faq->answer }}</textarea>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn bg-dark">Submit<i
                                        class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
