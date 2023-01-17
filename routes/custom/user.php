<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ResourcesController;
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
//Resources
Route::post('/resources', [ResourcesController::class, 'index'])->name('resource');
Route::get('/overview', [DashboardController::class, 'index'])->name('index');
