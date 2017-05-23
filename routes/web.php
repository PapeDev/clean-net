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
Route::get('/clientsFaker',function(){
    $faker = Faker\Factory::create();

    $limit = 20;

    for ($i = 0; $i < $limit; $i++) {
        'Nom :' . $faker->firstName . 'Prenom :' .  $faker->lastName . 'Adresse :' . $faker->address . ', Email Address: ' . $faker->unique()->email . ', Contact No' . $faker->phoneNumber . '<br>';
    }
});

Route::group(['middleware' => 'guest'], function(){
    Route::get('/', ['as' => 'login', 'uses' => 'LoginController@getLogin']);
    Route::post('/', ['as' => 'login', 'uses' => 'LoginController@postLogin']);
});
Route::get('/logout', ['uses' => 'LoginController@getLogout', 'as' => 'logout']);

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', ['as' => 'dashboard_Admin', 'uses' => 'AdminController@getIndex'])->middleware('auth');

});

Route::group(['prefix' => 'clients'], function(){
    Route::get('/', ['as' => 'clients', 'uses' => 'ClientController@getIndex'])->middleware('auth');
    Route::get('/create', ['as' => 'clients.create', 'uses' => 'ClientController@create'])->middleware('auth');
    Route::post('/store', ['as' => 'clients.store', 'uses' => 'ClientController@store'])->middleware('auth');
    Route::get('/consultation/{id}', ['as' => 'clients.show', 'uses' => 'ClientController@show'])->middleware('auth');
    Route::PUT('/consultation/{id}', ['as' => 'clients.update', 'uses' => 'ClientController@update'])->middleware('auth');
});

Route::group(['prefix' => 'gerant'], function(){
    Route::get('/', ['as' => 'dashboard_gerant', 'uses' => 'GerantController@getIndex'])->middleware('auth');

});