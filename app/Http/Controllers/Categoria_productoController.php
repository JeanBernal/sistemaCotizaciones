<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categoria_producto;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Categoria_productoFormRequest;
use DB;

class Categoria_productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query=trim($request->get('searchText'));
            $categoriasprod=DB::table('categoria_producto')->where('nombre','LIKE','%'.$query.'%')
            ->where('condicion','=','1')
            ->orderBy('idcategoria_producto','desc')
            ->paginate(7);
            return view('almacen.categoria_producto.index',["categoriasprod"=>$categoriasprod,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ("almacen.categoria_producto.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Categoria_productoFormRequest $request)
    {
        $categoria_producto=new Categoria_producto;
        $categoria_producto->nombre=$request->get('nombre');
        $categoria_producto->descripcion=$request->get('descripcion');
        $categoria_producto->condicion='1';
        $categoria_producto->save();
        return Redirect::to('almacen/categoria_producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ('almacen.categoria_producto.show',["categoria_producto"=>Categoria_producto::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view ('almacen.categoria_producto.edit',["categoria_producto"=>Categoria_producto::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Categoria_productoFormRequest $request, $id)
    {
        $categoria_producto=Categoria_producto::findOrFail($id);
        $categoria_producto->nombre=$request->get('nombre');
        $categoria_producto->descripcion=$request->get('descripcion');
        $categoria_producto->update();
        return Redirect::to('almacen/categoria_producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria_producto=Categoria_producto::findOrFail($id);
        $categoria_producto->condicion='0';
        $categoria_producto->update();
        return Redirect::to('almacen/categoria_producto');

    }
}
