<?php

namespace App\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class BalanceInicial extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'taller_id',
        'tipo',
        'enunciado',
        'nombre',
        'fecha',
        'total_activo_corriente',
        'total_activo_nocorriente',
        'total_pasivo_corriente',
        'total_pasivo_nocorriente',
        'total_activo',
        'total_pasivo',
        'total_patrimonio',
        'total_pasivo_patrimonio',
        'datos',
    ];
    public function taller()
    {
        return $this->belongsTo('App\Taller');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function dGeneral()
    {
        return $this->hasOne('App\Contabilidad○\DiarioGeneral');
    }
    public function bActivos()
    {
        return $this->hasMany('App\Contabilidad\BIActivo');
    }
    public function bPasivos()
    {
        return $this->hasMany('App\Contabilidad\BIPasivo');
    }
    public function bPatrimonios()
    {
        return $this->hasMany('App\Contabilidad\BIPatrimonio');
    }
}
