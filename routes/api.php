<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
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

//End points 
Route::get('students', [ApiController::class, 'getAllStudent']);
Route::get('students/{id}', [ApiController::class, 'getStudent']);
Route::post('students', [ApiController::class, 'createStudent']);
// Route::post('students', 'ApiController@createStudent');
Route::put('students/{id}', [ApiController::class, 'updateStudent']);
Route::delete('students/{id}', [ApiController::class, 'deleteStudent']);
