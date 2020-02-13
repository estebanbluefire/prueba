<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', [

	'as'    => 'index',

	'uses' => 'IndexController@index'
]);

Route::get('/indextitle', [

	'as'    => 'indextitle',

	'uses' => 'IndexController@indextitle'
]);

Route::get('/indexrelevance', [

	'as'    => 'indexrelevance',

	'uses' => 'IndexController@indexrelevance'
]);

Route::get('/indexlowprice', [

	'as'    => 'indexlowprice',

	'uses' => 'IndexController@indexlowprice'
]);

Route::get('/indexhighestprice', [

	'as'    => 'indexhighestprice',

	'uses' => 'IndexController@indexhighestprice'
]);

Route::get('/index3cheapest', [

	'as'    => 'index3cheapest',

	'uses' => 'IndexController@index3cheapest'
]);

Route::post('/indexcheck', [

	'as'    => 'indexcheck',

	'uses' => 'IndexController@indexcheck'
]);

Route::get('/indexcheck', [

	'as'    => 'indexcheck',

	'uses' => 'IndexController@indexcheck'
]);

Route::get('/indexdetail/{id}', [

	'as'    => 'indexdetail',

	'uses' => 'IndexController@indexdetail'
]);

/*Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});*/

Route::post('/car/{id}', [

	'as'    => 'indexcar',

	'uses' => 'CartController@indexcar'
]);

Route::get('/car/{id}', [

	'as'    => 'indexcar',

	'uses' => 'CartController@indexcar'
]);


Route::post('/car/delete', [

	'as'    => 'indexcardelete',

	'uses' => 'CartController@indexcardelete'
]);

Route::delete('/car/delete', [

	'as'    => 'indexcardelete',

	'uses' => 'CartController@indexcardelete'
]);

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/

Route::get('/users/confirmation/{token}', 'Auth\RegisterController@confirmation')->name('confirmation');