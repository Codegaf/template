@extends('layouts.app')

@section('content')
    <div class="row min-h-fullscreen center-vh p-20 m-0">
        <div class="col-12">
            <div class="card card-shadowed px-50 py-30 w-400px mx-auto" style="max-width: 100%">
                <img src="{{ config('brand.main-logo') }}" class="img-fluid" alt="Tecaer">
                <br>

                <form method="POST" class="form-type-material" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <label for="email">{{ __('E-Mail Address') }}</label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="password">
                        <label for="password">Password</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group flexbox flex-column flex-md-row">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label">Remember me</label>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="text-muted hover-primary fs-13 mt-2 mt-md-0" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="form-group">
                        <button class="btn btn-bold btn-block btn-primary" type="submit">Login</button>
                    </div>
                </form>

                <div class="divider">Or Sign In With</div>
                <div class="text-center">
                    <a class="btn btn-square btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="btn btn-square btn-google" href="#"><i class="fa fa-google"></i></a>
                    <a class="btn btn-square btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
            <p class="text-center text-muted fs-13 mt-20">Don't have an account? <a class="text-primary fw-500" href="{{ route('register') }}">Sign up</a></p>
        </div>


        <footer class="col-12 align-self-end text-center fs-13">
            <p class="mb-0"><small>Copyright © 2018 <a href="http://thetheme.io/theadmin">TheAdmin</a>. All rights reserved.</small></p>
        </footer>
    </div>
@endsection
