<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{   
    public function contenido(){
        return $this->belongsTo('App\Contenido');
    }
    // public function materia(){
    //     return $this->belongsTo('App\Materia');
    // }

  public function users(){
        return $this->belongsToMany('App\User','taller_user')
            ->withPivot('status','calificacion');
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
         public function tallerCirculo()
    {
        return $this->belongsTo('App\Admin\TallerCirculo');
    }
        public function tallerSubrayar()
    {
        return $this->belongsTo('App\Admin\tallerSubrayar');
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
   
     public function tallerIdentificarpersona()
    {
        return $this->belongsTo('App\Admin\TallerIdentificarPersona');
    }
       public function tallerdefinirEnunciado()
    {
        return $this->belongsTo('App\Admin\TallerDefinirEnunciado');
    }
          public function tallerCheque()
    {
        return $this->belongsTo('App\Admin\TallerCheque');
    }
           public function tallerChequeRe()
    {
        return $this->belongsTo('App\TallerChequeRe');
    }
          public function tallerChequeEndoso()
    {
        return $this->belongsTo('App\Admin\TallerChequeEndoso');
    }
          public function tallerChequeEndosoRe()
    {
        return $this->belongsTo('App\TallerChequeEndosoRe');
    }
        public function tallerConvertirCheque()
    {
        return $this->belongsTo('App\Admin\TallerConvertirCheque');
    }
         public function tallerConvertirChequeRe()
    {
        return $this->belongsTo('App\TallerConvertirChequeRe');
    }
         public function tallerLetraCambio()
    {
        return $this->belongsTo('App\Admin\TallerLetraCambio');
    }
         public function tallerLetraCambioRe()
    {
        return $this->belongsTo('App\TallerLetraCambioRe');
    }
         public function tallerCertificadoDeposito()
    {
        return $this->belongsTo('App\Admin\TallerCertificadoDeposito');
    }
         public function tallerCertificadoDepositoRe()
    {
        return $this->belongsTo('App\TallerCertificadoDepositoRe');
    }
         public function tallerPagare()
    {
        return $this->belongsTo('App\Admin\TallerPagare');
    }
       public function tallerPagareRe()
    {
        return $this->belongsTo('App\TallerPagareRe');
    }
     public function tallerValeCaja()
    {
        return $this->belongsTo('App\Admin\TallerValeCaja');
    }
    public function tallerValeCajaRe()
    {
        return $this->belongsTo('App\TallerValeCajaRe');
    }
     public function tallerNotaPedido()
    {
        return $this->belongsTo('App\Admin\TallerNotaPedido');
    }
     public function tallerNotaPedidoRe()
    {
        return $this->belongsTo('App\TallerNotaPedidoRe');
    }
    public function tallerRecibo()
    {
        return $this->belongsTo('App\Admin\TallerRecibo');
    }
    public function tallerReciboRe()
    {
        return $this->belongsTo('App\TallerReciboRe');
    }
    public function tallerOrdenPago()
    {
        return $this->belongsTo('App\Admin\tallerOrdenPago');
    }
    public function tallerOrdenPagoRe()
    {
        return $this->belongsTo('App\TallerOrdenPagoRe');
    }
    public function tallerFactura()
    {
        return $this->belongsTo('App\Admin\TallerFactura');
    }
    public function tallerFacturaRe()
    {
        return $this->belongsTo('App\TallerFacturaRe');
    }
      public function tallerNotaVenta()
    {
        return $this->belongsTo('App\Admin\TallerNotaVenta');
    }
    public function tallerNotaVentaRe()
    {
        return $this->belongsTo('App\TallerNotaVentaRe');
    }
     public function tallerAbre()
    {
        return $this->belongsTo('App\Admin\TallerAbreviatura');
    }
     public function tallerCollage()
    {
        return $this->belongsTo('App\Admin\TallerCollage');
    }
     public function tallerCollageRe()
    {
        return $this->belongsTo('App\TallerCollageRe');
    }
     public function tallerContabilidad()
    {
        return $this->belongsTo('App\Admin\TallerContabilidad');
    }
       public function balanceInicial()
    {
        return $this->belongsTo('App\Contabilidad\BalanceInicial');
    }
      public function tallerPregunta()
    {
        return $this->belongsTo('App\Admin\TallerPregunta');
    }
      public function tallerTipoSaldo()
    {
        return $this->hasMany('App\Admin\TallerTipoSaldo');
    }
     public function tallerAnalizar()
    {
        return $this->belongsTo('App\Admin\TallerAnalizar');
    }
     public function tallerALectura()
    {
        return $this->belongsTo('App\Admin\TallerALectura');
    }
     public function tallerPalabra()
    {
        return $this->belongsTo('App\Admin\TallerPalabra');
    }
     public function tallerOrdenIdea()
    {
        return $this->hasMany('App\Admin\TallerOrdenIdea');
    }
        public function tallerMConceptual()
    {
        return $this->belongsTo('App\Admin\TallerMConceptual');
    }
      public function tallerCuenta()
    {
        return $this->belongsTo('App\Admin\TallerEscribirCuenta');
    }
       public function tallerSopa()
    {
        return $this->belongsTo('App\Admin\TallerSopaLetra');
    }
        public function identificarAbreviatura(){

        return $this->hasMany('App\Admin\Respuesta\IdentificarAbreviatura');
    }
        public function abreviaturaCarta(){

        return $this->hasMany('App\Admin\Respuesta\AbreviaturaCarta');
    }
        public function abreviaturaEditorial(){

        return $this->hasMany('App\Admin\Respuesta\AbreviaturaEditorial');
    }
         public function abreviaturaEconomica(){

        return $this->hasMany('App\Admin\Respuesta\AbreviaturaEconomica');
    }
       public function formulaContable(){

        return $this->hasMany('App\Admin\Respuesta\FormulasContable');
    }
       public function mapaConceptual(){

        return $this->hasMany('App\Admin\Respuesta\MapaConceptual');
    }
      public function completar(){

        return $this->hasMany('App\Admin\Respuesta\Completar');
    }
    
}



