@extends('theme.layout.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>---}}
<div class="container">
    <div class="row align-items-center py-5">
        <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="{{asset('theme/img/viaje.jpg')}}" alt="" class="img-fluid"></div>
        </div>
        <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">Unco.Yendo</h1>
            <h2 class="mb-4">Bienvenido</h2>
            <p class="text-muted">Te recordamos que solo los alumnos de la Universidad Nacional del Comahue pueden ingresar</p>
            <form id="loginForm" method="post" action="{{ route('login') }}" class="mt-4">
                @csrf
                <div class="form-group mb-4">
                    <input type="text" name="email" placeholder="Correo Electrónico" class="form-control border-0 shadow form-control-lg" value="{{old('email')}}">
                </div>
                <div class="form-group mb-4">
                    <input type="password" name="password" placeholder="Contraseña" class="form-control border-0 shadow form-control-lg text-violet" value="{{old('password')}}">
                </div>
                <div class="form-group mb-4">
                    <div class="custom-control custom-checkbox">
                        <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                        <label for="customCheck1" class="custom-control-label">Recordame</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary shadow px-5">Iniciar Sesión</button>
                <a href="{{route('register')}}" class="btn btn-primary shadow px-5">Registrarme</a>
            </form>
        </div>
    </div>

    <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)                 -->
</div>

@endsection
