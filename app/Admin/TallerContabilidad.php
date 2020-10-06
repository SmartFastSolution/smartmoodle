<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class TallerContabilidad extends Model
{
     public function Taller(){

        return $this->belongsTo('App\Taller');
    }
     public function tallerContabilidadOp(){

        return $this->hasMany('App\Admin\TallerContabilidadOp');
    }
}
