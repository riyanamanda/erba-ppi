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
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('login') }}" class="needs-validation" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" tabindex="1" autofocus>
                                @error('email')
                                <strong class="invalid-feedback">
                                    {{ $message }}
                                </strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                    <div class="float-right">
                                        <a href="{{ route('password.request') }}" class="text-small">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    tabindex="2">
                                @error('password')
                                <strong class="invalid-feedback">
                                    {{ $message }}
                                </strong>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                        id="remember-me">
                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
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