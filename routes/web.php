<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Page;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\PropertyController;

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
Route::get('/', Page::class)->name('page.index');
Route::get('/property/{id}', [PropertyController::class, 'index'])->name('page.property');

Route::get('/login', [IndexController::class, 'login'])->name('login');
// Route::post('/login_send', [IndexController::class, 'loginSend'])->name('login.send');
Route::get('/register', [IndexController::class, 'register'])->name('register');
// Route::post('/register_send', [IndexController::class, 'registerSend'])->name('register.send');
Route::get('/logout', [IndexController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('/admin')->group(function () {

    Route::get('/', [IndexController::class, 'dashboard'])->name('admin.index');

    Route::prefix('/properties')->group(function () {
        Route::get('/', [IndexController::class, 'properties'])->name('admin.properties');
        Route::get('/view/{id}', [IndexController::class, 'properties_view'])->name('admin.properties.view');
        Route::get('/edit/{id}', [IndexController::class, 'properties_edit'])->name('admin.properties.edit');
        Route::get('/delete/{id}', [IndexController::class, 'properties_delete'])->name('admin.properties.delete');

        Route::get('/create', [IndexController::class, 'create'])->name('admin.properties.create');
        Route::post('/store', [IndexController::class, 'store'])->name('admin.properties.store');
    });

});
