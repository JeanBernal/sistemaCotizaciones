<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Cotizacion_producto;
use App\Detalle_cotizacion_prod;
use App\Http\Requests\Cotizacion_prodFormRequest;
use DB;
use PDF;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class Cotizacion_prodController extends Controller
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
            $cotizacionesprod=DB::table('cotizacion_producto as cp')
            ->join('cliente as c', 'cp.cliente_id','=','c.idcliente')
            ->join('detalle_cotizacion_prod as dcp','cp.idcotizacion_producto','=','dcp.cotizacion_producto_id')
            ->select('cp.idcotizacion_producto','cp.fecha_hora','c.nombre','cp.tipo_comprobante',
            'cp.serie_comprobante','cp.num_comprobante','cp.impuesto','cp.estado','cp.total_cotizacion')
            ->where('cp.num_comprobante','LIKE','%',$query,'%')
            ->orderBy('cp.idcotizacion_producto','desc')
            ->groupBy('cp.idcotizacion_producto','cp.fecha_hora','c.nombre','cp.tipo_comprobante','cp.serie_comprobante','cp.num_comprobante',
            'cp.impuesto','cp.estado','cp.total_cotizacion')
            ->paginate(7);
            return view("cotizaciones.cotizacion.index",["cotizacionesprod"=>$cotizacionesprod,"searchText"=>$query]);
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
        $clientes=DB::table('cliente')->where('tipo_cliente','=','Cliente')->get();
        $productos=DB::table('producto as pro')
        //->join('detalle_comp_prov as dcpro','pro.idproducto','=','dcpro.producto_idproducto')
        ->select(DB::raw('CONCAT(pro.codigo, " ",pro.nombre) as producto'),'pro.idproducto','pro.stock')//,DB::raw('avg(dcpro.precio_compra) as precio_promedio'))
        ->where('pro.estado','=','Activo')
        ->where('pro.stock','>','0')
        ->groupBy('producto','pro.idproducto','pro.stock')
        ->get();
        return view("cotizaciones.cotizacion.create",["clientes"=>$clientes,"productos"=>$productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Cotizacion_prodFormRequest $request)
    {
        //
        try{
            DB::beginTransaction();
            $cotizacion_producto=new Cotizacion_producto;
            $cotizacion_producto->cliente_id=$request->get('cliente_id');
            $cotizacion_producto->tipo_comprobante=$request->get('tipo_comprobante');
            $cotizacion_producto->serie_comprobante=$request->get('serie_comprobante');
            $cotizacion_producto->num_comprobante=$request->get('num_comprobante');
            $cotizacion_producto->total_cotizacion=$request->get('total_cotizacion');

            $mytime=Carbon::now('America/Bogota');
            $cotizacion_producto->fecha_hora=$mytime->toDateTimeString();
            $cotizacion_producto->impuesto='19';
            $cotizacion_producto->estado=$request->get('estado');
            $cotizacion_producto->save();

            $producto_id=$request->get('producto_id');
            $cantidad=$request->get('cantidad');
            $descuento=$request->get('descuento');
            $precio_cotizacion=$request->get('precio_cotizacion');

            $cont=0;

            while($cont < count($producto_id)){
                $detallepro= new Detalle_cotizacion_prod;
                $detallepro->cotizacion_producto_id=$cotizacion_producto->idcotizacion_producto;
                $detallepro->producto_id=$producto_id[$cont];
                $detallepro->cantidad=$cantidad[$cont];
                $detallepro->descuento=$descuento[$cont];
                $detallepro->precio_cotizacion=$precio_cotizacion[$cont];
                $detallepro->save();
                $cont=$cont+1;
            }

            DB::commit();
        }catch(\Exception $e)
        {
            DB::rollback();
        }
        return Redirect::to('cotizaciones/cotizacion');

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
        $cotizacion_producto=DB::table('cotizacion_producto as co')
        ->join('cliente as c','co.cliente_id','=','c.idcliente')
        ->join('detalle_cotizacion_prod as dcp','co.idcotizacion_producto','=','dcp.cotizacion_producto_id')
        ->select('co.idcotizacion_producto','co.fecha_hora','c.nombre','co.tipo_comprobante',
        'co.serie_comprobante','co.num_comprobante','co.impuesto','co.estado','co.total_cotizacion')
        ->where('co.idcotizacion_producto','=',$id)
        ->first();

        $detallespro=DB::table('detalle_cotizacion_prod as d')
        ->join('producto as p','d.producto_id','=','p.idproducto')
        ->select('p.nombre as producto','d.cantidad','d.descuento','d.precio_cotizacion')
        ->where('d.cotizacion_producto_id','=',$id)
        ->get();
        $pdf=PDF::loadview("cotizaciones.cotizacion.show",["cotizacion_producto"=>$cotizacion_producto,"detallespro"=>$detallespro]);
        return $pdf->stream('cotizaciones.cotizacion.show.pdf');
       // return $pdf->download('cotizaciones.cotizacion.show.pdf');
    }

   /*public function crearPdf($id){
        $cotizacion_producto1=DB::table('cotizacion_producto as co')
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
        return view("cotizaciones.cotizacion.crearPdf",["cotizacion_producto"=>$cotizacion_producto,"detallespro"=>$detallespro]);

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
        $cotizacion_producto= Cotizacion_producto::findOrFail($id);
        $cotizacion_producto->estado='Cancelado';
        $cotizacion_producto->update();
        return Redirect::to('cotizaciones/cotizacion');

    }
}
