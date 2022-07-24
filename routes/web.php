<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Page;
use App\Http\Livewire\AdminCities;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPropertiesController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AdminCityController;

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
/**
 * * PAGE
 */
Route::get('/', Page::class)->name('page.index');
Route::get('/property/{id}', [PropertyController::class, 'index'])->name('page.property');

/**
** LOGIN / REGISTER
 */
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

/**
 * * ADMIN
 */
Route::middleware('auth')->prefix('/admin')->group(function () {

    // Admin - Principal(Dashboard)
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.index');

    // Admin - Imoveis
    Route::prefix('/properties')->group(function () {
        Route::get('/', [AdminPropertiesController::class, 'properties'])->name('admin.properties');
        Route::get('/view/{id}', [AdminPropertiesController::class, 'properties_view'])->name('admin.properties.view');
        Route::get('/edit/{id}', [AdminPropertiesController::class, 'properties_edit'])->name('admin.properties.edit');
        Route::get('/delete/{id}', [AdminPropertiesController::class, 'properties_delete'])->name('admin.properties.delete');

        Route::get('/create', [AdminPropertiesController::class, 'create'])->name('admin.properties.create');
        Route::post('/store', [AdminPropertiesController::class, 'store'])->name('admin.properties.store');
        Route::get('/searchDistrict', [AdminPropertiesController::class, 'searchDistrict'])->name('admin.properties.searchDistrict');
    });

    // Admin - Cidades
    Route::prefix('/cities')->group(function () {
        Route::get('/', [AdminCityController::class, 'index'])->name('admin.cities');
    });

});
