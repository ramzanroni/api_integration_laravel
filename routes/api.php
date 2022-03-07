<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;
use App\Http\Controllers\EmployeeController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("data", [apiController::class, 'getData']);

Route::get("users", [EmployeeController::class, 'list']);
Route::get("users/{id}", [EmployeeController::class, 'serarchByID']);

Route::post("addEmployee", [EmployeeController::class, 'addEmployee']);
Route::put("updateEmployee", [EmployeeController::class, 'updateEmployee']);
Route::post("searchEmployee", [EmployeeController::class, 'searchEmployee']);
Route::post("loginCheck", [EmployeeController::class, 'loginCheck']);
Route::get("deleteEmployee/{id}", [EmployeeController::class, 'deleteEmployee']);

