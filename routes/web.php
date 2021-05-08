<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('user.index');
Route::get('/user/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [App\Http\Controllers\UsersController::class, 'user'])->name('user.update');
Route::delete('/user/delete/{id}', [App\Http\Controllers\UsersController::class, 'userDelete'])->name('user.delete');

Route::post('/address/store', [App\Http\Controllers\AddressController::class, 'store'])->name('address.store');

Route::get('/users/activity', [App\Http\Controllers\UserActivityController::class, 'index'])->name('user.activity');
Route::delete('/users/activity/delete/{id}', [App\Http\Controllers\UserActivityController::class, 'userDelete'])->name('user.activityDelete');

