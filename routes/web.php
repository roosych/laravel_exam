<?php

use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index']);

//свои методы в ресурс контроллере. вместо id передаю user, и в методе принимаю его (полностью)
Route::get('users/{user}/media', [UserController::class, 'media'])->name('media');
Route::get('users/{user}/security', [UserController::class, 'security'])->name('security');
Route::get('users/{user}/status', [UserController::class, 'status'])->name('status');

Route::post('users/{user}/setstatus', [UserController::class, 'setstatus'])->name('setstatus');
Route::post('users/{user}/editinfo', [UserController::class, 'editinfo'])->name('editinfo');

Route::resource('users', UserController::class);