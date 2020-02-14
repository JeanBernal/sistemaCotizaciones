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

class DynamicPdfController extends Controller
{
    function index(){
        $cotizacion_data=$this->get_cotizacion_data();
        

        return view('dynamic_pdf')->with('cotizacion_data',$cotizacion_data,'detallespro_data',$detallespro_data);

    }

    function get_cotizacion_data($id){
        $cotizacion_data=DB::table('cotizacion_producto as co')
        ->join('cliente as c','co.cliente_id','=','c.idcliente')
        ->join('detalle_cotizacion_prod as dcp','co.idcotizacion_producto','=','dcp.cotizacion_producto_id')
        ->select('co.idcotizacion_producto','co.fecha_hora','c.nombre','co.tipo_comprobante',
        'co.serie_comprobante','co.num_comprobante','co.impuesto','co.estado','co.total_cotizacion')
        ->where('co.idcotizacion_producto','=',$id)
        ->first();

        $detallespro_data=DB::table('detalle_cotizacion_prod as d')
        ->join('producto as p','d.producto_id','=','p.idproducto')
        ->select('p.nombre as producto','d.cantidad','d.descuento','d.precio_cotizacion')
        ->where('d.cotizacion_producto_id','=',$id)
        ->get();

        $pdf=PDF::loadview('dynamic_pdf',["cotizacion_data"=>$cotizacion_data,"detallespro_data"=>$detallespro_data]);
        return $pdf->stream('dynamic_pdf.pdf');
    }

    function pdf(){
        $pdf= \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_cotizacion_data_to_html());
        $pdf->stream();
    }

    /*function convert_cotizacion_data_to_html(){
        $cotizacion_data=$this->get_cotizacion_data();
        $detallespro_data=$this->get_cotizacion_data();
        $output='
            <h3>edsfdsffdsfds</h3>
              <div class="row">  
                <form>
                    <label for="cliente"> <strong> Cliente </strong></label>
                    <p>'.$cotizacion_data->nombre.'</p>
                </form>
              </div>
              <div class="row">  
                <form>
                    <label for="cliente"> <strong> Tipo Comprobante </strong></label>
                    <p>'.$cotizacion_data->tipo_comprobante.'</p>
                </form>
              </div> 
              <div class="row">  
                <form>
                    <label for="cliente"> <strong> Serie Comprobante </strong></label>
                    <p>'.$cotizacion_data->serie_comprobante.'</p>
                </form>
             </div>    
              <div class="row">  
                <form>
                    <label for="cliente"> <strong> Número Comprobante </strong></label>
                    <p>'.$cotizacion_data->num_comprobante.'</p>
                </form>
             </div>    
            <table width=100% style="border-collapse: collapse; border:0px"> 
                <tr>
                    <th style="border: 1px solid; padding12px;" width="20%">Producto</th>
                    <th style="border: 1px solid; padding12px;" width="20%">Cantidad</th>
                    <th style="border: 1px solid; padding12px;" width="20%">Precio Venta</th>
                    <th style="border: 1px solid; padding12px;" width="20%">Descuento</th>
                    <th style="border: 1px solid; padding12px;" width="20%">Subtotal</th>
                </tr>
                 
        ';
        foreach ($detallespro_data as $det){

        
            $output .='
            <tr>
                <td>'.$det->producto.'</td>
                <td>'.$det->cantidad.'</td>
                <td>'.$det->precio_cotizacion.'</td>
                <td>'.$det->descuento.'</td>
                <td>'.$det->cantidad*$det->precio_cotizacion-$det->descuento.'</td>                
            
            </tr>
            ';
        }
        $output .='</table>';
        return $output;
    }*/
}
