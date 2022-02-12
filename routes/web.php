<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleController;

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

// first page registration
Route::get('/', function () {
    return view('pages.register');
});

// Route::group([
//     'middleware' => 'web',
// ], function ($router) {
    Route::post('/signup', [AuthController::class, 'register'])->name('signup');
    Route::get('registration', [AuthController::class, 'registration'])->name('registration');
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('/signin', [AuthController::class, 'login'])->name('signin');
    Route::get('/user', [AuthController::class, 'user']);
    Route::get('create', [VehicleController::class, 'create'])->name('create');
    Route::get('user/list', [VehicleController::class, 'user_vehicles'])->name('user_vehicles_list');


Route::group([
    'middleware' => 'is_connect',
    'prefix' => 'vehicle'
], function ($router) {
    Route::post('store', [VehicleController::class, 'store'])->name('store');
    Route::get('edit/{id}', [VehicleController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [VehicleController::class, 'update'])->name('update');
    Route::post('delete/{id}', [VehicleController::class, 'destroy'])->name('delete');
    Route::get('list', [VehicleController::class, 'list_vehicles'])->name('list');
    Route::get('signout', [AuthController::class, 'signout'])->name('signout');
});


