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
    return view('auth.login');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

/*-----------------------------------------------------------------
                    DINDE CRUD
------------------------------------------------------------------- */
Route::get('/DindeView', 'HomeController@DindeView');
Route::get('/AddDindeProduct', 'HomeController@AddDindeProduct');
Route::post('/AddDindeProduct', 'HomeController@AddDindeProduct');
/*-----------------------------------------------------------------
                   END OF DINDE CRUD
------------------------------------------------------------------- */

/*-----------------------------------------------------------------
                    Mortadelle CRUD
------------------------------------------------------------------- */
Route::get('/MortadelleView', 'HomeController@MortadelleView');
Route::get('/AddMortadelleProduct', 'HomeController@AddMortadelleProduct');
Route::post('/AddMortadelleProduct', 'HomeController@AddMortadelleProduct');
/*-----------------------------------------------------------------
                   END OF Mortadelle CRUD
------------------------------------------------------------------- */

/*-----------------------------------------------------------------
                    Alimentation CRUD
------------------------------------------------------------------- */
Route::get('/AlimentationView', 'HomeController@AlimentationView');
Route::get('/AddAlimentationProduct', 'HomeController@AddAlimentationProduct');
Route::post('/AddAlimentationProduct', 'HomeController@AddAlimentationProduct');
/*-----------------------------------------------------------------
                   END OF Alimentation CRUD
------------------------------------------------------------------- */

Route::get('/ModifyProduct/{id}', 'HomeController@ModifyProduct');
Route::post('/ModifyProduct/{id}', 'HomeController@ModifyProduct');
Route::get('/DeleteProduct/{id}', 'HomeController@DeleteProduct');
/*-----------------------------------------------------------------
                    Credit CRUD
------------------------------------------------------------------- */
Route::get('/ViewCredit', 'HomeController@ViewCredit');
Route::get('/AddCredit/{id}', 'HomeController@AddCredit');
Route::post('/AddCredit/{id}', 'HomeController@AddCredit');
Route::get('/ModifyCredit/{id}', 'HomeController@ModifyCredit');
Route::post('/ModifyCredit/{id}', 'HomeController@ModifyCredit');
Route::get('/DeleteCredit/{id}', 'HomeController@DeleteCredit');
/*-----------------------------------------------------------------
                   END OF Credit CRUD
------------------------------------------------------------------- */

Route::get('/ModifyProduct/{id}', 'HomeController@ModifyProduct');
Route::post('/ModifyProduct/{id}', 'HomeController@ModifyProduct');
Route::get('/DeleteProduct/{id}', 'HomeController@DeleteProduct');


Route::get('/AddCheck', 'HomeController@addCheck');
Route::post('/AddCheck', 'HomeController@addCheck');
Route::post('/ModifyCheck/{id}', 'HomeController@ModifyCheck');
Route::get('/ModifyCheck/{id}', 'HomeController@ModifyCheck');
Route::get('/DeleteCheck/{id}', 'HomeController@DeleteCheck');
Route::get('/CheckView', 'HomeController@CheckView');

Route::post('/addAvenceProduct', 'HomeController@addAvanceProduct');

Route::get('/AddClient', 'HomeController@AddClientProduct');
Route::post('/AddClient', 'HomeController@AddClientProduct');
Route::get('/DeleteClient/{id}', 'HomeController@DeleteClient');
Route::get('/ModifyClient/{id}', 'HomeController@ModifyClient');
Route::post('/ModifyClient/{id}', 'HomeController@ModifyClient');

Route::get('/ClientsView', 'HomeController@ClientsView');



Route::get('/ClientCredits/{id}', 'HomeController@ClientCredits');


Route::get('/lkwaraView/', 'HomeController@lkwaraView');
Route::post('/addalf/', 'HomeController@addalf');
Route::get('/deletealf/{id}', 'HomeController@deletealf');
Route::get('/clearAlf/', 'HomeController@clearAlf');

/*-----------------------------------------------------------------
                    Employee CRUD
------------------------------------------------------------------- */
Route::get('/ViewEmployees', 'HomeController@ViewEmployees');
Route::get('/AddEmploye', 'HomeController@AddEmploye');
Route::post('/AddEmploye', 'HomeController@AddEmploye');
Route::get('/ModifyEmploye/{id}', 'HomeController@ModifyEmploye');
Route::post('/ModifyEmploye/{id}', 'HomeController@ModifyEmploye');
Route::get('/DeleteEmploye/{id}', 'HomeController@DeleteEmploye');
Route::get('/AddAvance/{id}', 'HomeController@AddAvance');
Route::post('/AddAvance/{id}', 'HomeController@AddAvance');
Route::get('/ViewAvances/{id}/{name}', 'HomeController@ViewAvance');
Route::get('/EmployeSync/{id}', 'HomeController@EmployeSync');
Route::get('/EmployeSync/{id}', 'HomeController@EmployeSync');

Route::get('/ViewKori/', 'HomeController@getKoriEmployees');
/*-----------------------------------------------------------------
                   END OF Employee CRUD
------------------------------------------------------------------- */