<?php
namespace App\Http\Controllers;
use App\Ad;
use Illuminate\Http\Request;
class AdController extends Controller
{
    //
    public function create(){
        return view('ad.create');
    }
    public function store(Request $request){
        // $hora = strtotime($request->hora);
         $ad=Ad::create([
            'user_id'=>auth()->user()->id,
            'fecha'=>$request->fecha,
            'hora'=>$request->hora,
            'descripcion'=>$request->descripcion,
            'ciudad'=>$request->ciudad,
            'calle'=>$request->calle,
            'numero'=>$request->numero,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud
         ]);
         return response()->json(['Ad'=>$ad],200);
     }
    public function anuncio(){
        return view('trip.anuncio');
    }
}