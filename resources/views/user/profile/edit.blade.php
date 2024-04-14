@extends('user.layout.app')

@section('title', 'My Profile')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="header-title">
                                <h3 class="card-title pb-3">Account Profile</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email" class="form-label">E-mail</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                value="{{ $user->username }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="account_id" class="form-label">Account ID</label>
                                            <input type="text" class="form-control" id="account_id" name="account_id"
                                                value="{{ $user->account_id }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text"
                                                class="form-control @if ($errors->get('name')) is-invalid @endif"
                                                id="name" name="name" value="{{ $user->name }}" disabled>
                                            @if ($errors->get('name'))
                                                <div class="invalid-feedback">
                                                    @foreach ((array) $errors->get('name')[0] as $message)
                                                        {{ $message }}
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text"
                                                class="form-control @if ($errors->get('phone')) is-invalid @endif"
                                                id="phone" name="phone" value="{{ $user->phone }}" disabled>
                                            @if ($errors->get('phone'))
                                                <div class="invalid-feedback">
                                                    @foreach ((array) $errors->get('phone')[0] as $message)
                                                        {{ $message }}
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="whatsapp_number" class="form-label">Whatsapp #</label>
                                            <input type="text"
                                                class="form-control @if ($errors->get('whatsapp_number')) is-invalid @endif"
                                                id="whatsapp_number" name="whatsapp_number"
                                                value="{{ $user->whatsapp_number }}">
                                            @if ($errors->get('whatsapp_number'))
                                                <div class="invalid-feedback">
                                                    @foreach ((array) $errors->get('whatsapp_number')[0] as $message)
                                                        {{ $message }}
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="image">Profile Picture</label>
                                            <input type="file"
                                                class="form-control @if ($errors->get('image')) is-invalid @endif"
                                                id="image" name="image" accept="image/*">
                                            @if ($errors->get('image'))
                                                <div class="invalid-feedback">
                                                    @foreach ((array) $errors->get('image')[0] as $message)
                                                        {{ $message }}
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-2 text-center text-md-start">
                                    <button class="btn btn-primary" type="submit">
                                        Update Profile
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="header-title">
                        <h3 class="card-title pb-3">Account Information</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>My Wallets</h5>
                            <ul>
                                <li>USD Wallet: {{ $user->get_usd_wallet }}</li>
                                <li>GBP Wallet: {{ $user->get_sct_wallet }}</li>
                                <li>NGN Wallet: {{ $user->get_ngn_wallet }}</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <h5>Joined</h5>
                            <div>
                                {{ date('Y/m/d h:i:A', strtotime($user->created_at)) }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5>Document Type</h5>
                            <div>
                                {{ $user->document_type ? $user->document_type->name : 'Not Selected' }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5>Selfie</h5>
                            <div>
                                @if ($user->selfie)
                                    <img src="{{ asset($user->get_user_selfie) }}" width="100%">
                                @else
                                    <p>No Selfie Uploaded</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h5>Document Uplaoded</h5>
                            <div>
                                @if (!$ext)
                                    <p>No Verfication Document Uploaded</p>
                                @else
                                    @if ($ext == 'pdf')
                                        <a href="{{ $user_document_url }}" target="_blank">View Document</a>
                                    @else
                                        <img src="{{ $user_document_url }}" width="100%">
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
