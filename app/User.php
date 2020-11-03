<?php

namespace App;

use App\Modelos\Role;
use App\Instituto;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\UserTrait;



class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, UserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula','name',
        'apellido','domicilio','telefono',
        'celular', 'email', 'password',
        

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


     public function tallersCompletar(){

        return $this->belongsToMany('App\Taller');
    } 
     public function tallerDiferenciaRes(){

        return $this->belongsToMany('App\TallerDiferenciaRes');
    }
     public function tallerCirculoRe(){

        return $this->belongsToMany('App\TallerCirculoRe');
    }


    


    //relacion de muchos a 1 es decir muchos usuarios 
    //tomaran 1 dato de instituto
    public function instituto(){
          
        return $this->belongsTo('App\Instituto');
    }

    public function distrima(){
          
        return $this->hasOne('App\Distrima');
    }


    public function distribuciondos(){
          
        return $this->hasMany('App\Distribuciondo');
    }
    public function tallers(){
        
        return $this->belongsToMany('App\Taller','taller_user')
            ->withPivot('status','calificacion');
    }

    
    
}