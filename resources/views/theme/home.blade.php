@extends('theme.layout.app')

@section('content')
    <div class="container">
        <div class="row">
            @forelse($viajes as $viaje)
                @if($viaje->soyViajanteDeEsteViaje(auth()->user())==false)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-9">
                                    <h3 class="h6 text-uppercase mb-0">Remigio Bosch 380</h3>
                                    <br>
                                    <h3 class="h6 text-uppercase mb-0">{{$viaje->user->apellido}} {{$viaje->user->nombre}}</h3>
                                </div>
                                <div class="col-md-3">
                                    <img src="http://127.0.0.1:8000/theme/img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow align-content-end">
                                </div>


                            </div>

                        </div>
                        <div class="card-body">

                            <h3 class="text-black text-center">{{$viaje->fechaViaje()}}</h3>
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
                                        <div class="alert alert-success" role="alert">
                                            <p class="text-center mt-1"><strong class="h6 text-uppercase mb-0">DISPONIBLE</strong></p>



                                        </div>
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
                 @else

                @endif
            @empty
                <div class="alert alert-warning" role="alert">
                    No hay viajes disponibles
                </div>

            @endforelse




        </div>

    </div>



@endsection
