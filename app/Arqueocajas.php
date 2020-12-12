<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arqueocajas extends Model
{
    public function movimientocajas(){

        return $this->hasMany('App\Movimientocajas');
    }

    public function taller(){
        return $this->belongsTo('App\Taller');
     }
     public function user(){
        return $this->belongsTo('App\User');
     }
}
