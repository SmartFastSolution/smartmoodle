<?php

namespace App\Modelos;
use App\Modelos\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'name','slug','fullacces',
    ];



    public function permissions(){

        
          
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}
 