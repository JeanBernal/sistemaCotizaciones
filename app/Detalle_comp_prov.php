<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_comp_prov extends Model
{
    protected $table='detalle_comp_prov';

    protected $primaryKey='iddetallecomp_prov';

    public $timestamps=false;

    protected $fillable=[
        'producto_idproducto',
        'idcomp_prov',
        'cantidad',
        'precio_compra',
        'precio_venta'
    ];
}
