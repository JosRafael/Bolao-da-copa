<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApostaController;

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
Route::resource('apostas', ApostaController::class)->middleware('auth');
// Route::get('/apostas', [HomeController::class, 'index'])->name('welcome');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/cadastrar', [LoginController::class, 'cadastrar'])->name('cadastrar');
Route::get('/', [HomeController::class, 'index'])->name('welcome');


