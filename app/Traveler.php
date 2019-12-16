<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Traveler extends Model
{
    //
    //confirmado,pendiente,baja,cancelado
    //los que realizaron checking
    const CONFIRMADO='confirmado';
    //Fala realizar checking
    const PENDIENTE='pendiente';
    //dados de baja por el sistema, si no se realiza el checking'
    const BAJA='baja';
    //cuando se dan de baja
    const CANCELADO='cancelado';
    const ARRIBA='arriba';
    protected $fillable=['trip_id','user_id','me_subi','checking_id','estado'];

    public function trip(){
        return $this->belongsTo(Trip::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function checking(){
        return $this->belongsTo(Checking::class);
    }

    public function yaMePuntuo(){
        $score=Score::where('user_to_id',$this->user->id)->where('user_from_id',$this->trip->user->id)->where('trip_id',$this->trip->id)->first();
        return $score;
    }
    
    public function fechaViaje(){
        $fecha=Carbon::parse($this->fecha)->locale('es');
        return $fecha->isoFormat('MMMM Do YYYY');

    }
        //si el usuario ya le envio peticion a un viaje
    public function yaEnviePeticion(Trip $trip){
        $yaEnviePeticion=false;
        $request=Request::where('trip_id','=',$trip->id)->where('user_id','=',auth()->user()->id)->first();
        if($request==null){
            $yaEnviePeticion=false;
        }else{
            $yaEnviePeticion=true;
        }
        return $yaEnviePeticion;
    }
    public function pasajeros(Trip $trip){
        $pasajeros=Traveler::where('trip_id',$trip->id);
        return $pasajeros;  
    }

}
