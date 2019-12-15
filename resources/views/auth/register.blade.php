@extends('theme.layout.app')

@section('content')
{{-- registro--}}
{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <div class="row align-items-center py-5">
        <div class="col-5 col-lg-6 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="{{asset('theme/img/viaje.jpg')}}" alt="" class="img-fluid"></div>
        </div>
        <div class="col-lg-6 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">Unco.Yendo</h1>
            <h2 class="mb-4">Registro</h2>
            <p class="text-muted">Te recordamos que solo los alumnos de la Universidad Nacional del Comahue pueden ingresar</p>
            <form method="POST" action="{{ route('register') }}" >
                @csrf
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Nombre</label>
                    <div class="col-md-6">
                        <input name="nombre" type="text"  value="{{old('nombre')}}" class="form-control @error('nombre') is-invalid @enderror">
                        @error('nombre')
                            <div class="invalid-feedback ml-3">{{$message}}</div>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Apellido</label>
                    <div class="col-md-6">
                        <input name="apellido" value="{{old('apellido')}}" type="text" class="form-control @error('apellido') is-invalid @enderror">
                        @error('apellido')
                        <div class="invalid-feedback ml-3">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Legajo</label>
                    <div class="col-md-6">
                        <input name="legajo" value="{{old('legajo')}}" type="text" class="form-control @error('apellido') is-invalid @enderror" placeholder="fai-1832">
                        @error('legajo')
                        <div class="invalid-feedback ml-3">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Usuario</label>
                    <div class="col-md-6">
                        <input name="usuario" value="{{old('usuario')}}" type="text" class="form-control @error('usuario') is-invalid @enderror">
                        @error('usuario')
                        <div class="invalid-feedback ml-3">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Email</label>
                    <div class="col-md-6">
                        <input name="email" value="{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <div class="invalid-feedback ml-3">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Contraseña</label>
                    <div class="col-md-6">
                        <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback ml-3">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Repetir contraseña</label>
                    <div class="col-md-6">
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror ">
                        @error('password')
                        <div class="invalid-feedback ml-3">{{$message}}</div>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-3">

                        <button type="submit" class="btn btn-primary">Registrarme</button>
                    </div>
                </div>

            </form>

        </div>
    </div>

    <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)                 -->
</div>

@endsection
