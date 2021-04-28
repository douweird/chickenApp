<?php

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
    return view('welcome');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

/*-----------------------------------------------------------------
                    DINDE CRUD
------------------------------------------------------------------- */
Route::get('/DindeView', 'HomeController@DindeView');
Route::get('/AddDindeProduct','HomeController@AddDindeProduct');
Route::post('/AddDindeProduct','HomeController@AddDindeProduct');
/*-----------------------------------------------------------------
                   END OF DINDE CRUD
------------------------------------------------------------------- */

/*-----------------------------------------------------------------
                    Mortadelle CRUD
------------------------------------------------------------------- */
Route::get('/MortadelleView', 'HomeController@MortadelleView');
Route::get('/AddMortadelleProduct','HomeController@AddMortadelleProduct');
Route::post('/AddMortadelleProduct','HomeController@AddMortadelleProduct');
/*-----------------------------------------------------------------
                   END OF Mortadelle CRUD
------------------------------------------------------------------- */

/*-----------------------------------------------------------------
                    Alimentation CRUD
------------------------------------------------------------------- */
Route::get('/AlimentationView', 'HomeController@AlimentationView');
Route::get('/AddAlimentationProduct','HomeController@AddAlimentationProduct');
Route::post('/AddAlimentationProduct','HomeController@AddAlimentationProduct');
/*-----------------------------------------------------------------
                   END OF Alimentation CRUD
------------------------------------------------------------------- */

Route::get('/ModifyProduct/{id}','HomeController@ModifyProduct');
Route::post('/ModifyProduct/{id}','HomeController@ModifyProduct');
Route::get('/DeleteProduct/{id}','HomeController@DeleteProduct');

