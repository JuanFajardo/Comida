<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Menu;
class MenuController extends Controller
{
  public function __construct(){
    //$this->middleware('auth');
  }

  public function index(Request $request){
    $datos = Menu::all();
    if ($request->ajax()) {
      return $datos;
    }else{
      $datos = \DB::table('menus')->join('grupos', 'menus.id_grupo', '=', 'grupos.id')
                                  ->join('tiempos', 'menus.id_tiempo', '=', 'tiempos.id')
                                  ->get();
      return view('menu.index', compact('datos'));
    }
  }

  public function store(Request $request){
    $dato = new Menu;
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Menu');
  }

  public function show($id){
    $datos = Menu::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){
    $dato = Menu::find($id);
    $request['user_id'] = 1;//\Auth::user()->id;
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Menu');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Menu::find($id);
      $dato->delete();
      return "Menu Eliminada";
    }else{
      return redirect('/');
    }
  }

  public function grupo($id){
    $datos = \App\Tiempo::Where('id_grupo', '=', $id)->get();
    return $datos;
  }


  public function insertarMenu($id_menu, $ingrediente, $cantidad_personas, $cantidad_ingrediente, $unidad){
    $dato = new \App\Ingrediente;
    $dato->ingrediente      = $ingrediente;
    $dato->cantidad_personas= $cantidad_personas;
    $dato->cantidad_ingrediente=$cantidad_ingrediente;
    $dato->unidad           = $unidad;
    $dato->id_menu          = $id_menu;
    $dato->save();
  }

  public function verMenu($id){
    return $id;
    
    return \DB::table('ingredientes')->where('id_menu', '=', $id)->get();
  }

  public function eliminarMenu($id){

    $dato = \App\Ingrediente::find( $id );
    //return $dato;
    $dato->delete();

  }

}
