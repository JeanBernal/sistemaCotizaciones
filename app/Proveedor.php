<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedor';

    protected $primaryKey='idproveedor';

    public $timestamps=false;

    protected $fillable=[
        'idproveedor',
        'nombre',
        'num_documento',
        'tipo_documento',
        'pais',
        'ciudad',
        'direccion',
        'telefono',
        'email',
        'estado'
    ];
}
