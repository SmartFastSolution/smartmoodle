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



///rutas protegidas On 

Route::group(["prefix"=>"sistema","middleware"=>["auth"]],function(){
   
   // Route::get('welcome', function () {
     //   return view('welcome');
   // });

route::get('/','Controller@index')->name('welcome');

});

route::get('/sistema/taller1', 'TallersController@taller1')->name('taller1');
route::post('/sistema/taller6', 'TallersController@store1')->name('taller6');
route::get('/sistema/taller2', 'TallersController@taller2')->name('taller2');
route::get('/sistema/taller3', 'TallersController@taller3')->name('taller3');
route::get('/sistema/taller4', 'TallersController@taller4')->name('taller4');
route::get('/sistema/taller5', 'TallersController@taller5')->name('taller5');
route::get('/sistema/taller6', 'TallersController@taller6')->name('taller6');
route::get('/sistema/taller7', 'TallersController@taller7')->name('taller7');
route::get('/sistema/taller8', 'TallersController@taller8')->name('taller8');
route::get('/sistema/taller9', 'TallersController@taller9')->name('taller9');
route::get('/sistema/taller10', 'TallersController@taller10')->name('taller10');
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


