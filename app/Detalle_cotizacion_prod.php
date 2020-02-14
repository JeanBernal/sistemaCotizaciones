<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_cotizacion_prod extends Model
{
    //
    protected $table='detalle_cotizacion_prod';

    protected $primaryKey='iddetalle_cotizacion_prod';

    public $timestamps=false;

    protected $fillable=[
        'cotizacion_producto_id',
        'producto_id',
        'cantidad',
        'precio_cotizacion',
        'descuento'
    ];
}
