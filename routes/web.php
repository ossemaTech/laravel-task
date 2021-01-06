<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route;

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
/*
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
*/
Route::group(['prefix' => 'auth', 'middleware' => 'api'], function () {
    Route::post('register', [AuthController::class, 'register']);//ckeck
    Route::post('login', [AuthController::class, 'login']);//ckeck
    Route::post('refresh', [AuthController::class, 'refresh']);//ckeck
    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('logout', [AuthController::class, 'logout']);//check
});

Route::group(['prefix' => 'users', 'middleware' => ['api', 'admin']], function () {
    Route::get('/', [Users::class, 'index']);//ckeck
    Route::delete('delete/{id}', [Users::class, 'delete']);//ckeck
});