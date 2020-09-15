<?php
use Illuminate\Support\Facades\Routes;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('principal');
});



Auth::routes();
// Auth::routes(["register" => false]);
// Auth::routes(["login" => false]);
// Auth::routes(["logout" => false]);


///rutas protegidas On 

 Route::group(["prefix"=>"sistema","middleware"=>["auth"]],function(){
  //Route::group(["prefix"=>"sistema"],function(){ //por ahora sera la ruta hasta que se arregle lo del login
   
   // Route::get('welcome', function () {
     //   return view('welcome');
   // });

route::get('/','Controller@index')->name('welcome');
//ruta del menu general de administracion 
route::get('/admin','Controller@menuadmin')->name('admin.admin');// donde se va a colocar todas las ventanas juntas


//rutas usuario
route::resource('users','UsersController');

// rutas instituto
route::resource('institutos','InstitutoController');// FUNCIONA AL 100%


/// rutas roles
route::resource('roles','Controladores\RoleController');// FUNCIONA AL 100%
route::get('iniciorole','Controladores\RoleController@index')->name('roles.inicio');
route::PUT('/roles/roles/{role}','Controladores\RoleController@update')->name('role.update');


//MENU o permisos donde tendra acceso el usuario
route::resource('permisos','PermissionController');// FUNCIONA AL 50%





});
