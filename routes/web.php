<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;

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

Route::get('/',                     [HomeController::class , 'index']);

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    
    Route::get('/dashboard', 		[DashboardController::class , 'index'])->name('dashboard');

    Route::get('/users', 			[UsersController::class, 'index'])->name('users');
    Route::get('/users/edit', 		[UsersController::class, 'edit'])->name('users.edit');
    Route::get('/users/create', 	[UsersController::class, 'create'])->name('users.create');

    Route::post('/users', 			[UsersController::class, 'store'])->name('users.store');
    Route::put('/users', 			[UsersController::class, 'update'])->name('users.update');
    Route::post('/users-pagination',[UsersController::class, 'pagination']);
    Route::delete('/users/{id}', 	[UsersController::class, 'destroy'])->name('users.delete');
    Route::delete('/users-force', 	[UsersController::class, 'deleteForce'])->name('users.delete_force');

});
