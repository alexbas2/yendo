<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable=['user_to_id','user_from_id','trip_id','votos','comentario'];
}
