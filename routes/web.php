<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeightController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\AlternativeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/auth/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/auth/login', [AuthController::class, 'authenticate']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::get('/auth/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/auth/register', [AuthController::class, 'store']);



Route::get('/weight', [WeightController::class, 'index'])->middleware('auth');;

Route::get('/table', [TableController::class, 'index'])->middleware('auth');;


Route::get('/alternative', [AlternativeController::class, 'index'])->middleware('auth');;
Route::get('/alternative/create', [AlternativeController::class, 'create'])->middleware('auth');;
Route::post('/alternative', [AlternativeController::class, 'store'])->middleware('auth');;
Route::get('/alternative/{alternative}/edit', [AlternativeController::class, 'edit'])->middleware('auth');;
Route::put('/alternative/{alternative}', [AlternativeController::class, 'update'])->middleware('auth');;
Route::delete('/alternative/{alternative}', [AlternativeController::class, 'destroy'])->middleware('auth');;
Route::get('/alternative/search', [AlternativeController::class, 'search'])->middleware('auth');;

Route::get('/criteria', [CriteriaController::class, 'index'])->middleware('auth');;
Route::get('/criteria/create', [CriteriaController::class, 'create'])->middleware('auth');;
Route::post('/criteria', [CriteriaController::class, 'store'])->middleware('auth');;
Route::get('/criteria/{criteria}/edit', [CriteriaController::class, 'edit'])->middleware('auth');;
Route::put('/criteria/{criteria}', [CriteriaController::class, 'update'])->middleware('auth');;
Route::delete('/criteria/{criteria}', [CriteriaController::class, 'destroy'])->middleware('auth');;
Route::get('/criteria/search', [CriteriaController::class, 'search'])->middleware('auth');;

Route::get('/weight/{id}/edit', [WeightController::class, 'edit'])->middleware('auth');;
Route::put('/weight/{id}', [WeightController::class, 'update'])->middleware('auth');;
Route::get('/weight/search', [WeightController::class, 'search'])->middleware('auth');;
