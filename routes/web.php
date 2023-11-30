<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\AlternativeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index']);

Route::get('/criteria', [CriteriaController::class, 'index']);
Route::get('/criteria/create', [CriteriaController::class, 'create']);


Route::get('/weight', [WeightController::class, 'index']);

Route::get('/table', [TableController::class, 'index']);


Route::get('/alternative', [AlternativeController::class, 'index']);
Route::get('/alternative/create', [AlternativeController::class, 'create']);
Route::post('/alternative', [AlternativeController::class, 'store']);
Route::get('/alternative/{alternative}/edit', [AlternativeController::class, 'edit']);
Route::put('/alternative/{alternative}', [AlternativeController::class, 'update']);
Route::delete('/alternative/{alternative}', [AlternativeController::class, 'destroy']);
Route::get('/alternative/search', [AlternativeController::class, 'search']);

Route::get('/criteria', [CriteriaController::class, 'index']);
Route::get('/criteria/create', [CriteriaController::class, 'create']);
Route::post('/criteria', [CriteriaController::class, 'store']);
Route::get('/criteria/{criteria}/edit', [CriteriaController::class, 'edit']);
Route::put('/criteria/{criteria}', [CriteriaController::class, 'update']);
Route::delete('/criteria/{criteria}', [CriteriaController::class, 'destroy']);
Route::get('/criteria/search', [CriteriaController::class, 'search']);

Route::get('/weight/{id}/edit', [WeightController::class, 'edit']);
Route::put('/weight/{id}', [WeightController::class, 'update']);
Route::get('/weight/search', [WeightController::class, 'search']);
