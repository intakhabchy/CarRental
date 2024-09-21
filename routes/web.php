<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\ProfileController;
use App\Models\Car;
use App\Models\Rental;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard_admin', function () {
    $carCnt = Car::count();
    $rentalCnt = Rental::where('end_date','>',date('Y-m-d hh:mm:ss'))->count();
    $availableCnt = Car::join('rentals','rentals.car_id','=','cars.id')->where('rentals.end_date','<',date('Y-m-d hh:mm:ss'))->count();
    $totalEarn = Rental::sum('total_cost');

    return view('dashboard_admin',['carCnt'=>$carCnt,'rentalCnt'=>$rentalCnt,'availableCnt'=>$availableCnt,'totalEarn'=>$totalEarn]);
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/carlist',[CarController::class,'index'])->name('admin.carlist');
Route::get('/carcreate',[CarController::class,'create'])->name('admin.carcreate');
Route::post('/carstore',[CarController::class,'store'])->name('admin.carstore');
Route::get('/caredit/{id}',[CarController::class,'edit'])->name('admin.caredit');
Route::put('/carupdate/{id}',[CarController::class,'update'])->name('admin.carupdate');
Route::delete('/cardelete/{id}',[CarController::class,'destroy'])->name('admin.cardelete');

Route::get('/rentallist',[RentalController::class,'index'])->name('admin.rentallist');
Route::get('/rentalview/{id}',[RentalController::class,'show'])->name('admin.rentalview');
Route::get('/rentalcreate',[RentalController::class,'create'])->name('admin.rentalcreate');
Route::post('/rentalstore',[RentalController::class,'store'])->name('admin.rentalstore');
Route::get('/rentaledit/{id}',[RentalController::class,'edit'])->name('admin.rentaledit');
Route::put('/rentalupdate/{id}',[RentalController::class,'update'])->name('admin.rentalupdate');
Route::delete('/rentaldelete/{id}',[RentalController::class,'destroy'])->name('admin.rentaldelete');

Route::get('/customerlist',[CustomerController::class,'index'])->name('admin.customerlist');
Route::get('/customerview/{id}',[CustomerController::class,'show'])->name('admin.customerview');
Route::get('/customercreate',[CustomerController::class,'create'])->name('admin.customercreate');
Route::post('/customerstore',[CustomerController::class,'store'])->name('admin.customerstore');
Route::get('/customeredit/{id}',[CustomerController::class,'edit'])->name('admin.customeredit');
Route::put('/customerupdate/{id}',[CustomerController::class,'update'])->name('admin.customerupdate');
Route::delete('/customerdelete/{id}',[CustomerController::class,'destroy'])->name('admin.customerdelete');



Route::get('/customerlist',[CustomerController::class,'index'])->name('admin.customerlist');

require __DIR__.'/auth.php';
