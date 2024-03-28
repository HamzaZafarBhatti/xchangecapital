@extends('admin.layout.master')

@section('title', 'Create Blog')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title font-weight-semibold">Create Blog</h6>
                <div class="header-elements">
                    <div class="list-icons text-orange-600">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="text-danger"></p>
                <form action="{{ route('admin.blogs.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Title:</label>
                        <div class="col-lg-10">
                            <input type="text" name="title" class="form-control" reqiured>
                            @if ($errors->get('title'))
                                @foreach ((array) $errors->get('title') as $message)
                                    <div class="error text-danger">{{ $message }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Post Date:</label>
                        <div class="col-lg-10">
                            <input type="date" name="post_date" id="post_date" class="form-control" reqiured>
                            @if ($errors->get('post_date'))
                                @foreach ((array) $errors->get('post_date') as $message)
                                    <div class="error text-danger">{{ $message }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Thumbnail:</label>
                        <div class="col-lg-10">
                            <input type="file" name="image" class="form-input-styled" data-fouc>
                            <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 1Mb</span>
                            @if ($errors->get('image'))
                                @foreach ((array) $errors->get('image') as $message)
                                    <div class="error text-danger">{{ $message }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Content:</label>
                        <div class="col-lg-10">
                            <textarea type="text" name="details" class="tinymce form-control"></textarea>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn bg-dark">Submit<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var now = new Date();
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear() + "-" + (month) + "-" + (day);
            $('#post_date').val(today);
        })
    </script>
@endsection
