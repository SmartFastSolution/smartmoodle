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
route::get('/sistema/taller2', 'TallersController@taller2')->name('taller2');
route::get('/sistema/taller3', 'TallersController@taller3')->name('taller3');
route::get('/sistema/taller4', 'TallersController@taller4')->name('taller4');
route::get('/sistema/taller5', 'TallersController@taller5')->name('taller5');
route::get('/sistema/taller6', 'TallersController@taller6')->name('taller6');
route::get('/sistema/taller7', 'TallersController@taller7')->name('taller7');
