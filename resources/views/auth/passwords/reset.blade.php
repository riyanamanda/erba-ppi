@extends('layouts.login')

@section('content')
<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div
                class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 mt-0 mt-md-5">
                <div class="login-brand">
                    <img src="{{ asset('assets/logo/logo.png') }}" alt="logo" width="200px" class="shadow-light">
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Reset Password</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">
                            <input id="email" type="hidden" class="form-control" name="email"
                                value="{{ old('email') ?? $email }}" readonly>

                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" tabindex="1">
                                @error('password')
                                <strong class="invalid-feedback">
                                    {{ $message }}
                                </strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" tabindex="2">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="simple-footer">
                    &copy;{{ now()->year }}. Ernaldi Bahar. Hak Cipta Dilindungi.
                </div>
            </div>
        </div>
    </div>
</section>
@endsection