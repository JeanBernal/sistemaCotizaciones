<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion_producto extends Model
{
    protected $table='cotizacion_producto';

    protected $primaryKey='idcotizacion_producto';

    public $timestamps=false;

    protected $fillable=[
        'cliente_id',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'total_cotizacion',
        'estado'
    ];
}
