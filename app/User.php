<?php

namespace App;

use App\Modelos\Role;
use App\Instituto;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula','fechanacimiento','name','sname',
        'apellido','sapellido','domicilio','telefono',
        'celular','titulo', 'email','estado', 'password',
        'fcontrato','cirepre','namerepre',
         'namema','namepa','telefonorep','fregistro',

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


    public function role(){
          
        return $this->belongsTo('App\Modelos\Role');

    }
    

    //relacion de muchos a 1 es decir muchos usuarios 
    //tomaran 1 dato de instituto
    public function instituto(){
          
        return $this->belongsTo('App\Instituto');

    }

  
// estos son metodos para el rol 
//    public function asignarRol($role){  //para asignar los roles de manera automatica
    
//     $this->roles()->sync($role, false);
        
//     }
    
//esta funcion la aplico en el serviceprovider para el metodo gate del service provider
//no puedo borrar esta funcion 

    // public function tieneROl(){

    //  return $this->roles->flatten()->pluck('name')->unique();

    // }

    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300';
    }



    
}

