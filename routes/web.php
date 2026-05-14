<?php

use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\ReturnsController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\PaymentController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//landing page
Route::get('/',[LandingpageController::class, 'index']);
Route::get('/admin',[LandingpageController::class, 'admin']);

//users
Route::get('/admin/users', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::put('/user/update/{id}', [UserController::class, 'update']);
Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);

//customers
Route::get('/admin/customers', [CustomerController::class, 'index']);
Route::post('/customer/store', [CustomerController::class, 'store']);
Route::put('/customer/update/{id}', [CustomerController::class, 'update']);
Route::delete('/customer/delete/{id}', [CustomerController::class, 'destroy']);

//vehicle
Route::get('/admin/vehicle', [VehicleController::class, 'index']);
Route::post('/vehicle/store', [VehicleController::class, 'store']);
Route::put('/vehicle/update/{id}', [VehicleController::class, 'update']);
Route::delete('/vehicle/delete/{id}', [VehicleController::class, 'destroy']);

//vehicle type
Route::get('/admin/vehicle_types', [VehicleTypeController::class, 'index']);
Route::post('/vehicle_type/store', [VehicleTypeController::class, 'store']);
Route::put('/vehicle_type/update/{id}', [VehicleTypeController::class, 'update']);
Route::delete('/vehicle_type/delete/{id}', [VehicleTypeController::class, 'destroy']);

//rentals
Route::get('/admin/rentals', [RentalsController::class, 'index']);
Route::post('/rentals/store', [RentalsController::class, 'store']);
Route::put('/rentals/update/{id}', [RentalsController::class, 'update']);
Route::delete('/rentals/delete/{id}', [RentalsController::class, 'destroy']);

//return
Route::get('/admin/returns', [ReturnsController::class, 'index']);
Route::post('/returns/store', [ReturnsController::class, 'store']);
Route::put('/returns/update/{id}', [ReturnsController::class, 'update']);
Route::delete('/returns/delete/{id}', [ReturnsController::class, 'destroy']);

//payment
Route::get('/admin/payments', [PaymentController::class, 'index']);
Route::post('/payment/store', [PaymentController::class, 'store']);
Route::put('/payment/update/{id}', [PaymentController::class, 'update']);
Route::delete('/payment/delete/{id}', [PaymentController::class, 'destroy']);