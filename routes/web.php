<?php

use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\ReturnsController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MaintenanceController;


use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//landing page
Route::get('/',[LandingpageController::class, 'index']);
Route::get('/admin',[LandingpageController::class, 'admin']);

//admin/users
Route::get('/admin/users', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::put('/user/update/{id}', [UserController::class, 'update']);
Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);

//admin customers
Route::get('/admin/customers', [CustomerController::class, 'index']);
Route::post('/admin/store', [CustomerController::class, 'store']);
Route::put('/admin/update/{id}', [CustomerController::class, 'update']);
Route::delete('/admin/delete/{id}', [CustomerController::class, 'destroy']);

//admin vehicle
Route::get('/admin/vehicle', [VehicleController::class, 'index']);
Route::post('/admin/vehicle/store', [VehicleController::class, 'store']);
Route::put('/admin/vehicle/update/{id}', [VehicleController::class, 'update']);
Route::delete('/admin/vehicle/delete/{id}', [VehicleController::class, 'destroy']);

//admin vehicle type
Route::get('/admin/vehicle_types', [VehicleTypeController::class, 'index']);
Route::post('/admin/vehicle_type/store', [VehicleTypeController::class, 'store']);
Route::put('/admin/vehicle_type/update/{id}', [VehicleTypeController::class, 'update']);
Route::delete('/admin/vehicle_type/delete/{id}', [VehicleTypeController::class, 'destroy']);

//admin rentals
Route::get('/admin/rentals', [RentalsController::class, 'index']);
Route::post('/admin/rentals/store', [RentalsController::class, 'store']);
Route::put('/admin/rentals/update/{id}', [RentalsController::class, 'update']);
Route::delete('/admin/rentals/delete/{id}', [RentalsController::class, 'destroy']);

//damin return
Route::get('/admin/returns', [ReturnsController::class, 'index']);
Route::post('/admin/returns/store', [ReturnsController::class, 'store']);
Route::put('/admin/returns/update/{id}', [ReturnsController::class, 'update']);
Route::delete('/admin/returns/delete/{id}', [ReturnsController::class, 'destroy']);

//admin payment
Route::get('/admin/payments', [PaymentController::class, 'index']);
Route::post('/admin/payment/store', [PaymentController::class, 'store']);
Route::put('/admin/payment/update/{id}', [PaymentController::class, 'update']);
Route::delete('/admin/payment/delete/{id}', [PaymentController::class, 'destroy']);

//admin Driver
Route::get('/admin/drivers', [DriverController::class, 'index']);
Route::post('/admin/drivers/store', [DriverController::class, 'store']);
Route::put('/admin/drivers/update/{id}', [DriverController::class, 'update']);
Route::delete('/admin/drivers/delete/{id}', [DriverController::class, 'destroy']);

//admin Maintenance
Route::get('/admin/maintenance', [MaintenanceController::class, 'index']);
Route::post('/admin/maintenance/store', [MaintenanceController::class, 'store']);
Route::put('/admin/maintenance/update/{id}', [MaintenanceController::class, 'update']);
Route::delete('/admin/maintenance/delete/{id}', [MaintenanceController::class, 'destroy']);