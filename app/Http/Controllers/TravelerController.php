<?php

namespace App\Http\Controllers;
use App\Traveler;
use Illuminate\Http\Request;

class TravelerController extends Controller
{
    public function index($id)
    {
        $traveler=Traveler::where('trip_id','=',$id)
        ->where('user_id','!=',auth()->user()->id)
        ->get();
        return view('traveler.index',compact('traveler')); 
    }
    public function create()
    {
        return view('traveler.create');
    }
 
    public function show($id)
    {
        $traveler=Traveler::find($id);
        return  view('traveler.show',compact('traveler'));
    }
    public function edit($id)
    {
        //
        $traveler=Traveler::find($id);
        return view('traveler.edit',compact('traveler'));
    }
    public function update(Request $request, $id)    {
      $this->validate($request,
      [ 'trip_id'=>'required',
      'user_id'=>'required',
      'checking_id'=>'required',
      'me_subi'=>'required',
      'estado'=>'required']);
 
      Traveler::find($id)->update($request->all());
      return redirect()->route('traveler.index')->with('success','Registro actualizado satisfactoriamente');

  }
  public function destroy($id)
  {
      //
       Traveler::find($id)->delete();
      return redirect()->route('traveler.index')->with('success','Registro eliminado satisfactoriamente');
  }

  public function store(Request $request)
  {
      $this->validate($request,  
      [ 'trip_id'=>'required',
      'user_id'=>'required',
      'checking_id'=>'required',
      'me_subi'=>'required',
      'estado'=>'required']);
      Traveler::create($request->all());
      return redirect()->route('traveler.index')->with('success','Registro creado satisfactoriamente');
  }




  public function checking($id){
    $requ=Traveler::where('trip_id','=',$id)
                    ->where('user_id','=',auth()->user()->id)
                    ->first();;
    $requ->me_subi='1';
    $requ->save();
    
    return back()->with("mensaje", 'se hizo el checking!');
    
}





}
