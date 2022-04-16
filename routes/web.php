<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotaFakturController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::get('/', function () {
    return view('auth.login');
});
// Route::post('/products/create',[ProductController::class,'store']);
Route::post('auth/login',[UsersController::class, 'login']);
Route::get('users/profile',[UsersController::class, 'profile']);
Route::get('users/block',[UsersController::class, 'blockUser']);

// Route::get('/hi',[LoginController::class, 'login'])->name('login');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Customer
    Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer');
    Route::get('/kunjungan', [App\Http\Controllers\KunjunganController::class, 'index'])->name('kunjungan');
    Route::get('/nota', [App\Http\Controllers\NotaFakturController::class, 'index'])->name('nota');
    // Route::post('/customer/add',[CustomerController::class,'create']);
    // Route::resources('customer',CustomerController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('kunjungan', KunjunganController::class);
    Route::resource('nota', NotaFakturController::class)->parameters(['nota' => 'id']);

});

