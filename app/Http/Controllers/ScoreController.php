<?php

namespace App\Http\Controllers;
use App\Score;
use App\User;
use App\Trip;
use App\Traveler;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class ScoreController extends Controller
{

    public function index()
    {
        //
        $score=Score::orderBy('id','DESC')->paginate(3);
        return view('Score.index',compact('score')); 
    }
    public function create()
    {
        //
        return view('Score.create');
    }
 
    public function show($id)
    {
        $score=Score::find($id);
        return  view('Score.show',compact('score'));
    }
    public function edit($id)
    {
        //
        $Score=Score::find($id);
        return view('Score.edit',compact('score'));
    }
    public function update(Request $request, $id)    {
        //
        $this->validate($request,
        [ 'user_to_id'=>'required',
        'user_from_id'=>'required',
        'trip_id'=>'required',
        'votos'=>'required',
        'comentario'=>'required']);
 
        Score::find($id)->update($request->all());
        return redirect()->route('Score.index')->with('success','Registro actualizado satisfactoriamente');
 
    }
    public function destroy($id)
    {
        //
         Score::find($id)->delete();
        return redirect()->route('Score.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function store1(Request $request){
        $score=new Score();
        $score->user_to_id=$request->user_to;
        $score->user_from_id=auth()->user()->id;
        $score->comentario=$request->comentario;
        $score->trip_id=$request->trip_id;
        $score->votos=$request->puntaje;
        $score->save();
        return back()->with("mensaje", 'Se cargo correctamente la puntuación');;
    }
    public function store(Request $request)
    {
        $score=new Score();
        $score->user_to_id='1';
        $score->user_from_id=auth()->user()->id;
        $score->comentario='prueba';
        $score->trip_id='1';
        $score->votos='0';
        $score->save();
         return redirect()->route('trip.misviajes')->with('success','Registro actualizado satisfactoriamente');

    }


    public function ranking(){
        $viaje = \DB::table('scores')
        ->select('user_to_id','votos','comentario')
        ->orderBy('votos','desc')
       ->get();
        return view('trip.ranking',['viaje'=>$viaje]);
    }



}
