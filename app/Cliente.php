<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='cliente';

    protected $primaryKey='idcliente';

    public $timestamps=false;

    protected $fillable=[
        'idcliente',
        'tipo_cliente',
        'nombre',
        'tipo_documento',
        'num_documento',
        'direccion',
        'telefono',
        'email',
        'ciudad',
        'pais',
        'fecha'
        
    ];
}
