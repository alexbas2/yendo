@extends('theme.layout.app')
@section('content')
    <div class="col-lg-10 mb-4 mb-lg-0">
        <div class="card">
            <div class="card-header">
                <h2 class="h6 text-uppercase mb-0">{{$viaje->fechaViaje()}}</h2>
            </div>
            <div class="card-body">
                @if(session("mensaje"))
                    <div class="alert alert-success" role="alert">
                        {{session('mensaje')}}
                    </div>
                @endif
                <h4 class="text-center">fecha {{$viaje->fecha}}</h4>
                <h4 class="text-center">{{$viaje->hora}}</h4>
                <h4 class="text-center">{{$viaje->calle}} {{$viaje->numero}}</h4>
                <h3 class="text-center">Creador del viaje</h3>
                <br>
                <div class="row">
                    <div class="col-lg-5 d-flex align-items-center flex-column flex-lg-row text-center text-md-left offset-4"><img src="{{asset('theme/img/avatar-1.jpg')}}" alt="..." style="max-width: 3rem" class="rounded-circle mx-3 my-2 my-lg-0">
                        <h5 class="mb-0">Nombre:  </h5>
                    </div>
                    <div class="col-lg-3 d-flex align-items-center flex-column flex-lg-row text-center text-md-left offset-4">
                        <h6 class="mb-0">Legajo: </h6>
                    </div>

                </div>
                <br>
                <h6 class="text-left">Participantes</h6>
                <div class="row">
                <div class="col-lg-5 d-flex align-items-center flex-column flex-lg-row text-center text-md-left offset-4"><img src="{{asset('theme/img/avatar-1.jpg')}}" alt="..." style="max-width: 3rem" class="rounded-circle mx-3 my-2 my-lg-0">
                <h6 class="mb-0">participante 1  </h6>
                <h6 class="mb-0">participante 2  </h6>
                </div> 
                </div>
                <br>
                <div class="row offset-4">
                   
                    <div class="col-md-4">
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Enviar votacion</button>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Modal Form-->
    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Evaluaras a </h4>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    @include('messages.content',['viaje'=>$viaje])
                </div>
                <form class="container" action="{{route('mensaje.store')}}" method="post">
                    <input type="hidden" name="conversation_id" value="{{($viaje->conversation!=null)?$viaje->conversation->id:null}}">
                    @if($viaje->conversation==null)
                      <input type="hidden" name="trip_id" value="{{$viaje->id}}">
                    @endif
                    @csrf
                 <div class="form-group">
                    <div class="input-field col s12">
                    Calificacion:
                    <select name="puntaje" required>
                    <option value="" disabled selected>Selecciona</option>
                    <br>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select>
                    
               </div>
                        <label>Comentario:</label>
                        <textarea name="comentario" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Enviar Votacion</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        //$('#myModal').modal('show')
    </script>
@endsection