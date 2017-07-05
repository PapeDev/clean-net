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
Route::get('/contact', ['as' => 'contact', 'uses' => 'ContactController@getIndex']);
Route::post('/contact', ['as' => 'contact', 'uses' => 'ContactController@store']);
Route::get('/getPDF',array('as'=>'htmltopdfview','uses'=>'PdfController@getPDF'));
Route::get('/reports/linges',array('as'=>'reports.linges','uses'=>'PdfController@getReportLinge'));

Route::group(['middleware' => 'guest'], function(){
    Route::get('/', ['as' => 'login', 'uses' => 'LoginController@getLogin']);
    Route::post('/', ['as' => 'login', 'uses' => 'LoginController@postLogin']);


    Route::get('/cleannet-login', ['as' => 'cleannetlogin', 'uses' => 'CleannetadminController@getIndex']);
    Route::post('/cleannet-login', ['as' => 'cleannetlogin', 'uses' => 'CleannetadminController@postIndex']);
});
Route::get('/logout', ['uses' => 'LoginController@getLogout', 'as' => 'logout']);

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', ['as' => 'dashboard_Admin', 'uses' => 'AdminController@getIndex'])->middleware('auth');
    Route::get('/parametrage', ['as' => 'admin.parametrage', 'uses' => 'AdminController@getParametrage'])->middleware('auth');
    Route::put('/parametrage', ['as' => 'admin.paramesUpdate', 'uses' => 'AdminController@getParametresUpdate'])->middleware('auth');

    Route::resource('/categories', 'CategoryController');

    Route::get('/articles', ['as' => 'articles.index', 'uses' => 'ArticleController@index']);
    Route::post('/articles/create', ['as' => 'articles.store', 'uses' => 'ArticleController@store']);
    Route::get('/articles/create', ['as' => 'articles.create', 'uses' => 'ArticleController@create']);
    Route::put('/articles/{article}', ['as' => 'articles.update', 'uses' => 'ArticleController@update']);

    Route::delete('/articles/{article}', ['as' => 'articles.destroy', 'uses' => 'ArticleController@destroy']);
    Route::get('/articles/{article}', ['as' => 'articles.show', 'uses' => 'ArticleController@show']);
    Route::get('/articles/{article}/edit', ['as' => 'articles.edit', 'uses' => 'ArticleController@edit']);

});

Route::group(['prefix' => 'cleannet-admin'], function(){
    Route::get('/', ['as' => 'dashboard_cleannet', 'uses' => 'CleannetadminController@getDashboard'])->middleware('auth');
    Route::get('/list', ['as' => 'cleannet.list', 'uses' => 'CleannetadminController@getList'])->middleware('auth');
    Route::get('/ajouter', ['as' => 'cleannet.ajouter', 'uses' => 'CleannetadminController@create'])->middleware('auth');
    Route::post('/ajouter', ['as' => 'cleannet.store', 'uses' => 'CleannetadminController@store'])->middleware('auth');

});

Route::group(['prefix' => 'clients'], function(){
    Route::get('/', ['as' => 'clients', 'uses' => 'ClientController@getIndex'])->middleware('auth');
    Route::get('/create', ['as' => 'clients.create', 'uses' => 'ClientController@create'])->middleware('auth');
    Route::post('/store', ['as' => 'clients.store', 'uses' => 'ClientController@store'])->middleware('auth');
    Route::get('/consultation/{id}', ['as' => 'clients.show', 'uses' => 'ClientController@show'])->middleware('auth');
    Route::PUT('/consultation/{id}', ['as' => 'clients.update', 'uses' => 'ClientController@update'])->middleware('auth');
    Route::get('/testclient/{id}', ['as' => 'clients.checkActif', 'uses' => 'ClientController@checkActif'])->middleware('auth');
});


Route::group(['prefix' => 'depots'], function(){
    Route::get('/depots/create/{id}', ['as' => 'depots.create', 'uses' => 'DepotController@create'])->middleware('auth');
    Route::get('/add-linge/{id}/{clientID}', ['as' => 'depots.linge', 'uses' => 'DepotController@getAddLinge'])->middleware('auth');
    Route::get('/linge-client', ['as' => 'depots.lingeClient', 'uses' => 'DepotController@getLingeClient'])->middleware('auth');
});

Route::group(['prefix' => 'gerant'], function(){
    Route::get('/', ['as' => 'dashboard_gerant', 'uses' => 'GerantController@getIndex'])->middleware('auth');

});