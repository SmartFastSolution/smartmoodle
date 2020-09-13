<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class TallerClasificar extends Model
{
     public function Tallers(){

        return $this->belongsToMany('App\Taller');
    }
   
}
