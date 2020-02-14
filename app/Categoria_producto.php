<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria_producto extends Model
{
    protected $table='categoria_producto';

    protected $primaryKey='idcategoria_producto';

    public $timestamps=false;

    protected $fillable=[
        'nombre',
        'descripcion',
        'condicion'
    ];

}
