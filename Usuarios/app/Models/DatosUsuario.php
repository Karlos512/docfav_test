<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosUsuario extends Model
{
    //
    use HasFactory;

    protected $table = 'Datosusuario';

    protected $casts = [
        'id_usuario' => 'int'
    ];

    protected $fillable = [
        'id_usuario',
        'direccion',
        'telefono',
        'fecha_nac'
    ];
}
