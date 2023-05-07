<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CountriesController;
use App\Http\Controllers\Api\DepartamentsController;
use App\Http\Controllers\Api\SchoolsController;
use App\Http\Controllers\Api\UsersController;
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

Route::post('departaments', [DepartamentsController::class, 'store']);
Route::get('departaments/{id}', [DepartamentsController::class, 'show']);
Route::get('departaments', [DepartamentsController::class, 'index']);
Route::put('departaments/{id}', [DepartamentsController::class, 'update']);
Route::delete('departaments/{id}', [DepartamentsController::class, 'destroy']);

Route::post('schools',[SchoolsController::class, 'store']);
Route::get('schools/{id}', [SchoolsController::class, 'show']);
Route::get('schools', [SchoolsController::class, 'index']);
Route::put('schools/{id}', [SchoolsController::class, 'update']);
Route::delete('schools/{id}', [SchoolsController::class, 'destroy']);

Route::post('users',[UsersController::class, 'store']);