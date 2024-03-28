@extends('admin.layout.master')

@section('title', 'Edit Blog')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title font-weight-semibold">Edit Blog</h6>
                    </div>
                    <div class="card-body">
                        <p class="text-danger"></p>
                        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Title:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}"
                                        reqiured>
                                </div>
                                @if ($errors->has('title'))
                                    <div class="error">{{ $errors->first('title') }}</div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Post Date:</label>
                                <div class="col-lg-10">
                                    <input type="date" name="post_date" id="post_date" value="{{ $blog->post_date }}"
                                        class="form-control" reqiured>
                                </div>
                                @if ($errors->has('post_date'))
                                    <div class="error">{{ $errors->first('post_date') }}</div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Thumbnail:</label>
                                <div class="col-lg-10">
                                    <input type="file" name="image" class="form-input-styled" data-fouc>
                                    <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size
                                        1Mb</span>
                                </div>
                                @if ($errors->has('image'))
                                    <div class="error">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Content:</label>
                                <div class="col-lg-10">
                                    <textarea type="text" name="details" class="tinymce form-control">{{ $blog->details }}</textarea>
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
            <div class="col-md-4">
                <div class="card-body text-center">
                    <div class="card-img-actions d-inline-block mb-3">
                        <img class="img-fluid" src="{{ asset('/asset/images/' . $blog->image) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
