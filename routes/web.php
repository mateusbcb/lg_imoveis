<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\IndexController;
use App\Http\Livewire\PageIndex;

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
// Route::get('/', [IndexController::class, 'index'])->name('page.index');
Route::get('/', PageIndex::class)->name('page.index');

Route::get('/admin', function () {
    return view('admin.index');
});
