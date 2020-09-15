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
   })->name('welcome');




Auth::routes();
// Auth::routes(["register" => false]);
// Auth::routes(["login" => false]);
// Auth::routes(["logout" => false]);


///rutas protegidas On 

// Route::group(["prefix"=>"sistema","middleware"=>["auth"]],function(){
  Route::group(["prefix"=>"sistema"],function(){ //por ahora sera la ruta hasta que se arregle lo del login
   
 route::get('/','Controller@index')->name('welcome');


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
Route::group(['prefix' => 'sistema/admin'], function() {

route::post('/plantilla', 'AdminController@plantilla')->name('admin.plantilla');
route::post('/taller1', 'AdminController@taller1')->name('admin.taller1');
route::post('/taller2', 'AdminController@taller2')->name('admin.taller2');
route::post('/taller3', 'AdminController@taller3')->name('admin.taller3');
	});

route::get('/sistema/taller/{plant}/{id}', 'TallersController@taller')->name('taller');
route::post('/sistema/taller1', 'TallersController@store1')->name('taller1');


route::get('/sistema/taller2', 'TallersController@taller2')->name('taller2');
route::post('/sistema/taller2', 'TallersController@store2')->name('taller2');

route::get('/sistema/taller3', 'TallersController@taller3')->name('taller3');
route::post('/sistema/taller3', 'TallersController@store3')->name('taller3');

route::get('/sistema/taller4', 'TallersController@taller4')->name('taller4');
route::post('/sistema/taller4', 'TallersController@store4')->name('taller4');

route::get('/sistema/taller5', 'TallersController@taller5')->name('taller5');
route::post('/sistema/taller5', 'TallersController@store5')->name('taller5');

route::get('/sistema/taller6', 'TallersController@taller6')->name('taller6');
route::post('/sistema/taller6', 'TallersController@store6')->name('taller6');

route::get('/sistema/taller7', 'TallersController@taller7')->name('taller7');
route::post('/sistema/taller7', 'TallersController@store7')->name('taller7');

route::get('/sistema/taller8', 'TallersController@taller8')->name('taller8');
route::post('/sistema/taller8', 'TallersController@store8')->name('taller8');

route::get('/sistema/taller9', 'TallersController@taller9')->name('taller9');
route::post('/sistema/taller9', 'TallersController@store9')->name('taller9');

route::get('/sistema/taller10', 'TallersController@taller10')->name('taller10');
route::post('/sistema/taller10', 'TallersController@store10')->name('taller10');
/*
route::get('/sistema/taller11', 'TallersController@taller11')->name('taller11');
route::get('/sistema/taller12', 'TallersController@taller12')->name('taller12');
route::get('/sistema/taller13', 'TallersController@taller13')->name('taller13');
route::get('/sistema/taller14', 'TallersController@taller14')->name('taller14');
route::get('/sistema/taller15', 'TallersController@taller15')->name('taller15');
route::get('/sistema/taller16', 'TallersController@taller16')->name('taller16');
route::get('/sistema/taller17', 'TallersController@taller17')->name('taller17');
route::get('/sistema/taller18', 'TallersController@taller18')->name('taller18');
route::get('/sistema/taller19', 'TallersController@taller19')->name('taller19');
route::get('/sistema/taller20', 'TallersController@taller20')->name('taller20');
route::get('/sistema/taller21', 'TallersController@taller21')->name('taller21');
route::get('/sistema/taller22', 'TallersController@taller22')->name('taller22');
route::get('/sistema/taller23', 'TallersController@taller23')->name('taller23');
route::get('/sistema/taller24', 'TallersController@taller24')->name('taller24');
route::get('/sistema/taller25', 'TallersController@taller25')->name('taller25');
route::get('/sistema/taller26', 'TallersController@taller26')->name('taller26');
route::get('/sistema/taller27', 'TallersController@taller27')->name('taller27');
route::get('/sistema/taller28', 'TallersController@taller28')->name('taller28');
route::get('/sistema/taller29', 'TallersController@taller29')->name('taller29');
route::get('/sistema/taller30', 'TallersController@taller30')->name('taller30');
route::get('/sistema/taller31', 'TallersController@taller31')->name('taller31');
route::get('/sistema/taller32', 'TallersController@taller32')->name('taller32');
route::get('/sistema/taller33', 'TallersController@taller33')->name('taller33');
route::get('/sistema/taller34', 'TallersController@taller34')->name('taller34');
route::get('/sistema/taller35', 'TallersController@taller35')->name('taller35');
route::get('/sistema/taller36', 'TallersController@taller36')->name('taller36');
route::get('/sistema/taller37', 'TallersController@taller37')->name('taller37');
route::get('/sistema/taller38', 'TallersController@taller38')->name('taller38');
route::get('/sistema/taller39', 'TallersController@taller39')->name('taller39');
route::get('/sistema/taller40', 'TallersController@taller40')->name('taller40');
route::get('/sistema/taller41', 'TallersController@taller41')->name('taller41');
route::get('/sistema/taller42', 'TallersController@taller42')->name('taller42');
route::get('/sistema/taller43', 'TallersController@taller43')->name('taller43');
route::get('/sistema/taller44', 'TallersController@taller44')->name('taller44');
route::get('/sistema/taller45', 'TallersController@taller45')->name('taller45');
route::get('/sistema/taller46', 'TallersController@taller46')->name('taller46');
route::get('/sistema/taller47', 'TallersController@taller47')->name('taller47');
route::get('/sistema/taller48', 'TallersController@taller48')->name('taller48');
route::get('/sistema/taller49', 'TallersController@taller49')->name('taller49');
route::get('/sistema/taller50', 'TallersController@taller50')->name('taller50');
route::get('/sistema/taller51', 'TallersController@taller51')->name('taller51');
route::get('/sistema/taller52', 'TallersController@taller52')->name('taller52');
route::get('/sistema/taller53', 'TallersController@taller53')->name('taller53');
route::get('/sistema/taller54', 'TallersController@taller54')->name('taller54');
route::get('/sistema/taller55', 'TallersController@taller55')->name('taller55');
route::get('/sistema/taller56', 'TallersController@taller56')->name('taller56');
*/
route::get('/sistema/admin', 'AdminController@admin')->name('admin');
route::post('/sistema/admin', 'AdminController@store')->name('admin');
