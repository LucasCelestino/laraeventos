<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
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
use App\Http\Controllers\DashboardController;

Route::get('/', [EventController::class, 'index'])->name('eventos.home');
Route::get('/events/create', [EventController::class, 'create'])->name('eventos.form-criar')->middleware('auth');
Route::post('/events/create', [EventController::class, 'store'])->name('eventos.post-criar')->middleware('auth');
Route::get('/events/{id}', [EventController::class, 'show'])->name('eventos.show');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('eventos.dashboard');
Route::get('/dashboard/edit/{id}', [DashboardController::class, 'edit'])->name('eventos.dashboard.edit');
Route::delete('/dashboard/delete/{id}', [DashboardController::class, 'destroy'])->name('eventos.dashboard.destroy');

Auth::routes();

Route::get('/home', [EventController::class, 'index'])->name('home');

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

