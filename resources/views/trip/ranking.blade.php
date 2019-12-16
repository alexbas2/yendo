@extends('theme.layout.app')
@section('content')
@forelse($viaje as $viaje)
    <div class="col-lg-10 mb-4 mb-lg-0">
        <div class="card">
            <div class="card-header">
                <h2 class="h6 text-uppercase mb-0">{{$viaje->user_to_id}}</h2>
            </div>
            <div class="card-body">
                
                <h4 class="text-left">Nombre:      {{$viaje->user_to_id}}</h4>

                <h6 class="text-left">Puntaje:    {{$viaje->votos}} </h6>
                <h6 class="text-left">Comentario:     {{$viaje->comentario}}</h6>
                
                
                <div class="row">
                <h6 class="text-left"> </h6>
                    <div class="col-lg-5 d-flex align-items-center flex-column flex-lg-row text-center text-md-left offset-4">
                    <img src="{{asset('theme/img/avatar-1.jpg')}}" alt="..." style="max-width: 3rem" class="rounded-circle mx-3 my-2 my-lg-0">
                    <h5 class="mb-0">  </h5>
                    </div>
                    <div class="col-lg-3 d-flex align-items-center flex-column flex-lg-row text-center text-md-left offset-4">
                        <h6 class="mb-0"> </h6>
                    </div>
                </div>
                <br>
                
                <div class="row">
                <h6 class="text-left"></h6>
                <div class="col-lg-5 d-flex align-items-center flex-column flex-lg-row text-center text-md-left offset-4">
                <h6 class="mb-0">  </h6>
                </div> 
                </div>
                

            </div>
        </div>
    </div>
    @endforeach

@endsection
@section('scripts')
    <script>
        //$('#myModal').modal('show')
    </script>
@endsection