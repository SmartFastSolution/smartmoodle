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
     public function tallerCompletarEnunciado()
    {
        return $this->belongsTo('App\Admin\TallerCompletarEnunciado');
    }
     public function tallerDiferencia()
    {
        return $this->belongsTo('App\Admin\TallerDiferencia');
    }
    public function tallerDiferenciaRes()
    {
        return $this->belongsTo('App\TallerDiferenciaRes');
    }
      public function tallerSenalar()
    {
        return $this->belongsTo('App\Admin\TallerSenalar');
    }
        public function tallerIdentificar()
    {
        return $this->belongsTo('App\Admin\TallerIdentificarImagen');
    }
        public function tallerGusanillo()
    {
        return $this->belongsTo('App\Admin\TallerGusanillo');
    }
      public function tallerGusanilloRe()
    {
        return $this->belongsTo('App\TallerGusanilloRe');
    }

         public function tallerCirculo()
    {
        return $this->belongsTo('App\Admin\TallerCirculo');
    }
      public function tallerCirculoRe()
    {
        return $this->belongsTo('App\TallerCirculoRe');
    }
        public function tallerSubrayar()
    {
        return $this->belongsTo('App\Admin\tallerSubrayar');
    }
      public function tallerSubrayarRe()
    {
        return $this->belongsTo('App\tallerSubrayarRe');
    }
}


