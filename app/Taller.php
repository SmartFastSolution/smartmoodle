<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{

    public function Users(){
        return $this->belongsToMany('App\User');
    }

    public function Plantilla()
    {
    	return $this->belongsTo('App\Plantilla');
    }

      public function tallerCompletar()
    {
    	return $this->belongsTo('App\Admin\TallerCompletar');
    }
    public function tallerClasificar()
    {
        return $this->belongsTo('App\Admin\TallerClasificar');
    }
}

