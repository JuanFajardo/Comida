<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Ingrediente;
class IngredienteController extends Controller
{
  public function __construct(){
    //$this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Ingrediente::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      $datos = \DB::table('ingredientes')->join('menus', 'ingredientes.id_menu','=','menus.id')->get();
      return view('ingrediente.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Ingrediente;
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Ingrediente');
  }

  public function show($id){
    $datos = Ingrediente::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Ingrediente::find($id);
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Ingrediente');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Ingrediente::find($id);
      $dato->delete();
      return "Ingrediente Eliminada";
    }else{
      return redirect('/');
    }
  }

}
