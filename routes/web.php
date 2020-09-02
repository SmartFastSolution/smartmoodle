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
