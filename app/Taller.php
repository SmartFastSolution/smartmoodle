<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{   
    public function materia(){
        return $this->belongsTo('App\Materia');
    }

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
     public function tallerRelacionar()
    {
        return $this->belongsTo('App\Admin\TallerRelacionar');
    }
    public function taller2Relacionar()
    {
        return $this->belongsTo('App\Admin\Taller2Relacionar');
    }
    public function tallerVerdaderofalso()
    {
        return $this->belongsTo('App\Admin\TallerVerdaderoFalso');
    }
     public function tallerVerdaderofalsoRe()
    {
        return $this->belongsTo('App\TallerVerdaderoFalsoRe');
    }
     public function tallerIdentificarpersona()
    {
        return $this->belongsTo('App\Admin\TallerIdentificarPersona');
    }
      public function tallerIdentificarpersonaRe()
    {
        return $this->belongsTo('App\Admin\TallerIdentificarPersonaRe');
    }

       public function tallerdefinirEnunciado()
    {
        return $this->belongsTo('App\Admin\TallerDefinirEnunciado');
    }
       public function tallerdefinirEnunciadoRe()
    {
        return $this->belongsTo('App\TallerDefinirEnunciadoRe');
    }
          public function tallerCheque()
    {
        return $this->belongsTo('App\Admin\TallerCheque');
    }
           public function tallerChequeRe()
    {
        return $this->belongsTo('App\TallerChequeRe');
    }
}


