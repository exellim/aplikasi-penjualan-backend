<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\KunjunganController;
use App\Http\Controllers\API\ProdukController;
use App\Http\Controllers\AuthController as ControllersAuthController;
use App\Http\Controllers\API\NotaFakturController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//API route for register new user
Route::post('/register', [AuthController::class, 'register']);

//API route for login user
Route::post('/login', [AuthController::class, 'login']);


//Protecting Routes

Route::group(['middleware' => ['auth:sanctum']], function () {

    // get user data
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    Route::resource('programs', ProgramController::class);

    // Api Route for Nota faktur
    Route::get('nota',[NotaFakturController::class,'index']); // get all nota
    Route::post('nota/add',[NotaFakturController::class,'store']); //add nota

    // Api Route for Customer
    Route::post('customer/add', [CustomerController::class,'store']); //add Customer
    Route::get('customer', [CustomerController::class,'index']); //get all Customer
    Route::get('customer/{nama}', [CustomerController::class,'search']); //get all Customer

    // Api Route for kunjungan
    Route::post('kunjungan/add', [KunjunganController::class,'store']); //add kunjungan
    Route::get('kunjungan/', [KunjunganController::class,'index']); //get all kunjungan


    // Api Route for Produk
    Route::get('produk', [ProdukController::class,'index']);
    Route::post('produk/add', [ProdukController::class,'store']);
    Route::post('produk/{id}', [ProdukController::class,'search']);

    // API route for logout user
    Route::post('/logout', [AuthController::class, 'logout']);
});
