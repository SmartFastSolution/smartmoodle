<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{

    protected $fillable = [
        'nombre','descripcion','provincia','canton',
        'direccion','telefono','email','telefono',
        'estado',
    ];



    //relacion de uno a muchos en este caso el muchos usuarios tomaran 1 dato de instituto
    // haciendo referencia de 1 a muchos

    public function users(){
          
        return $this->hasMany('App\User');

    }

}
