<?php

namespace App\Http\Controllers;
use App\Traveler;
use Illuminate\Http\Request;

class TravelerController extends Controller
{
    //
    protected $fillable=['trip_id','user_id','checking_id','me_subi','estado'];


  public function checking($id){
    $requ=Traveler::where('trip_id','=',$id)
                    ->where('user_id','=',auth()->user()->id)
                    ->first();;
    $requ->me_subi='1';
    $requ->save();
    
    return back()->with("mensaje", 'se hizo el checking!');
    
}





}
