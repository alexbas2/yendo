<?php

namespace App\Http\Controllers;
use App\Score;
use App\User;
use App\Trip;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class ScoreController extends Controller
{

    public function index(Trip $trip){
        return view('trip.votar',['viaje'=>$trip]);
    }

    public function store(Request $request){
        $score=new Score();
        $score->user_to_id=$request->user_to;
        $score->user_from_id=auth()->user()->id;
        $score->comentario=$request->comentario;
        $score->trip_id=$request->trip_id;
        $score->votos=$request->puntaje;
        $score->save();
        return back()->with("mensaje", 'Se cargo correctamente la puntuación');;
    }

    public function ranking(){
        $usuarios = \DB::table('scores')->select('user_to_id','votos','comentario')
                     ->orderBy('votos','desc')
                    ->get();
        return view('trip.ranking',compact('usuarios'));
    }

}
