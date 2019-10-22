@extends('layouts.app')

@section('content')
    <div class="row min-h-fullscreen center-vh p-20 m-0">
        <div class="col-12">
            <div class="card card-shadowed px-50 py-30 w-400px mx-auto" style="max-width: 100%">
                <h5 class="text-uppercase">Create an account</h5>
                <br>

                <form method="POST" class="form-type-material" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <label for="name">Name</label>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <label for="email">Email address</label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <label for="password">Password</label>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <label class="custom-control-label">I agree to all <a class="text-primary" href="#">terms</a></label>
                        </div>
                    </div>

                    <br>
                    <button class="btn btn-bold btn-block btn-primary" type="submit">Register</button>
                </form>
            </div>
            <p class="text-center text-muted fs-13 mt-20">Already have an account? <a class="text-primary fw-500" href="{{ route('login') }}">Sign in</a></p>
        </div>


        <footer class="col-12 align-self-end text-center fs-13">
            <p class="mb-0"><small>Copyright © 2018 <a href="http://thetheme.io/theadmin">TheAdmin</a>. All rights reserved.</small></p>
        </footer>
    </div>
@endsection
