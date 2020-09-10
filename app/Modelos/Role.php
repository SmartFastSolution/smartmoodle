<?php

namespace App\Modelos;
use App\User;
use App\Modelos\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'name','descripcion','fullacces',
    ];



    public function permissions(){
         
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }

    
    public function users(){
          
        return $this->belongsToMany(User::class)->withTimestamps();

    }
}
 