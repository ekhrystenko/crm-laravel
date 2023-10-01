<?php

use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\CompaniesController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
    Route::resource('/companies', CompaniesController::class);
    Route::resource('/clients', ClientsController::class);
});


