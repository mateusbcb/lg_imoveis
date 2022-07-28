<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Page;
use App\Http\Livewire\AdminCities;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPropertiesController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AdminCitiesController;
use App\Http\Controllers\AdminDistrictsController;
use App\Http\Controllers\AdminBusinessController;
use App\Http\Controllers\AdminCategoriesController;

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

Route::get('/search', [PropertyController::class, 'search'])->name('page.search');

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
        // lista de todos od imóveis
        Route::get('/', [AdminPropertiesController::class, 'properties'])->name('admin.properties');

        // exibir detalhes de um imóvel
        Route::get('/view/{id}', [AdminPropertiesController::class, 'show'])->name('admin.properties.view');

        // editar um imóvel
        Route::get('/edit/{id}', [AdminPropertiesController::class, 'edit'])->name('admin.properties.edit');
        // fazer a atualização das edições
        Route::post('/edit/{id}/update', [AdminPropertiesController::class, 'update'])->name('admin.properties.update');

        // criar um novo imóvel
        Route::get('/create', [AdminPropertiesController::class, 'create'])->name('admin.properties.create');
        // salvar o novo imóvel
        Route::post('/store', [AdminPropertiesController::class, 'store'])->name('admin.properties.store');
        // buscar bairro dependendo da cidade selecionada
        Route::get('/searchDistrict', [AdminPropertiesController::class, 'searchDistrict'])->name('admin.properties.searchDistrict');

        // deletar um imóvel
        Route::get('/delete/{id}', [AdminPropertiesController::class, 'destroy'])->name('admin.properties.destroy');
    });

    // Admin - Cidades
    Route::prefix('/cities')->group(function () {
        Route::get('/', [AdminCitiesController::class, 'index'])->name('admin.cities');
    });

    // Admin - Bairros
    Route::prefix('/districts')->group(function () {
        Route::get('/', [AdminDistrictsController::class, 'index'])->name('admin.districts');
    });

    // Admin - Tipo de negócios
    Route::prefix('/business')->group(function () {
        Route::get('/', [AdminBusinessController::class, 'index'])->name('admin.business');
    });

    // Admin - Tipo de imóvel
    Route::prefix('/categories')->group(function () {
        Route::get('/', [AdminCategoriesController::class, 'index'])->name('admin.categories');
    });

});
