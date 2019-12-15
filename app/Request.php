<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //
    protected $fillable=['trip_id','user_id','aceptado'];

    public function trip(){
        return $this->belongsTo(Trip::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
