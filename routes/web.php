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

Route::get('/index', function () {
    return view('index');
});

Route::get('/index', array('as' => 'show','uses' => 'WorkerController@index'));

Route::get('/createG', array('as' => 'create_gender_type_form','uses' => 'Gender_typeController@getForm'));
Route::post('/createGen', array('as' => 'create_gender_type','uses' => 'Gender_typeController@postCreate'));

Route::get('/createP', array('as' => 'create_position_form','uses' => 'PositionController@getForm'));
Route::post('/createPos', array('as' => 'create_position','uses' => 'PositionController@postCreate'));

Route::get('/create', array('as' => 'create','uses' => 'WorkerController@create'));
Route::post('/create', 'WorkerController@store');

Route::get('/deleteworker/{id}', array('as' => 'delete_worker','uses' => 'WorkerController@getDelete'));

Route::get('worker/{id}/edit', array('as' => 'worker.edit','uses' => 'WorkerController@edit'));
Route::post('worker/{id}', array('as'=>'worker.update','uses'=>'WorkerController@update'));

Route::get('worker/{id}/show', array('as' => 'worker.show','uses' => 'WorkerController@show'));