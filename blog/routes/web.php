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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin',function (){
   return 'You are admin';
})->middleware(['auth','auth.admin']);

Route::get('/superadmin',function (){
    return 'You are super admin';
})->middleware(['auth','auth.superadmin']);

Route::get('/groupmanager',function (){
    return 'You are group manager';
})->middleware(['auth','auth.groupmanager']);



Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function (){
    Route::resource('/users','UserController',['except'=>['show','create','store']]);
});
