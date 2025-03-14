<?php

namespace App\Http\Controllers;
use App\Trip;
use App\Traveler;
use App\Mail\Votar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TripController extends Controller
{
    //
    public function buscar(Request $request){
    $tipo_viaje='pasajero';
    $misViajes=Trip::where('fecha','=',$request->fecha)
                    ->where('estado','!=','finalizado')
                    ->where('user_id','!=',auth()->user()->id)
                    ->get();
        return view('trip.buscar',['viajes'=>$misViajes,'tipo_viaje'=>$request->tipo_viaje]);
    }

    public function  index(){
        //viajes disponibles para viajar,(no muestra los viajes generados por el usuario autenticado)
        $viajes=Trip::where('user_id','==',auth()->user()->id)->get();
        return view('misviajes',['viajes'=>$viajes]);
   
    }
    public function create(){
        return view('trip.create');
    }
    public function store(Request $request){
         $trip=Trip::create([
            'user_id'=>auth()->user()->id,
            'fecha'=>$request->fecha,
            'hora'=>$request->hora,
            'ciudad'=>$request->ciudad,
            'calle'=>$request->calle,
            'numero'=>$request->numero,
            'lugares_disponibles'=>$request->lugares_disponibles,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud
         ]);

         return response()->json(['trip'=>$trip],200);
     }
     public function show(Trip $trip){
        return view('trip.show',['viaje'=>$trip]);
    }

    
    public function solicitado(Trip $trip){
        return view('trip.solicitado',['viaje'=>$trip]);
    }



    public function info(Trip $trip){
        return view('trip.info',['viaje'=>$trip]);
    }

    public function misViajes(Request $request){
        if(isset($request->tipo_viaje) && $request->tipo_viaje!=null){
            if($request->tipo_viaje=='pasajero'){
                $misViajes=auth()->user()->viajes;
            }else{
                $misViajes=Trip::where('user_id','=',auth()->user()->id)->get();
            }
        }else{
            $misViajes=auth()->user()->viajes;
        }
        return view('trip.misviajes',['viajes'=>$misViajes,'tipo_viaje'=>$request->tipo_viaje]);
    }

    public function anuncio(){
        return view('trip.anuncio');
    }

    public function viajes(Request $request){
        $viajes=Trip::where('fecha','=',$request->fecha)->get();
        return view('trip.index',['viajes'=>$viajes]);
    }
    
    public function finaliza($id){
        $request=\App\Trip::findOrFail($id);
        $request->estado='finalizado';
        $request->save();
        
        if($request->save()){
            $viajeros=Traveler::where('trip_id','=',$id)->get();
            Mail::to($request->user->email)
            ->send(new Votar($request));
        }
        
        return back()->with("mensaje", 'Se Finalizo correctamente el viaje');
    } 


    public function update(){
        return view('/');
    }




}
