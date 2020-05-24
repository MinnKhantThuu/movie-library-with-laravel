<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PageController@index');
Route::get('/home', 'PageController@home');
Route::get('/movies/{id}','PageController@view');
Route::get('/search','PageController@search');

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/register','RegisterController@showRegistrationForm');
    Route::post('/register','RegisterController@register');
    Route::get('/login','LoginController@showLoginForm');
    Route::post('/login','LoginController@login');
    Route::get('/logout','LoginController@logout');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'Adminware'],function(){
    Route::get('/','AdminUserController@index');

    // User
    Route::get('/user','AdminUserController@index');
    Route::get('/user/edit/{id}','AdminUserController@edit');
    Route::post('/user/edit/{id}','AdminUserController@update');
    Route::get('/user/softdelete/{id}','AdminUserController@softdelete');
    Route::get('/user/delete/{id}','AdminUserController@delete');

    // Role & Permission
    Route::get('/roleper','AdminRolePerController@index');
    Route::get('/roleper/role/{id}','AdminRolePerController@role');
    Route::get('/roleper/role/add/{id}/{rname}','AdminRolePerController@addRole');
    Route::get('/roleper/role/remove/{id}/{rname}','AdminRolePerController@removeRole');

    Route::get('/roleper/permission/{id}','AdminRolePerController@permission');
    Route::get('/roleper/permission/add/{id}/{pname}','AdminRolePerController@addPermission');
    Route::get('/roleper/permission/remove/{id}/{pname}','AdminRolePerController@removePermission');

    // Category
    Route::get('/cat','AdminCatController@index');
    Route::get('/cat/create/{parent?}','AdminCatController@create');
    Route::post('/cat/create/{parent?}','AdminCatController@store');
    Route::get('/cat/edit/{id}','AdminCatController@edit');
    Route::post('/cat/edit/{id}','AdminCatController@update');
    Route::get('/cat/delete/{id}','AdminCatController@delete');
    Route::get('/cat/destroy/{id}','AdminCatController@destroy');


    // Movie
    Route::get('/movie','AdminMovieController@index');
    Route::get('/movie/create','AdminMovieController@create');
    Route::post('/movie/create','AdminMovieController@store');
    Route::get('/movie/edit/{id}','AdminMovieController@edit');
    Route::post('/movie/edit/{id}','AdminMovieController@update');
    Route::get('/movie/delete/{id}','AdminMovieController@delete');
    Route::get('/movie/view/{id}','AdminMovieController@view');
    Route::get('/movie/search','AdminMovieController@search');
});

