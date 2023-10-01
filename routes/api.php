<?php

use App\Http\Controllers\Api\V1\GeneralApiController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth.token'])->group(function () {
    Route::get('/companies', [GeneralApiController::class, 'getCompanies']);
    Route::get('/clients/{company}', [GeneralApiController::class, 'getClients']);
    Route::get('/companies/{client}', [GeneralApiController::class, 'getClientCompanies']);
});
