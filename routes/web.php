<?php
use Illuminate\Support\Facades\Routes;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Gate;

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


   //prueba gate rol all
//    Route::get('/test', function () {
//        $user=User::find(3);
//       // $user->roles()->sync([3]);
//      Gate::authorize('haveaccess', 'rol.index');
//       return $user;
//    //  return $user->havePermission('rol.create');
// });

Auth::routes();
// Auth::routes(["register" => false]);
// Auth::routes(["login" => false]);
// Auth::routes(["logout" => false]);


///rutas protegidas On 

 //Route::group(["prefix"=>"sistema","middleware"=>["auth"]],function(){
  Route::group(["prefix"=>"sistema"],function(){ //por ahora sera la ruta hasta que se arregle lo del login
   
 route::get('/','Controller@index')->name('welcome');


route::get('/','Controller@index')->name('welcome');
//ruta del menu general de administracion 



//rutas usuario
route::resource('users','UsersController');

// rutas instituto
route::resource('institutos','InstitutoController');// FUNCIONA AL 100%


/// rutas roles
route::resource('roles','Controladores\RoleController');// FUNCIONA AL 100%
route::get('iniciorole','Controladores\RoleController@index')->name('roles.inicio');
route::PUT('/roles/roles/{role}','Controladores\RoleController@update')->name('role.update');


//MENU o permisos donde tendra acceso el usuario
route::resource('permissions','PermissionController');// FUNCIONA AL 50%


//Ruta Resource de Niveles que va aliada con el curso
route::resource('nivels','NivelController'); //ojo en este caso le cambie niveles -> nivels como esta en la tabla 
//al parecer el nombre de la tabla en bd tiene relacion con las rutas que asignamos como metodo resource

//Ruta Resource de Cursos que va aliada con el curso
route::resource('cursos','CursoController');

//Ruta Resource de Materias que va aliada con el curso
route::resource('materias','MateriaController');


//Ruta Resource de Materias que va aliada con el curso
route::resource('contenidos','ContenidoController');



//Ruta Resource par asignacion de cursos y materias prueba 2 
route::resource('distribucionmacus','DistribucionmacuController');
});




Route::group(['prefix' => 'sistema/admin'], function() {

route::post('/plantilla', 'AdminController@plantilla')->name('admin.plantilla');
route::post('/taller1', 'AdminController@taller1')->name('admin.taller1');
route::post('/taller2', 'AdminController@taller2')->name('admin.taller2');
route::post('/taller3', 'AdminController@taller3')->name('admin.taller3');
route::post('/taller4', 'AdminController@taller4')->name('admin.taller4');
route::post('/taller5', 'AdminController@taller5')->name('admin.taller5');
route::post('/taller6', 'AdminController@taller6')->name('admin.taller6');
route::post('/taller7', 'AdminController@taller7')->name('admin.taller7');
route::post('/taller8', 'AdminController@taller8')->name('admin.taller8');
route::post('/taller9', 'AdminController@taller9')->name('admin.taller9');
route::post('/taller10', 'AdminController@taller10')->name('admin.taller10');
route::post('/taller11', 'AdminController@taller11')->name('admin.taller11');
route::post('/taller12', 'AdminController@taller12')->name('admin.taller12');
route::post('/taller13', 'AdminController@taller13')->name('admin.taller13');
route::post('/taller14', 'AdminController@taller14')->name('admin.taller14');
route::post('/taller15', 'AdminController@taller15')->name('admin.taller15');
route::post('/taller16', 'AdminController@taller16')->name('admin.taller16');
route::post('/taller17', 'AdminController@taller17')->name('admin.taller17');
route::post('/taller18', 'AdminController@taller18')->name('admin.taller18');
route::post('/taller19', 'AdminController@taller19')->name('admin.taller19');
route::post('/taller20', 'AdminController@taller20')->name('admin.taller20');
route::post('/taller21', 'AdminController@taller21')->name('admin.taller21');
route::post('/taller22', 'AdminController@taller22')->name('admin.taller22');
route::post('/taller23', 'AdminController@taller23')->name('admin.taller23');
route::post('/taller24', 'AdminController@taller24')->name('admin.taller24');
route::post('/taller25', 'AdminController@taller25')->name('admin.taller25');
route::post('/taller26', 'AdminController@taller26')->name('admin.taller26');
route::post('/taller27', 'AdminController@taller27')->name('admin.taller27');
route::post('/taller28', 'AdminController@taller28')->name('admin.taller28');
route::post('/taller28', 'AdminController@taller28')->name('admin.taller28');
route::post('/taller34', 'AdminController@taller34')->name('admin.taller34');
	});

