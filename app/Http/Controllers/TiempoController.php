<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Tiempo;
class TiempoController extends Controller
{
  public function __construct(){
    //$this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Tiempo::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      $datos = \DB::table('tiempos')->join('grupos', 'tiempos.id_grupo', '=', 'grupos.id')->get();
      return view('tiempo.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Tiempo;
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Tiempo');
  }

  public function show($id){
    $datos = Tiempo::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Tiempo::find($id);
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Tiempo');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Menu::find($id);
      $dato->delete();
      return "Tiempo Eliminada";
    }else{
      return redirect('/');
    }
  }

}
