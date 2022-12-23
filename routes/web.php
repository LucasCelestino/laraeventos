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

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index'])->name('eventos.home');
Route::get('/events/create', [EventController::class, 'create'])->name('eventos.form-criar');
Route::post('/events/create', [EventController::class, 'store'])->name('eventos.post-criar');
Route::get('/events/{id}', [EventController::class, 'show'])->name('eventos.show');

Auth::routes();

Route::get('/home', [EventController::class, 'index'])->name('home');
