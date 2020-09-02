<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

Auth::routes();

Route::get('users/edit/{id}',['as' => 'edit.user', 'uses' => 'Auth\RegisterController@edit']);

Route::put('users/update/{id}',['as' => 'update.user', 'uses' => 'Auth\RegisterController@update']);

Route::get('/home', 'HomeController@index')->name('home');

// departamentos
Route::get('departamento/', ['as' => 'dep.list', 'uses' => 'DepartamentController@index']);

Route::get('departamento/nuevo', ['as' => 'dep.new', 'uses' => 'DepartamentController@create']);

Route::post('departamento/store', ['as' => 'dep.store', 'uses' => 'DepartamentController@store']);

Route::get('departamento/editar/{id}', ['as' => 'dep.edit', 'uses' => 'DepartamentController@edit']);

Route::put('departamento/update/{id}', ['as' => 'dep.update', 'uses' => 'DepartamentController@update']);

Route::get('departamento/erase/{id}', ['as' => 'dep.erase', 'uses' => 'DepartamentController@erase']);

// Supervisores
Route::get('supervisores/', ['as' => 'sup.list', 'uses' => 'SupervisorController@index']);

Route::get('supervisores/nuevo', ['as' => 'sup.new', 'uses' => 'SupervisorController@create']);

Route::post('supervisores/store', ['as' => 'sup.store', 'uses' => 'SupervisorController@store']);

Route::get('supervisores/edit/{id}', ['as' => 'sup.edit', 'uses' => 'SupervisorController@edit']);

Route::get('supervisores/show/{id}', ['as' => 'sup.show', 'uses' => 'SupervisorController@show']);

Route::put('supervisores/update/{id}', ['as' => 'sup.update', 'uses' =>'SupervisorController@update']);

Route::get('supervisores/erase/{id}', ['as' => 'sup.erase', 'uses' => 'SupervisorController@erase']);

Route::get('supervisores/report', ['as' => 'sup.report', 'uses' => 'SupervisorController@report']);
