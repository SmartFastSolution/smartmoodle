<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anexocaja extends Model
{
    public function cajadatos(){

        return $this->hasMany('App\Cajadatos');
    }
}
