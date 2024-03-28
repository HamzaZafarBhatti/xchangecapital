@extends('user.layout.app')

@section('title', 'Change Password')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="header-title">
                <h3 class="card-title pb-3">Change Account Password</h3>
                <p><strong>Secure your account by changing your password.</strong></p>
<p><span style="background-color: #ffff99; color: #ff0000;">DO NOT SHARE YOUR PASSWORD WITH ANYONE</span></p>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('user.password.update') }}" method="post">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="old_password" class="form-label">Old Password</label>
                            <input type="password" class="form-control @if ($errors->get('old_password')) is-invalid @endif"
                                id="old_password" name="old_password" required>
                            @if ($errors->get('old_password'))
                                <div class="invalid-feedback">
                                    @foreach ((array) $errors->get('old_password')[0] as $message)
                                        {{ $message }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control @if ($errors->get('password')) is-invalid @endif"
                                id="password" name="password" required>
                            @if ($errors->get('password'))
                                <div class="invalid-feedback">
                                    @foreach ((array) $errors->get('password')[0] as $message)
                                        {{ $message }}
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                required>
                        </div>
                    </div>
                </div>
                <div class="pt-2 text-center text-md-start">
                    <button class="btn btn-primary" type="submit">
                        Change Password
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
