<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeController;

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


Route::get('employes', [App\Http\Controllers\Api\EmployeController::class, 'getAllEmployes']);
Route::post('employes', [App\Http\Controllers\Api\EmployeController::class, 'CreateEmploye']);
Route::put('employes/{id}', [App\Http\Controllers\Api\EmployeController::class, 'updateEmploye']);
Route::delete('employes/{id}', [App\Http\Controllers\Api\EmployeController::class, 'deleteEmploye']);
