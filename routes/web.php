<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/welcome', function () {
    return view('welcome', ['name' => 'Aniket Shinde']);
});

// Route::get('/user', [UserController::class, 'index']);

Route::resource('users', UserController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('companies', CompanyController::class);

Route::match(['GET', 'POST'], 'login',  [AuthController::class, 'index']);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