route::get('/sistema/taller/{plant}/{id}', 'TallersController@taller')->name('taller');
route::post('/sistema/admin/taller1/{idtaller}', 'TallersController@store1')->name('taller1');


route::get('/sistema/taller2', 'TallersController@taller2')->name('taller2');
route::post('/sistema/taller2', 'TallersController@store2')->name('taller2');

route::get('/sistema/taller3', 'TallersController@taller3')->name('taller3');
route::post('/sistema/taller3', 'TallersController@store3')->name('taller3');

route::post('/sistema/admin/taller4/{idtaller}', 'TallersController@store4')->name('taller4');

route::get('/sistema/taller5', 'TallersController@taller5')->name('taller5');
route::post('/sistema/taller5', 'TallersController@store5')->name('taller5');

route::get('/sistema/taller6', 'TallersController@taller6')->name('taller6');
route::post('/sistema/admin/taller6/{idtaller}', 'TallersController@store6')->name('taller6');


route::get('/sistema/taller7', 'TallersController@taller7')->name('taller7');
route::post('/sistema/admin/taller7/{idtaller}', 'TallersController@store7')->name('taller7');

route::get('/sistema/taller8', 'TallersController@taller8')->name('taller8');
route::post('/sistema/admin/taller8/{idtaller}', 'TallersController@store8')->name('taller8');


route::get('/sistema/taller9', 'TallersController@taller9')->name('taller9');
route::post('/sistema/admin/taller9/{idtaller}', 'TallersController@store9')->name('taller9');

route::get('/sistema/taller10', 'TallersController@taller10')->name('taller10');
route::post('/sistema/admin/taller10/{idtaller}', 'TallersController@store10')->name('taller10');


route::get('/sistema/taller11', 'TallersController@taller11')->name('taller11');

route::post('/sistema/admin/taller12/{idtaller}', 'TallersController@store12')->name('taller12');

route::post('/sistema/admin/taller13/{idtaller}', 'TallersController@store13')->name('taller13');

route::post('/sistema/admin/taller14/{idtaller}', 'TallersController@store14')->name('taller14');

route::post('/sistema/admin/taller15/{idtaller}', 'TallersController@store15')->name('taller15');
route::post('/sistema/admin/taller16/{idtaller}', 'TallersController@store16')->name('taller16');

route::post('/sistema/admin/taller17/{idtaller}', 'TallersController@store17')->name('taller17');
route::post('/sistema/admin/taller18/{idtaller}', 'TallersController@store18')->name('taller18');
route::post('/sistema/admin/taller19/{idtaller}', 'TallersController@store19')->name('taller19');
route::post('/sistema/admin/taller20/{idtaller}', 'TallersController@store20')->name('taller20');
route::post('/sistema/admin/taller21/{idtaller}', 'TallersController@store21')->name('taller21');
route::post('/sistema/admin/taller22/{idtaller}', 'TallersController@store22')->name('taller22');
route::post('/sistema/admin/taller23/{idtaller}', 'TallersController@store23')->name('taller23');
route::post('/sistema/admin/taller24/{idtaller}', 'TallersController@store24')->name('taller24');
route::post('/sistema/admin/taller25/{idtaller}', 'TallersController@store25')->name('taller25');
route::post('/sistema/admin/taller26/{idtaller}', 'TallersController@store26')->name('taller26');
route::post('/sistema/admin/taller27/{idtaller}', 'TallersController@store27')->name('taller27');
route::post('/sistema/admin/taller34/{idtaller}', 'TallersController@store34')->name('taller_34');


route::get('/sistema/taller28', 'TallersController@taller28')->name('taller28');
route::get('/sistema/taller29', 'TallersController@taller29')->name('taller29');
route::get('/sistema/taller30', 'TallersController@taller30')->name('taller30');
route::get('/sistema/taller31', 'TallersController@taller31')->name('taller31');
route::get('/sistema/taller32', 'TallersController@taller32')->name('taller32');
route::get('/sistema/taller33', 'TallersController@taller33')->name('taller33');

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

/*
*/
route::get('/sistema/admin/create', 'AdminController@admin')->name('admin.create');
route::post('/sistema/admin', 'AdminController@store')->name('admin');
