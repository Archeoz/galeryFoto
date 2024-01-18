<?php

use App\Http\Controllers\GaleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[UserController::class, 'loginpage']);
Route::post('kirimlogin',[UserController::class, 'login']);

Route::get('logout',[UserController::class, 'logout']);

Route::get('registerpage', function(){
    return view('register');
});
Route::post('registerpost',[UserController::class, 'register']);

Route::get('mainpage',[GaleryController::class, 'mainpage'])->middleware('auth');

Route::post('uploadfoto',[GaleryController::class, 'uploadfoto']);
Route::post('editfoto/{id_galery}',[GaleryController::class, 'editfoto']);
Route::delete('hapusfoto/{id_galery}',[GaleryController::class, 'hapusfoto']);