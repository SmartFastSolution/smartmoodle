<?php

namespace App\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class BalanceInicial extends Model
{
         public function Tallers(){

        return $this->hasMany('App\Taller');
    }
    public function Users(){

        return $this->belongsToMany('App\User');
    }
      public function bActivos(){
        return $this->hasMany('App\Contabilidad\BIActivos');
    }
}
