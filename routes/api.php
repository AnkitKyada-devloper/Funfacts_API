<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\FunfactsController;
use App\Http\Controllers\Funfacts_responseController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/getData', [QuestionsController::class, 'getData']);
Route::post('/addDetails', [FunfactsController::class, 'add']);
Route::post('/addResponse/{id}', [Funfacts_responseController::class, 'addAnswer']);