<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimientocajas extends Model
{
    public function Arqueocaja(){

        return $this->belongsTo('App\Arqueocajas');
    }
}
