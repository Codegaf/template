@extends('layouts.app')

@section('content')
    <div class="row min-h-fullscreen center-vh p-20 m-0">

        <div class="col-12">
            <div class="card card-shadowed px-50 py-30 w-400px mx-auto" style="max-width: 100%">
                <h5 class="text-uppercase">{{ __('Reset Password') }}</h5>
                <br>

                <form class="form-type-material" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        <label for="email">Email address</label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <label for="password">{{ __('Password') }}</label>

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

                    <br>
                    <button class="btn btn-bold btn-block btn-primary" type="submit">Reset</button>
                </form>
            </div>
        </div>


        <footer class="col-12 align-self-end text-center fs-13">
            <p class="mb-0"><small>Copyright © 2018 <a href="http://thetheme.io/theadmin">10code</a>. All rights reserved.</small></p>
        </footer>
    </div>
@endsection
