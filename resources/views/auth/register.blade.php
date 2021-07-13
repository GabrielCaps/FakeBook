@extends('layout.dashboard')

@section('content')
<div class="container-lg container-fluid">
    <div class="row justify-content-end cart-phone mt-5">
        <div class="col-lg-4 col-md-12">
            <div class="card shadow">
                <div class="card-header text-center"><h3>{{__ ('Register')}}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12 mb-2">
                                <input id="name" type="text" placeholder="{{__ ('Name')}}" class="placeholder border-dark form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 mb-2">
                                <input id="email" type="email" placeholder="{{__ ('Email')}}" class="placeholder border-dark form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 mb-2">
                                <input id="password" type="password" placeholder="{{__ ('Password')}}" class="placeholder border-dark form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 mb-2">
                                <input id="password-confirm" type="password" placeholder="{{__ ('Confirm Password')}}" class="placeholder border-dark form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mt-4 mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{__ ('Create')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
