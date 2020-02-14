<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Cliente;
use App\Http\Requests\ClienteFormRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class ClienteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        if ($request) {
            $query = trim($request->get('searchText'));
            $clientes = DB::table('cliente')
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('num_documento', 'LIKE', '%' . $query . '%')
                ->where('tipo_cliente', '=', 'Cliente')
                ->orderBy('idcliente', 'desc')
                ->paginate(7);
            /*return view ("cotizaciones.cliente.b",["clientes"=>$clientes,"searchText"=>$query]);*/

            return view('cotizaciones.cliente.index', ["clientes" => $clientes, "searchText" => $query]);

        }
    }

    public function getClient(Request $request)
    {
        $client = trim($request->get('client'));
        $cliente = DB::table('cliente')
            ->where('nombre', 'LIKE', '%' . $client . '%')
            ->where('tipo_cliente', '=', 'Cliente')
            ->orderBy('idcliente', 'desc')
            ->take(1)
            ->get()[0];

        return response()->json($cliente);

        return view('cotizaciones.cliente.indexclicot');
    }

    public function getClientId(Request $request)
    {
        $client = trim($request->get('client'));
        $cliente = Cliente::find($request->get('client'));
        return response()->json($cliente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("cotizaciones.cliente.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteFormRequest $request)
    {
        //
        $cliente = new Cliente;
        $cliente->tipo_cliente = 'Cliente';
        $cliente->nombre = $request->get('nombre');
        $cliente->tipo_documento = $request->get('tipo_documento');
        $cliente->num_documento = $request->get('num_documento');
        $cliente->direccion = $request->get('direccion');
        $cliente->telefono = $request->get('telefono');
        $cliente->email = $request->get('email');
        $cliente->ciudad = $request->get('ciudad');
        $cliente->pais = $request->get('pais');
        $cliente->vendedor = $request->get('vendedor');
        $cliente->save();

        return Redirect::to('cotizaciones/cliente');
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
        return view("cotizaciones.cliente.show", ["cliente" => Cliente::findOrFail($id)]);
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
        return view("cotizaciones.cliente.edit", ["cliente" => Cliente::findOrFail($id)]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteFormRequest $request, $id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        $cliente->nombre = $request->get('nombre');
        $cliente->tipo_documento = $request->get('tipo_documento');
        $cliente->num_documento = $request->get('num_documento');
        $cliente->direccion = $request->get('direccion');
        $cliente->telefono = $request->get('telefono');
        $cliente->email = $request->get('email');
        $cliente->ciudad = $request->get('ciudad');
        $cliente->pais = $request->get('pais');
        //$cliente->vendedor = $request->get('vendedor');
        $cliente->update();

        return Redirect::to('cotizaciones/cliente');
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
        $persona = Cliente::findOrFail($id);
        $persona->tipo_cliente = 'Inactivo';
        $persona->update();

        return Redirect::to('cotizaciones/cliente');
    }
}
