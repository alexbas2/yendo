@extends('theme.layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-54 offset-4">
                <div clas="form-group">
                    <form action="#" method="get">
                        @csrf
                    <div class="form-group row d-flex justify-content-center">
                    <label class="col-md-1 form-control-label">Fecha</label>
                <input id="fecha" name="fecha" type="date" class="form-control">
                        <button class="btn btn-primary">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            @if($tipo_viaje=='pasajero')
                @forelse($viajes as $viaje)

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h3 class="h6 text-uppercase mb-0"></h3>
                                            <br>
                                            <h3 class="h6 text-uppercase mb-0">{{$viaje->trip->user->apellido}} {{$viaje->trip->user->nombre}}</h3>
                                        </div>
                                        <div class="col-md-3">
                                            <img src="http://127.0.0.1:8000/theme/img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow align-content-end">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="text-black text-center">Fecha: {{$viaje->trip->fechaViaje()}}</h4>
                                    <h4 class="text-black text-center">Hora: {{$viaje->trip->hora}}</h4>
                                    <h4 class="text-black text-center">Ciudad: {{$viaje->trip->ciudad}}</h4>
                                    <h6 class="text-grey text-center">Calle: {{$viaje->trip->calle}}  {{$viaje->trip->numero}}</h6>
                                    
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    @forelse($viaje->trip->travelers as $viajante)
                                                        <div class="col-md-3">
                                                            <img src="http://127.0.0.1:8000/theme/img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow align-content-end">
                                                        </div>

                                                   @empty

                                                   @endforelse
                                                </div>
                                            </div>

                                        </div>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success" role="alert">
                                                    <p class="text-center mt-1"><strong class="h6 text-uppercase mb-0">Pasajero</strong></p>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col offset-3">
                                                <a href="{{route('trip.show',$viaje->id)}}" class="btn btn-primary">VER</a>

                                            </div>

                                        </div>


                                    </div>
                                    <div class="chart-holder"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                        <canvas id="lineChart1" style="max-height: 14rem !important; display: block; width: 532px; height: 265px;" class="w-100 chartjs-render-monitor" width="532" height="265"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>



                @empty
                <br>
                    <div class="alert alert-warning" role="alert">
                        No hay viajes disponibles
                    </div>

                @endforelse
            @else

                @forelse($viajes as $viaje)

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h3 class="h6 text-uppercase mb-0"></h3>
                                            <br>
                                            <h3 class="h6 text-uppercase mb-0">{{$viaje->user->apellido}} {{$viaje->user->nombre}}</h3>
                                        </div>
                                        <div class="col-md-3">
                                            <img src="http://127.0.0.1:8000/theme/img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow align-content-end">
                                        </div>


                                    </div>

                                </div>
                                <div class="card-body">

                                    <h4 class="text-black text-center">Fecha: {{$viaje->fechaViaje()}}</h4>
                                    <h4 class="text-black text-center">Hora: {{$viaje->hora}}</h4>
                                    <h4 class="text-black text-center">Ciudad: {{$viaje->ciudad}}</h4>
                                    <h6 class="text-grey text-center">Calle: {{$viaje->calle}}  {{$viaje->numero}}</h6>
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="http://127.0.0.1:8000/theme/img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow align-content-end">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img src="http://127.0.0.1:8000/theme/img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow align-content-end">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img src="http://127.0.0.1:8000/theme/img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow align-content-end">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <img src="http://127.0.0.1:8000/theme/img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow align-content-end">
                                                    </div>

                                                </div>





                                            </div>

                                        </div>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                       
                                                @if(auth()->user()->yaEnviePeticion($viaje))
                                                    <div class="alert alert-danger" role="alert">
                                                        <p class="text-center mt-1"><strong class="h8 text-uppercase mb-0">Ya enviaste una petición, aguarda la respuesta</strong></p>



                                                    </div>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col offset-3">
                                                <a href="{{route('trip.show',$viaje->id)}}" class="btn btn-primary">VER</a>

                                            </div>

                                        </div>


                                    </div>
                                    <div class="chart-holder"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                        <canvas id="lineChart1" style="max-height: 14rem !important; display: block; width: 532px; height: 265px;" class="w-100 chartjs-render-monitor" width="532" height="265"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                @empty
                @endforelse
            @endif
        </div>

    </div>
    
@endsection