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

Route::resource('/home', 'HomeController');

Route::get('/admin',function (){
   return 'You are admin';
})->middleware(['auth','auth.admin']);

Route::get('/superadmin',function (){
    return 'You are super admin';
})->middleware(['auth','auth.superadmin']);

Route::prefix('dp')->name('dp..')->group(function (){
    Route::resource('/department','DepartmentController');

});

Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function (){
    Route::resource('/users','UserController');
    Route::get('/user/{id}','UserController@assign')->name('users.assign');
    Route::put('/user/{id}','UserController@assignupdate')->name('users.updates');
    Route::resource('/department','DepartmentsController');

});
Route::namespace('GroupManager')->prefix('gm')->middleware(['auth','auth.groupmanager'])->name('gm.')->group(function (){
    Route::resource('/users','UserController');

});
Route::namespace('SuperAdmin')->prefix('superadmin')->middleware(['auth','auth.superadmin'])->name('superadmin.')->group(function (){
    Route::resource('/users','UserController');
    Route::get('/user/{id}','UserController@assign')->name('users.assign');
    Route::put('/user/{id}','UserController@assignupdate')->name('users.updates');

    Route::resource('/department','DepartmentsController');

});
