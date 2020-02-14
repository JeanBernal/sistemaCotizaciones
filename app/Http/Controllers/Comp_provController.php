<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Comp_prov;
use App\Detalle_comp_prov;
use App\Http\Requests\Comp_provFormRequest;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class Comp_provController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request)
        {
            $query=trim($request->get('searchText'));
            $comprasprov=DB::table('comp_prov as cp')
            ->join('proveedor as p', 'cp.idproveedor','=','p.idproveedor')
            ->join('detalle_comp_prov as dcp','cp.idcomp_prov','=','dcp.idcomp_prov')
            ->select('cp.idcomp_prov','cp.fecha_hora','p.nombre','cp.tipo_comprobante',
            'cp.serie_comprobante','cp.num_comprobante','cp.impuesto','cp.estado')
            ->where('cp.num_comprobante','LIKE','%',$query,'%')
            ->orderBy('cp.idcomp_prov','desc')
            ->groupBy('cp.idcomp_prov','cp.fecha_hora','p.nombre','cp.tipo_comprobante','cp.serie_comprobante','cp.num_comprobante',
            'cp.impuesto','cp.estado')
            ->paginate(7);
            return view("ingresos.compra.index",["comprasprov"=>$comprasprov,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proveedores=DB::table('proveedor')->get();
        $productos=DB::table('producto as pro')
        //->join('detalle_comp_prov as dcpro','pro.idproducto','=','dcpro.producto_idproducto')
        ->select(DB::raw('CONCAT(pro.codigo, " ",pro.nombre) as producto'),'pro.idproducto','pro.stock')//,DB::raw('avg(dcpro.precio_compra) as precio_promedio'))
        ->where('pro.estado','=','Disponible')
        ->groupBy('producto','pro.idproducto','pro.stock')
        ->get();
        return view("ingresos.compra.create",["proveedores"=>$proveedores,"productos"=>$productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Comp_provFormRequest $request)
    {
        //
        try{
            DB::beginTransaction();
            $compra_producto=new Comp_prov;
            $compra_producto->idproveedor=$request->get('idproveedor');
            $compra_producto->tipo_comprobante=$request->get('tipo_comprobante');
            $compra_producto->serie_comprobante=$request->get('serie_comprobante');
            $compra_producto->num_comprobante=$request->get('num_comprobante');

            $mytime=Carbon::now('America/Bogota');
            $compra_producto->fecha_hora=$mytime->toDateTimeString();
            $compra_producto->impuesto='0';
            $compra_producto->estado=$request->get('estado');
            $compra_producto->save();

            $producto_idproducto=$request->get('producto_idproducto');
            $cantidad=$request->get('cantidad');
            $precio_compra=$request->get('precio_compra');
            $precio_venta=$request->get('precio_venta');

            $cont=0;

            while($cont < count($producto_idproducto)){
                $detallepro= new Detalle_comp_prov;
                $detallepro->idcomp_prov=$compra_producto->idcomp_prov;
                $detallepro->producto_idproducto=$producto_idproducto[$cont];
                $detallepro->cantidad=$cantidad[$cont];
                $detallepro->precio_compra=$precio_compra[$cont];
                $detallepro->precio_venta=$precio_venta[$cont];
                $detallepro->save();
                $cont=$cont+1;
            }

            DB::commit();
        }catch(\Exception $e)
        {
            DB::rollback();
        }
        return Redirect::to('ingresos/compra');

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
        $compra_producto=DB::table('comp_prov as co')
        ->join('proveedor as p','co.idproveedor','=','p.idproveedor')
        ->join('detalle_comp_prov as dcp','co.idcomp_prov','=','dcp.idcomp_prov')
        ->select('co.idcomp_prov','co.fecha_hora','p.nombre','co.tipo_comprobante',
        'co.serie_comprobante','co.num_comprobante','co.impuesto','co.estado')
        ->where('co.idcomp_prov','=',$id)
        ->first();

        $detallespro=DB::table('detalle_comp_prov as d')
        ->join('producto as p','d.producto_idproducto','=','p.idproducto')
        ->select('p.nombre as producto','d.cantidad','d.precio_compra','d.precio_venta')
        ->where('d.idcomp_prov','=',$id)
        ->get();
        //$pdf=PDF::loadview ('cotizaciones.cotizacion.show');
        
        return view("ingresos.compra.show",["compra_producto"=>$compra_producto,"detallespro"=>$detallespro]);
        //return $pdf->stream('cotizaciones.cotizacion.show.pdf');
    }

   /*public function crearPdf($id){
        $compra_producto1=DB::table('cotizacion_producto as co')
        ->join('cliente as c','co.cliente_id','=','c.idcliente')
        ->join('detalle_cotizacion_prod as dcp','co.idcotizacion_producto','=','dcp.cotizacion_producto_id')
        ->select('co.idcotizacion_producto','co.fecha_hora','c.nombre','co.tipo_comprobante',
        'co.serie_comprobante','co.num_comprobante','co.impuesto','co.estado','co.total_cotizacion')
        ->where('co.idcotizacion_producto','=',$id)
        ->first();

        $detallespro1=DB::table('detalle_cotizacion_prod as d')
        ->join('producto as p','d.producto_id','=','p.idproducto')
        ->select('p.nombre as producto','d.cantidad','d.descuento','d.precio_cotizacion')
        ->where('d.cotizacion_producto_id','=',$id)
        ->get();
        return view("cotizaciones.cotizacion.crearPdf",["cotizacion_producto"=>$compra_producto,"detallespro"=>$detallespro]);

       // $pdf=PDF::loadview ('cotizaciones.cotizacion.show');
        //return $pdf->download('cotizaciones.cotizacion.show.pdf');
    }
    /*
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
    public function update(Request $request, $id)
    {
        //
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $compra_producto= Comp_prov::findOrFail($id);
        $compra_producto->estado='Cancelado';
        $compra_producto->update();
        return Redirect::to('ingresos/compra');

    }
}
