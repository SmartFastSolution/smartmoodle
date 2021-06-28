<?php

namespace App\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class KardexFifo extends Model
{
    protected $fillable = [
        'taller_id',
        'user_id',
        'producto_id',
        'nombre',
        'producto',
        'inv_inicial_cantidad',
        'adquisicion_cantidad',
        'ventas_cantidad',
        'inv_final_cantidad',
        'inv_inicial_precio',
        'adquisicion_precio',
        'ventas_precio',
        'inv_final_precio',
        'transacciones',
    ];
    public function taller()
    {
        return $this->belongsTo('App\Taller');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function kfRegistro()
    {
        return $this->hasMany('App\Contabilidad\KFRegistro');
    }
}
