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

class CotPdfController extends Controller
{
    //
    public function index()
    {
        return view ('cotizaciones.cotizacion.show');
    }

    public function cotPdf ($datos, $vistaurl)
    {
        $data = $datos;
        $date = date('Y-m-d');
        $view = \View::make($vistaurl,compact('data','date'))->render();
        $pdf->loadHTML($view);

        $pdf->stream('')
    }
}

