<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\PageIndex;

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
Route::get('/', PageIndex::class)->name('page.index');
Route::get('/property/{id}', [PropertyController::class, 'index'])->name('page.property');

Route::get('/login', [IndexController::class, 'login'])->name('login');
// Route::post('/login_send', [IndexController::class, 'loginSend'])->name('login.send');
Route::get('/register', [IndexController::class, 'register'])->name('register');
// Route::post('/register_send', [IndexController::class, 'registerSend'])->name('register.send');
Route::get('/logout', [IndexController::class, 'logout'])->name('logout');

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index')->middleware('auth');
