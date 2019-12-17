<?php

namespace App\Http\Controllers;

use App\Mail\Checking;
use App\Mail\RequestAccepted;
use App\Traveler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    //
    public function store(Request $request){
        $request=\App\Request::create([
            'trip_id'=>$request->trip_id,
            'user_id'=>auth()->user()->id,
        ]);
        return back()->with("mensaje", 'Se envio la petición correctamente!');
    }

    public function confirm($id){
        $request=\App\Request::findOrFail($id);
        $request->aceptado='si';
        if($request->save()){
            Mail::to($request->user->email)->send(new RequestAccepted($request));
            Traveler::create([
                'trip_id'=>$request->trip->id,
                'user_id'=>$request->user->id,
            ]);
            
        }
        //echo 'Solicitud de viaje aceptada';
        return view('trip.confirmado');
    }

    public function aceptado(){
        return view('trip.confirmado');
    }

 



}
