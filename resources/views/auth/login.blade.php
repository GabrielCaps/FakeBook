@extends('layout.dashboard')

@section('content')
<div class="container-lg container-fluid">
    <div class="row justify-content-end mt-5 cart-phone">
        <div class="col-lg-4 col-md-12">
            <div class="shadow card">
                <div class="card-header text-center"><h3>Login</h3></div>

                <div class="card-body bg-transparent">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <div class="col-md-12">
                                <input id="email" type="email" class="placeholder border-dark form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{__ ('Email')}}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <input id="password" type="password" class="placeholder border-dark form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{__ ('Password')}}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <button type="submit" class="col-md-12 btn btn-primary">
                                    {{__ ('Login')}}
                            </button>
                        </div>

                        <div class="form-group row mb-0 mt-4 text-center">
                            <div class="col-md-12">
                               @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="row pb-4">
                    <div class="col-md-12 text-center">
                        <form action="{{route ('register')}}" method="get" accept-charset="utf-8">
                            <button class="btn btn-primary" type="submit">{{__ ('Register')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
