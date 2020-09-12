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



///rutas protegidas On 

Route::group(["prefix"=>"sistema","middleware"=>["auth"]],function(){
   
   // Route::get('welcome', function () {
     //   return view('welcome');
   // });


 

route::get('/','Controller@index')->name('welcome');

//ruta del menu general de administracion 
route::get('/admin','Controller@menuadmin')->name('admin.admin');



//rutas usuario
route::resource('users','UsersController');

route::get('iniciouser','UsersController@index')->name('users.inicio');
route::get('users/users/{user}','UsersController@show');
route::get('users/users/{user}/edit','UsersController@edit');
route::PUT('users/users/{user}/edit','UsersController@update')->name('users.update');
route::DELETE('/{id}','UsersController@destroy')->name('destroy');
route::get('createuser','UsersController@create')->name('users.create');
route::POST('storeee','UsersController@store')->name('users.store');

// rutas instituto

route::resource('institutos','InstitutoController');// FUNCIONA AL 100%





/// rutas roles

route::resource('roles','Controladores\RoleController');
route::get('iniciorole','Controladores\RoleController@index')->name('roles.inicio');
route::PUT('/roles/roles/{role}','Controladores\RoleController@update')->name('role.update');


//MENU


route::resource('permisos','PermissionController');// FUNCIONA AL 100%





});
