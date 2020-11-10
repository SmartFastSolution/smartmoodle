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




 // Route::get('/sistema', function () {
 //       return view('welcome');
 //   })->name('sistema');

 
 
  Auth::routes();

   //Auth::routes(['verify' => true]);

// Auth::routes(["register" => false]);
// Auth::routes(["login" => false]);
// Auth::routes(["logout" => false]);
Route::get('/', function () {
    return view('principal');
})->name('welcome');

///rutas protegidas On 

 //Route::group(["prefix"=>"sistema","middleware"=>["auth"]],function(){
  Route::group(["prefix"=>"sistema"],function(){ //por ahora sera la ruta hasta que se arregle lo del login
   

 

 route::get('/home','Controller@index')->name('administrador'); //ruta administracion

 route::get('home','AdminController@index')->name('administrador'); //ruta administracion

//ruta del menu general de administracion 

 route::get('/homedoc','DocenteController@index')->name('docente'); //ruta docente


 route::get('/homees','EstudianteController@index')->name('estudiante'); //ruta estudiante


//rutas vue asignaciones////
 Route::post('materiainst','HomeController@buscarMateria')->name('materiainst');
 Route::post('materiasasig','HomeController@materia')->name('materiassig');
 Route::post('userinst','HomeController@buscarAlumno')->name('userinst');
 Route::post('docinst','HomeController@buscarDocente')->name('docinst');
 Route::post('distinst','HomeController@buscarAsignacion')->name('distinst');
 Route::post('contmateria','HomeController@buscarContenido')->name('contmateria');


 //rutas menu estudiante
route::get('perfil','EstudianteController@show')->name('perfile');
route::get('unidad/{id}','EstudianteController@unidades')->name('Unidades');
route::get('estudiante/password', 'EstudianteController@password')->name('AlumnoPass'); //para metodo get del password 
route::post('estudiante/password','EstudianteController@updatep')->name('Estudiantes.updatep'); // para guardar el nuevo password

///rutas menu docente

route::get('contenido/{id}', 'DocenteController@contenidos')->name('Contenidos');
route::get('alumnos/{id}', 'DocenteController@cursos')->name('Alumnos');


 //permisoss
 

//////fin

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

//Ruta Resource para plan de cuentas
route::resource('pcuentas','PcuentaController');

//Ruta Resource para distribucion alumno curso/materia
route::resource('distrimas','DistrimaController');

//Ruta Resource para distribucion alumno docente/materia
route::resource('distribuciondos','DistribuciondoController');

//Ruta Resource para clonacion de unidad educativa
route::get('/clinstitutos/create','ClinstitutoController@create')->name('clinstitutos.create');
route::post('/clinstitutos/store','ClinstitutoController@p_clonainstituto')->name('clinstitutos.p_clonainstituto');

//Ruta Resource para Post
route::resource('posts','PostController');

//rutas para comentarios del post
route::post('/comment/store','CommentController@store')->name('comment.add');
route::post('/reply/store','CommentController@replyStore')->name('reply.add');
route::delete('/reply/destroy/{comment}','CommentController@destroy')->name('comment.destroy');
route::get('/reply/{comment}/edit','CommentController@edit')->name('comment.edit');
route::put('/reply/{comment}','CommentController@update')->name('comment.update');
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
route::post('/taller29', 'AdminController@taller29')->name('admin.taller29');
route::post('/taller31', 'AdminController@taller31')->name('admin.taller31');
route::post('/taller33', 'AdminController@taller33')->name('admin.taller33');
route::post('/taller34', 'AdminController@taller34')->name('admin.taller34');
route::post('/taller36', 'AdminController@taller36')->name('admin.taller36');
route::post('/taller37', 'AdminController@taller37')->name('admin.taller37');
route::post('/taller38', 'AdminController@taller38')->name('admin.taller38');
route::post('/taller39', 'AdminController@taller39')->name('admin.taller39');
route::post('/taller40', 'AdminController@taller40')->name('admin.taller40');
route::post('/taller42', 'AdminController@taller42')->name('admin.taller42');
route::post('/taller43', 'AdminController@taller43')->name('admin.taller43');
route::post('/taller44', 'AdminController@taller44')->name('admin.taller44');
route::post('/taller45', 'AdminController@taller45')->name('admin.taller45');
// route::post('/taller57', 'AdminController@taller57')->name('admin.taller57');
	});

route::get('/sistema/taller/{plant}/{id}', 'TallersController@taller')->name('taller');

route::get('/sistema/homees/taller/{plant}/{id}', 'TallerEstudianteController@taller')->name('taller.estudiante');


