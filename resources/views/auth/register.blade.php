@extends('layouts.app')

@section('content')

    <div class="hold-transition register-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="register-box">
                    <!-- /.login-logo -->
                    <div class="card card-outline card-primary">
                        <div class="card-header text-center">
                            <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
                        </div>
                        <div class="card-body">
                            <p class="login-box-msg">Registrate para ingresar</p>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="input-group mb-3">
                                    <input id="name" type="text" placeholder="{{ __('Name') }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>



                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="{{ __('E-Mail Address') }}"
   
                                    name="email" value="{{ old('email') }}" required autocomplete="email">


                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input id="password" type="password"
                                    placeholder="{{ __('Password') }}"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <input id="password-confirm" type="password"
                                        placeholder="{{ __('Confirm Password') }}" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-8">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                            <label for="agreeTerms">
                                                De acuerdo con los <a href="#">terminos</a>
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                            <p class="mb-0">
                                <a href="{{ route('login') }}" class="text-center">Ya tengo una cuenta</a>

                            </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

@endsection
