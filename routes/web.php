<?php

use Illuminate\Support\Facades\Route;

//home route
Route::get('/', function () {

    return view('welcome');
});

//Auth routes
Auth::routes();

//admin routes
Route::get('/admin', 'AdminController@index'); //admin home
Route::get('/admin/classes', 'AdminController@classes'); //getting all the classes
Route::get('/admin/users', 'AdminController@users'); //getting all the users apart from admin
Route::post('/admin/create', 'AdminController@store'); //create a class
Route::delete('/admin/delete/class/{id}', 'AdminController@deleteClass'); //delete a class
Route::delete('/admin/delete/user/{id}', 'AdminController@deleteUser'); //delete a user

//profile route
Route::get('/profile/{id}', 'ProfileController@index'); //profile home

//classes route
Route::get('/classes', 'ClassesController@index'); //classes home

//enter class route
Route::post('/enterclass', 'EnterClassController@enterOrLeaveClass'); //enter or leave class