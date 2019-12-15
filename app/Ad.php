<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //
    protected $fillable=[
        'user_id',
         'fecha',
         'hora',
         'descripcion',
         'ciudad',
         'calle',
         'numero',
         'latitud',
         'longitud',
          ];
          public function user(){
            return $this->belongsTo(User::class);
        }
        public function fechaViaje(){
            $fecha=Carbon::parse($this->fecha)->locale('es');
            return $fecha->isoFormat('MMMM Do YYYY');
    
        }
        public function requests(){
            return $this->hasMany(Request::class);
        }
          
}
