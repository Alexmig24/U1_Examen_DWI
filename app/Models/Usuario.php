<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    public $timestamps = false;

    protected $fillable = ['nombre_usuario', 'clave', 'rol'];

    protected $hidden = ['clave'];

    public function getAuthPassword()
    {
        return $this->clave;
    }
}
