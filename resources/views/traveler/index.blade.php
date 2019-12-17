@extends('theme.layout.app')

@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Evaluar usuarios del viaje</h3></div>
          
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Fecha</th>
               <th>Usuario</th>
               <th>voto</th>
               <th>comentario</th>
             </thead>
             <tbody>
              @if($traveler->count())  
              @foreach($traveler as $traveler)  
              <tr>
                <td>{{$traveler->trip->fecha}}</td>
                <td>{{$traveler->user->nombre}} {{$traveler->user->apellido}}</td>
                <td><input type='num' size='2'maxlength="2"  ></td>
                <td><input type='text'></td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay usuarios !!</td>
              </tr>
              @endif
              
            </tbody>

          </table>
          <div class="pull-right">
            <div class="btn-group">
           <a href="{{ route('score.create') }}" class="btn btn-info" >calificar</a>
                
            </div>
          </div>
      </div>
        </div>
        
      
    </div>
  </div>
</section>

@endsection