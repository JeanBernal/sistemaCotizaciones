<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Proveedor;
use App\Http\Requests\ProveedorFormRequest;

class proveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response    
     */

    public function index(Request $request)
    {
       //$request->user()->authorizeRoles('user');

        if ($request) {
            $query = trim($request->get('searchText'));
            $proveedores = DB::table('proveedor')
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('num_documento', 'LIKE', '%' . $query . '%')
                ->where('estado','=','Activo')
                ->orderBy('idproveedor', 'desc')
                ->paginate(7);
            /*return view ("almacen.proveedor.b",["proveedors"=>$proveedores,"searchText"=>$query]);*/

            return view('almacen.proveedor.index', ["proveedores" => $proveedores, "searchText" => $query]);

        }
    }

    public function getProv(Request $request)
    {
        $prov = trim($request->get('prov'));
        $proveedor = DB::table('proveedor')
            ->where('nombre', 'LIKE', '%' . $prov . '%')
            ->where('estado','=','Activo')
            ->orderBy('idproveedor', 'desc')
            ->take(1)
            ->get()[0];

        return response()->json($proveedor);

    }

    public function getProvId(Request $request)
    {
        $prov = trim($request->get('prov'));
        $proveedor = Proveedor::find($request->get('prov'));
        return response()->json($proveedor);
    }

    /**
     * Show the form+ for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("almacen.proveedor.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorFormRequest $request)
    {
        //
        $proveedor = new Proveedor;
        $proveedor->estado = 'Activo';
        $proveedor->nombre = $request->get('nombre');
        $proveedor->tipo_documento = $request->get('tipo_documento');
        $proveedor->num_documento = $request->get('num_documento');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->email = $request->get('email');
        $proveedor->ciudad = $request->get('ciudad');
        $proveedor->pais = $request->get('pais');
        $proveedor->save();

        return Redirect::to('almacen/proveedor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view("almacen.proveedor.show", ["proveedor" => Proveedor::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view("almacen.proveedor.edit", ["proveedor" => Proveedor::findOrFail($id)]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorFormRequest $request, $id)
    {
        //
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->nombre = $request->get('nombre');
        $proveedor->tipo_documento = $request->get('tipo_documento');
        $proveedor->num_documento = $request->get('num_documento');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->email = $request->get('email');
        $proveedor->ciudad = $request->get('ciudad');
        $proveedor->pais = $request->get('pais');
        $proveedor->update();

        return Redirect::to('almacen/proveedor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $persona = Proveedor::findOrFail($id);
        $persona->tipo_proveedor = 'Inactivo';
        $persona->update();

        return Redirect::to('almacen/proveedor');
    }
}
