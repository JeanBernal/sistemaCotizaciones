<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProductoFormRequest;
use App\Producto;

class ProductoController extends Controller
{
   
   public function _construct(){
       $this->middleware('auth');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $productos = DB::table('producto as p')
                ->join('categoria_producto as c', 'p.idcategoria_producto', '=', 'c.idcategoria_producto')
                ->select('p.idproducto', 'p.nombre', 'p.codigo', 'p.stock', 'c.nombre as categoria', 'p.imagen', 'p.descripcion', 'p.estado')
                ->where('p.nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('p.idproducto', 'desc')
                ->paginate(7);
            return view('almacen.producto.index', ["productos" => $productos, "searchText" => $query]);
        }
    }

    public function getProduct(Request $request)
    {
        $productos = DB::table('producto as p')
            ->join('categoria_producto as c', 'p.idcategoria_producto', '=', 'c.idcategoria_producto')
            ->select('p.idproducto', 'p.nombre', 'p.codigo', 'p.stock', 'c.nombre as categoria', 'p.imagen', 'p.descripcion', 'p.estado')
            ->orderBy('p.idproducto', 'desc')
            ->paginate(7);

        return response()->json($productos);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriasprod = DB::table('categoria_producto')->where('condicion', '=', '1')->get();
        return view("almacen.producto.create", ["categoriasprod" => $categoriasprod]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoFormRequest $request)
    {
        $producto = new Producto;
        $producto->idcategoria_producto = $request->get('idcategoria_producto');
        $producto->codigo = $request->get('codigo');
        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->stock = $request->get('stock');
        $producto->estado = 'Disponible';
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(public_path() . '/imagenes/productos/', $file->getClientOriginalName());
            $producto->imagen = $file->getClientOriginalName();

        }
        $producto->save();
        return Redirect::to('almacen/producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('almacen.producto.show', ["producto" => Producto::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categoriasprod = DB::table('categoria_producto')->where('condicion', '=', '1')->get();
        return view('almacen.producto.edit', ["producto" => $producto, "categoriasprod" => $categoriasprod]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoFormRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->idcategoria_producto = $request->get('idcategoria_producto');
        $producto->codigo = $request->get('codigo');
        $producto->nombre = $request->get('nombre');
        $producto->stock = $request->get('stock');
        $producto->descripcion = $request->get('descripcion');
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file->move(pubic_path() . '/imagenes/productos', $file->getClientOriginalName());
            $producto->imagen = $file->getClientOriginalName();
        }
        $producto->update();
        return Redirect::to('almacen/producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->estado = 'Agotado';
        $producto->update();
        return Redirect::to('almacen/producto');

    }
}
