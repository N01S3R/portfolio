<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\Permissions\PermissionsAdminController;
use App\Http\Controllers\Admin\PermissionsCategory\PermissionsCategoryAdminController;
use App\Http\Controllers\Admin\Roles\RolesAdminController;
use App\Http\Controllers\Admin\Users\UsersAdminController;

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

// Admin Dashboard
Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard.index');
Route::post('/users/checkEmail', [UsersAdminController::class, 'checkEmail'])->name('users.checkEmail');
Route::post('/users/checkUserName', [UsersAdminController::class, 'checkUserName'])->name('users.checkUserName');

// Admin Users
Route::get('/users', [UsersAdminController::class, 'index'])->name('users.index');
Route::post('/users/create', [UsersAdminController::class, 'store'])->name('users.store');
Route::post('/users/update', [UsersAdminController::class, 'update'])->name('users.update');
Route::get('/users/edit', [UsersAdminController::class, 'edit'])->name('users.edit');
Route::get('/users/show', [UsersAdminController::class, 'show'])->name('users.show');
Route::delete('/users/{id}', [UsersAdminController::class, 'destroy'])->name('users.destroy');

// Admin Roles
Route::get('/roles', [RolesAdminController::class, 'index'])->name('roles.index');
Route::post('/roles/create', [RolesAdminController::class, 'create'])->name('roles.create');
Route::post('/roles/store', [RolesAdminController::class, 'store'])->name('roles.store');
Route::post('/roles/update', [RolesAdminController::class, 'update'])->name('roles.update');
Route::get('/roles/edit/', [RolesAdminController::class, 'edit'])->name('roles.edit');
Route::get('/roles/show', [RolesAdminController::class, 'show'])->name('roles.show');
Route::delete('/roles/{id}', [RolesAdminController::class, 'destroy'])->name('roles.destroy');

// Admin PermissionsCategories
Route::get('/permissions-category', [PermissionsCategoryAdminController::class, 'index'])->name('permissionsCategory.index');
Route::post('/permissions-category/create', [PermissionsCategoryAdminController::class, 'store'])->name('permissionsCategory.store');
Route::get('/permissions-category/show', [PermissionsCategoryAdminController::class, 'show'])->name('permissionsCategory.show');
Route::get('/permissions-category/edit/', [PermissionsCategoryAdminController::class, 'edit'])->name('permissionsCategory.edit');
Route::post('/permissions-category/update/', [PermissionsCategoryAdminController::class, 'update'])->name('permissionsCategory.update');
Route::delete('/permissions-category/delete/{id}', [PermissionsCategoryAdminController::class, 'destroy'])->name('permissionsCategory.destroy');

// Admin Permissions
Route::get('/permissions', [PermissionsAdminController::class, 'index'])->name('permissions.index');
Route::post('/permissions/create', [PermissionsAdminController::class, 'store'])->name('permissions.store');
Route::get('/permissions/show', [PermissionsAdminController::class, 'show'])->name('permissions.show');
Route::get('/permissions/edit/', [PermissionsAdminController::class, 'edit'])->name('permissions.edit');
Route::post('/permissions/update/', [PermissionsAdminController::class, 'update'])->name('permissions.update');
Route::delete('/permissions/delete/{id}', [PermissionsAdminController::class, 'destroy'])->name('permissions.destroy');
