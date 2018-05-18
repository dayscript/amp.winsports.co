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

Route::get('/', function () {
    return view('welcome');
});

Route::get('aws', 'Controller@aws');

/*
 * Routes
 */

Route::resource('article', 'ArticleController');

/*
 * Routes for AMP
 */

Route::amp('{type}/noticias/{title}', ['as' => 'article', 'uses' => 'ArticleController@showAmp']);
Route::amp('{type}/{category}/noticias/{title}', ['as' => 'articleForCategory', 'uses' => 'ArticleController@showAmpForCategory']);
