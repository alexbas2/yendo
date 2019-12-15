<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //
    protected $fillable=['trip_id'];
    public function trip(){
        return $this->belongsTo(Trip::class);

    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
}
