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
Route::get('/', function () {return view('welcome');});
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

Route::amp('{type}/multimedia/galeria-goles/{title}', ['as' => 'multimediaForGalleryGoals', 'uses' => 'ArticleController@showAmpGalleryGoalsMultimedia']);

Route::amp('{type}/{category}/multimedia/galeria-compactos/{title}', ['as' => 'nada', 'uses' => 'ArticleController@showAmpGallery']);
Route::amp('{type}/multimedia/galeria-compactos/{title}', ['category' => '', 'as' => 'multimediaForGalleryGoals', 'uses' => 'ArticleController@showAmpGalleryGoalsMultimedia']);

Route::amp('{type}/multimedia/videos/{title}', ['as' => 'multimediaForCategory', 'uses' => 'ArticleController@showAmpMultimediaNonCategory']);
Route::amp('{type}/{category}/multimedia/videos/{title}', ['as' => 'multimediaForNonCategory', 'uses' => 'ArticleController@showAmpMultimedia']);

Route::amp('{type}/multimedia/galeria-imagenes/{title}', ['as' => 'multimediaForGalleryNonCategory', 'uses' => 'ArticleController@showAmpGalleryMultimediaNonCategory']);
Route::amp('{type}/{category}/multimedia/galeria-imagenes/{title}', ['as' => 'nada', 'uses' => 'ArticleController@showAmpGallery']);




