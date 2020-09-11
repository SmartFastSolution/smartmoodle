<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{



    protected $fillable = [
        'nombre','descripcion','provincia','canton',
        'direccion','telefono','email','telefono',
        'estado',
    ];


}
