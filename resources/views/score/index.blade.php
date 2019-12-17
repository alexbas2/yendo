@extends('theme.layout.app')

@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Evaluando</h3></div>
          <div class="pull-right">
            <div class="btn-group">
           <a href="" class="btn btn-info" >Añadir score</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>user_to</th>
               <th>user_from</th>
               <th>trip_id</th>
               <th>voto</th>
               <th>comentario</th>
             </thead>
             <tbody>
              @if($score->count())  
              @foreach($score as $score)  
              <tr>
                <td>{{$score->user_to_id}}</td>
                <td>{{$score->user_from_id}}</td>
                <td>{{$score->trip_id}}</td>
                <td>{{$score->votos}}</td>
                <td>{{$score->comentario}}</td>
               
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registros !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      
    </div>
  </div>
</section>

@endsection