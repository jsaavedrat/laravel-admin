<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');


Route::get('/paises/create', [App\Http\Controllers\PaisesController::class, 'create'])->name('paises.create');
Route::post('/paises', [App\Http\Controllers\PaisesController::class, 'store'])->name('paises.store');
Route::post('/getState', [App\Http\Controllers\PaisesController::class, 'estados'])->name('getState');
Route::get('/states', [App\Http\Controllers\PaisesController::class, 'states'])->name('states');
Route::get('/careers', 'PaisesController@getCareers');

Route::get('/paises', [App\Http\Controllers\PaisesController::class, 'index'])->name('paises.index');
Route::get('/paises/{pais}', [App\Http\Controllers\PaisesController::class, 'show'])->name('paises.show');
Route::get('/paises/{pais}/edit', [App\Http\Controllers\PaisesController::class, 'edit'])->name('paises.edit');
Route::put('/paises/{pais}', [App\Http\Controllers\PaisesController::class, 'update'])->name('paises.update');
Route::delete('/paises/{pais}', [App\Http\Controllers\PaisesController::class, 'destroy'])->name('paises.delete');

Route::get('/estados/create', [App\Http\Controllers\EstadosController::class, 'create'])->name('estados.create');
Route::post('/estados', [App\Http\Controllers\EstadosController::class, 'store'])->name('estados.store');
Route::get('/estados', [App\Http\Controllers\EstadosController::class, 'index'])->name('estados.index');
Route::get('/estados/{estado}', [App\Http\Controllers\EstadosController::class, 'show'])->name('estados.show');
Route::get('/estados/{estado}/edit', [App\Http\Controllers\EstadosController::class, 'edit'])->name('estados.edit');
Route::put('/estados/{estado}', [App\Http\Controllers\EstadosController::class, 'update'])->name('estados.update');
Route::delete('/estados/{estado}', [App\Http\Controllers\EstadosController::class, 'destroy'])->name('estados.delete');

//Route::group(['middleware' => 'auth'], function() { 

    // Route::resource('posts', App\Http\Controllers\PostController::class);

    // Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    // Route::resource('roles', App\Http\Controllers\RoleController::class);
//});