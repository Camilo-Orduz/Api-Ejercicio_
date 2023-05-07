<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CountriesController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('countries', [CountriesController::class, 'store']);
Route::get('countries', [CountriesController::class, 'index']);
Route::get('countries/{id}', [CountriesController::class, 'show']);
Route::put('countries/{id}', [CountriesController::class, 'update']);
Route::delete('countries/{id}', [CountriesController::class, 'destroy']);