@extends('user.layout.app')

@section('title', 'Upload Payment proof')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="header-title">
                <h3 class="card-title pb-3">Upload Payment proof</h3>
                <span class="card-subtitle">
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('user.do_upload_proof') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-center">
                    <div class="col-12 pt-3">
                        <div class="form-group">
                            <h3 class="text-warning">Write A Very Good TESTIMONY CAPTION</h3>
                            <textarea name="caption" id="caption" cols="30" rows="10" class="form-control @if ($errors->get('caption')) is-invalid @endif"></textarea>
                            @if ($errors->get('caption'))
                                <div class="invalid-feedback">
                                    @foreach ((array) $errors->get('caption')[0] as $message)
                                        {{ $message }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 pt-3">
                        <div class="form-group">
                            <h3 class="text-warning">Upload Payment Proof</h3>
                            <input type="file" name="image" id="image" accept="image/png,jpg,jpeg" class="form-control @if ($errors->get('image')) is-invalid @endif" >
                            @if ($errors->get('image'))
                                <div class="invalid-feedback">
                                    @foreach ((array) $errors->get('image')[0] as $message)
                                        {{ $message }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="pt-2">
                            <button class="btn btn-primary" type="submit">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
