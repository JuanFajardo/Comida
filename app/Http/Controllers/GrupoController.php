<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Grupo;
class GrupoController extends Controller
{
  public function __construct(){
    //$this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Grupo::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('grupo.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Grupo;
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Grupo');
  }

  public function show($id){
    $datos = Grupo::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Grupo::find($id);
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Grupo');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Grupo::find($id);
      $dato->delete();
      return "Grupo Eliminada";
    }else{
      return redirect('/');
    }
  }

}