// route::post('/sistema/taller2', 'TallersController@store2')->name('taller2');
// route::post('/sistema/taller3', 'TallersController@store3')->name('taller3');
route::post('/sistema/admin/taller1/{idtaller}', 'TallerEstudianteController@store1')->name('taller1');
route::post('/sistema/admin/taller3/{idtaller}', 'TallerEstudianteController@store3')->name('taller3');
route::post('/sistema/admin/taller4/{idtaller}', 'TallerEstudianteController@store4')->name('taller4');
route::post('/sistema//admin/taller5/{idtaller}', 'TallerEstudianteController@store5')->name('taller5');
route::post('/sistema/admin/taller6/{idtaller}', 'TallerEstudianteController@store6')->name('taller6');
route::post('/sistema/admin/taller7/{idtaller}', 'TallerEstudianteController@store7')->name('taller7');
route::post('/sistema/admin/taller8/{idtaller}', 'TallerEstudianteController@store8')->name('taller8');
route::post('/sistema/admin/taller9/{idtaller}', 'TallerEstudianteController@store9')->name('taller9');
route::post('/sistema/admin/taller10/{idtaller}', 'TallerEstudianteController@store10')->name('taller10');
route::post('/sistema/admin/taller11/{idtaller}', 'TallerEstudianteController@store11')->name('taller11');
route::post('/sistema/admin/taller12/{idtaller}', 'TallerEstudianteController@store12')->name('taller12');
route::post('/sistema/admin/taller13/{idtaller}', 'TallerEstudianteController@store13')->name('taller13');
route::post('/sistema/admin/taller14/{idtaller}', 'TallerEstudianteController@store14')->name('taller14');
route::post('/sistema/admin/taller15/{idtaller}', 'TallerEstudianteController@store15')->name('taller15');
route::post('/sistema/admin/taller16/{idtaller}', 'TallerEstudianteController@store16')->name('taller16');
route::post('/sistema/admin/taller17/{idtaller}', 'TallerEstudianteController@store17')->name('taller17');
route::post('/sistema/admin/taller18/{idtaller}', 'TallerEstudianteController@store18')->name('taller18');
route::post('/sistema/admin/taller19/{idtaller}', 'TallerEstudianteController@store19')->name('taller19');
route::post('/sistema/admin/taller20/{idtaller}', 'TallerEstudianteController@store20')->name('taller20');
route::post('/sistema/admin/taller21/{idtaller}', 'TallerEstudianteController@store21')->name('taller21');
route::post('/sistema/admin/taller22/{idtaller}', 'TallerEstudianteController@store22')->name('taller22');
route::post('/sistema/admin/taller23/{idtaller}', 'TallerEstudianteController@store23')->name('taller23');
route::post('/sistema/admin/taller24/{idtaller}', 'TallerEstudianteController@store24')->name('taller24');
route::post('/sistema/admin/taller25/{idtaller}', 'TallerEstudianteController@store25')->name('taller25');
route::post('/sistema/admin/taller26/{idtaller}', 'TallerEstudianteController@store26')->name('taller26');
route::post('/sistema/admin/taller27/{idtaller}', 'TallerEstudianteController@store27')->name('taller27');
route::post('/sistema/admin/taller28/{idtaller}', 'TallerEstudianteController@store28')->name('taller28');
route::post('/sistema/admin/taller29/{idtaller}', 'TallerEstudianteController@store29')->name('taller29');
route::post('/sistema/admin/taller30/{idtaller}', 'TallerEstudianteController@store30')->name('taller30');
route::post('/sistema/admin/taller31/{idtaller}', 'TallerEstudianteController@store31')->name('taller31');
route::post('/sistema/admin/taller32/{idtaller}', 'TallerEstudianteController@store32')->name('taller32');
route::post('/sistema/admin/taller33/{idtaller}', 'TallerEstudianteController@store33')->name('taller33');
route::post('/sistema/admin/taller34/{idtaller}', 'TallerEstudianteController@store34')->name('taller34');
route::post('/sistema/admin/taller35/{idtaller}', 'TallerEstudianteController@store35')->name('taller35');
route::post('/sistema/admin/taller36/{idtaller}', 'TallerEstudianteController@store36')->name('taller36');
route::post('/sistema/admin/taller38/{idtaller}', 'TallerEstudianteController@store38')->name('taller38');
route::post('/sistema/admin/taller39/{idtaller}', 'TallerEstudianteController@store39')->name('taller39');
route::post('/sistema/admin/taller40/{idtaller}', 'TallerEstudianteController@store40')->name('taller40');
route::post('/sistema/admin/taller41/{idtaller}', 'TallerEstudianteController@store41')->name('taller41');
route::post('/sistema/admin/taller42/{idtaller}', 'TallerEstudianteController@store42')->name('taller42');
route::post('/sistema/admin/taller43/{idtaller}', 'TallerEstudianteController@store43')->name('taller43');
route::post('/sistema/admin/taller44/{idtaller}', 'TallerEstudianteController@store44')->name('taller44');
route::post('/sistema/admin/taller45/{idtaller}', 'TallerEstudianteController@store45')->name('taller45');
route::post('/sistema/admin/taller37/{idtaller}', 'TallerEstudianteController@store37')->name('taller_37');
route::post('/sistema/admin/taller/balance_inicial', 'TallerContabilidadController@balance_inicial')->name('balance_inicial');
route::post('/sistema/admin/taller/b_inicial_diario', 'TallerContabilidadController@b_inicial_diario')->name('b_inicial_diario');
route::post('/sistema/admin/taller/diario', 'TallerContabilidadController@diario')->name('diario');
route::post('/sistema/admin/taller/diariogeneral', 'TallerContabilidadController@obtenerdiario')->name('obtenerdiario');
route::post('/sistema/admin/taller/obtenerbalance', 'TallerContabilidadController@obtenerbalance')->name('obtenerbalance');



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
route::get('/sistema/taller57', 'TallersController@taller57')->name('taller57');

/*
*/
route::get('/sistema/admin/create', 'AdminController@admin')->name('admin.create');
route::post('/sistema/admin', 'AdminController@store')->name('admin');