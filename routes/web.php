<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home-page', [HomeController::class, 'index']);
Route::get('/add-cart', [HomeController::class, 'addCart']);
Route::post('/add', [HomeController::class, 'add']);
Route::get('/edit-cart/{id}', [HomeController::class, 'editCart']);
Route::post('/save', [HomeController::class, 'save']);
Route::get('/delete-product/{id}', [HomeController::class, 'deleteProduct']);

Route::get('dashboard', [HomeController::class, 'dashboard']);
