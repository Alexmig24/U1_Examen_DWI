<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computadora extends Model
{
    protected $table = 'computadoras';
    protected $primaryKey = 'codigo_tienda';
    public $incrementing = true;

    protected $fillable = [
        'almacenamiento',
        'ram',
        'tarjeta_grafica',
        'precio',
        'descripcion',
        'imagen',
        'procesador'
    ];
}
