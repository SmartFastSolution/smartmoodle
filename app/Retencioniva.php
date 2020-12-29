<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retencioniva extends Model
{
    public function taller(){
        return $this->belongsTo('App\Taller');
     }
     public function user(){
        return $this->belongsTo('App\User');
     }

     public function retencionivacompras(){

        return $this->hasMany('App\Retencionivacompra');
    }
    public function retencionivaventas(){

        return $this->hasMany('App\Retencionivaventa');
    }
}
