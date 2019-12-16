<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable=[
        'user_id',
         'fecha',
         'hora',
         'ciudad',
         'calle',
         'numero',
         'lugares_disponibles',
         'latitud',
         'longitud',
         'estado',
          ];
          
    const FINALIZADO='finalizado';
    const PROCESO='proceso';

    public function apuntadosViaje(){
        $total=$this->travelers->count();
        return $total;
    }


    public function conversation(){
        return $this->hasOne(Conversation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function requests(){
        return $this->hasMany(Request::class);
    }

    public function travelers(){
        return $this->hasMany(Traveler::class);
    }


    public function fechaViaje(){
        $fecha=Carbon::parse($this->fecha)->locale('es');
        return $fecha->isoFormat('MMMM Do YYYY');

    }

    public function soyViajanteDeEsteViaje(User $user){
        $soyViajante=false;
        $traveler=Traveler::where('trip_id','=',$this->id)->where('user_id','=',$user->id)->get();

        if($traveler!=null){
            $soyViajante=true;

        }
        return $soyViajante;

    }
    public function hizoChecking(Request $request){
        $traveler=Traveler::where('trip_id','=',$this->$request->id)
        ->where('user_id','=',auth()->user()->id)
        ->where('me_subi','=','1')
        ->get();

        if($traveler!=null){
            $hizo=true;
        }
        return $hizo;
    }
    
}
