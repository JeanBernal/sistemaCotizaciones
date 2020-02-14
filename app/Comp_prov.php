<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comp_prov extends Model
{
    protected $table='comp_prov';

    protected $primaryKey='idcomp_prov';

    public $timestamps=false;

    protected $fillable=[
        'idproveedor',
        'tipo_comprobante',
        'serie_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'estado'

    ];
}
