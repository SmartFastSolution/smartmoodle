<?php

namespace App\Providers;
use App\Modelos\Role;
use App\User;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
          
        //  Gate::define('haveacces', function(User $user, $perm){
        //     return $user->havePermission($perm); 
        //  });
       
       
        // Gate::before(function($user, $role){
        //     return $user->tieneRol()->contains($role);
        // });
      
        Gate::define('Administrador', function($user) {
            return $user->role->name == 'Administrador';
         });
        
         /* define a manager user role */
         Gate::define('Docente', function($user) {
             return $user->role->name == 'Docente';
         });
       
         /* define a user role */
         Gate::define('Estudiante', function($user) {
             return $user->role->name == 'Estudiante';
         });




    }
}
