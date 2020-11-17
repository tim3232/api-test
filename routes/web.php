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

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function (){
        return redirect()->route('repo.index');
    });
    Route::get('favorite', 'RepoCrudController@favorite')->name('favorite-repos');
    Route::resource('repo', 'RepoCrudController');

});
