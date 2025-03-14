@extends('theme.layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-54 offset-4">
                <div clas="form-group">
                    <form action="#" method="get">
                        @csrf
                        <label>Elige opción</label>
                        <select name="tipo_viaje" class="form-control">
                            <option value="pasajero">solicitados</option>
                            <option value="chofer" @if($tipo_viaje=='chofer')selected @endif>Creados</option>
                        </select>
                        <br>
                        <button class="btn btn-primary">Filtrar</button>
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
                                        
                                            <h3 class="h6 text-uppercase mb-0">{{$viaje->trip->user->apellido}} {{$viaje->trip->user->nombre}}</h3>
                                        </div>
                                        <div class="col-md-3">
                                            <img src="http://127.0.0.1:8000/theme/img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow align-content-end">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h4 class="text-black text-center">{{$viaje->trip->fechaViaje()}}</h4>
                                    <h4 class="text-black text-center">{{$viaje->trip->hora}}Hs</h4>
                                    <h6 class="text-black text-center">Ciudad: {{$viaje->trip->ciudad}}</h6>
                                    <h6 class="text-grey text-center">Origen: {{$viaje->trip->calle}}  {{$viaje->trip->numero}}</h6>
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
                                       
                                        </div> 
                                        <div class="row">
                                        @if( $viaje->trip->estado=='finalizado')
                                        <div class="col-md-12">
                                                <div class="alert alert-danger" role="alert">
                                                    <p class="text-center mt-1"><strong class="h6 text-uppercase mb-0">{{$viaje->trip->estado}}</strong></p>
                                                </div>
                                            </div>
                                        
                                            <div class="col offset-3">
                                                <a href="{{route('votar',$viaje->trip->id)}}" class="btn btn-primary">Votar</a>
                                            </div>
                                        @else
                                            <div class="col-md-12">
                                                <div class="alert alert-success" role="alert">
                                                    <p class="text-center mt-1"><strong class="h6 text-uppercase mb-0">{{$viaje->trip->estado}}</strong></p>
                                                </div>
                                            </div>
                                            <div class="col offset-3">
                                                <a href="{{route('trip.solicitado',$viaje->trip->id)}}" class="btn btn-primary">VER</a>
                                            </div>
                                            @if($viaje->me_subi == '0')
                                            <div class="col offset-3"><br>
                                            <a href="{{route('trip.checking',$viaje->id)}}" class="btn btn-primary">Hacer checking </a>
                                            </div>   
                                            @endif
  
                                        @endif
                                        </div>
                                    </div>
                                    <div class="chart-holder"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                        <canvas id="lineChart1" style="max-height: 14rem !important; display: block; width: 532px; height: 265px;" class="w-100 chartjs-render-monitor" width="532" height="265"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
            @empty
                    <div class="alert alert-warning" role="alert">
                        No hay viajes disponibles
                    </div>

            @endforelse
            @else
            @if($tipo_viaje=='chofer')
                @forelse($viajes as $viaje)                                    
                        <div class="col-md-4">
                        <br>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-9">
                                        
                                            <h4 class="h6 text-uppercase mb-0">Creador:</h4> 
                                            <h3 class="h6 text-uppercase mb-0">{{$viaje->user->apellido}} {{$viaje->user->nombre}}</h3>
                                        </div>
                                        <div class="col-md-3">
                                            <img src="http://127.0.0.1:8000/theme/img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow align-content-end">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                
                                <h4 class="text-black text-center">{{$viaje->fechaViaje()}}</h4>
                                    <h4 class="text-black text-center">{{$viaje->hora}}hs</h4>
                                    <h6 class="text-black text-center">Ciudad: {{$viaje->ciudad}}</h6>
                                    <h6 class="text-grey text-center">Origen: {{$viaje->calle}}  {{$viaje->numero}}</h6>
                                    <br>
                                    <div class="container">
                                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                @forelse($viaje->travelers as $viajante)
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
                                        @if( $viaje->estado=='finalizado')
                                        <div class="col-md-12">
                                                <div class="alert alert-success" role="alert">
                                                <p class="text-center mt-1"><strong class="h6 text-uppercase mb-0">{{$viaje->estado}}</strong></p>
                                               </div>
                                            </div>
                                        <div class="col offset-1">
                                                <a href="{{route('votar',$viaje->id)}}" class="btn btn-primary">Evaluar pasajeros</a>
                                        </div>

                                        @else
                                        
                                        <div class="col-md-12">
                                                <div class="alert alert-primary" role="alert">
                                                <p class="text-center mt-1"><strong class="h6 text-uppercase mb-0">{{$viaje->estado}}</strong></p>
                                               </div>
                                        </div>
                                        <div class="col offset-2">
                                        
                                        <a href="{{route('finaliza',$viaje->id)}}" class="btn btn-primary">finalizar</a>
                                          
                                          <div ><br>
                                          <a href="{{route('trip.show',$viaje->id)}}" class="btn btn-primary">Ver Detalles</a>
                                           </div>
                                           <div><br>
                                                <a href="{{route('finaliza',$viaje->id)}}" class="btn btn-primary">Solicitar cheking</a>
                                            </div>
                                        </div>
                                        
                                         @endif
                                        </div>
                                        <br>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
         
                @empty
                    <div class="alert alert-warning" role="alert">
                        No hay viajes disponibles
                    </div>
                    @endif


                @endforelse
            @endif







@endsection