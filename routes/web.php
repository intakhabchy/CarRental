<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RentalController as FrontendRentalController;
use App\Http\Controllers\ProfileController;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Support\Facades\File;
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
})->middleware(['auth', 'verified','checkrole:customer'])->name('customer.dashboard');

Route::get('/dashboard_admin', function () {
    $carCnt = Car::count();
    $rentalCnt = Rental::where('end_date','>',date('Y-m-d hh:mm:ss'))
    ->where('cancel_status','=','0')->count();
    
    $availableCnt = Car::whereNotIn('id', function ($query) {
        $query->select('car_id')
              ->from('rentals')
              ->where('cancel_status', '=', '0')
              ->whereDate('start_date', '<=', date(now()))
              ->whereDate('end_date', '>=', date(now()));
    })->count();
    
    $totalEarn = Rental::sum('total_cost');

    return view('dashboard_admin',['carCnt'=>$carCnt,'rentalCnt'=>$rentalCnt,'availableCnt'=>$availableCnt,'totalEarn'=>$totalEarn]);
})->middleware(['auth', 'verified','checkrole:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/carlist/admin',[CarController::class,'index'])->name('admin.carlist')->middleware('auth','checkrole:admin');
Route::get('/carcreate',[CarController::class,'create'])->name('admin.carcreate')->middleware('auth','checkrole:admin');
Route::post('/carstore',[CarController::class,'store'])->name('admin.carstore')->middleware('auth','checkrole:admin');Route::get('/caredit/{id}',[CarController::class,'edit'])->name('admin.caredit');
Route::put('/carupdate/{id}',[CarController::class,'update'])->name('admin.carupdate')->middleware('auth','checkrole:admin');
Route::delete('/cardelete/{id}',[CarController::class,'destroy'])->name('admin.cardelete')->middleware('auth','checkrole:admin');

Route::get('/rentallist',[RentalController::class,'index'])->name('admin.rentallist')->middleware('auth','checkrole:admin');
Route::get('/rentalview/{id}',[RentalController::class,'show'])->name('admin.rentalview')->middleware('auth','checkrole:admin');
Route::get('/rentalcreate',[RentalController::class,'create'])->name('admin.rentalcreate')->middleware('auth','checkrole:admin');
Route::post('/rentalstore',[RentalController::class,'store'])->name('admin.rentalstore')->middleware('auth','checkrole:admin');
Route::get('/rentaledit/{id}',[RentalController::class,'edit'])->name('admin.rentaledit')->middleware('auth','checkrole:admin');
Route::put('/rentalupdate/{id}',[RentalController::class,'update'])->name('admin.rentalupdate')->middleware('auth','checkrole:admin');
Route::delete('/rentaldelete/{id}',[RentalController::class,'destroy'])->name('admin.rentaldelete')->middleware('auth','checkrole:admin');

Route::get('/customerlist',[CustomerController::class,'index'])->name('admin.customerlist')->middleware('auth','checkrole:admin');
Route::get('/customerview/{id}',[CustomerController::class,'show'])->name('admin.customerview')->middleware('auth','checkrole:admin');
Route::get('/customercreate',[CustomerController::class,'create'])->name('admin.customercreate')->middleware('auth','checkrole:admin');
Route::post('/customerstore',[CustomerController::class,'store'])->name('admin.customerstore')->middleware('auth','checkrole:admin');
Route::get('/customeredit/{id}',[CustomerController::class,'edit'])->name('admin.customeredit')->middleware('auth','checkrole:admin');
Route::put('/customerupdate/{id}',[CustomerController::class,'update'])->name('admin.customerupdate')->middleware('auth','checkrole:admin');
Route::delete('/customerdelete/{id}',[CustomerController::class,'destroy'])->name('admin.customerdelete')->middleware('auth','checkrole:admin');

Route::get('/carlist',[FrontendCarController::class,'index'])->name('customer.carlist')->middleware('auth','checkrole:customer');

Route::get('/bookinglist',[FrontendRentalController::class,'index'])->name('customer.bookinglist')->middleware('auth','checkrole:customer');
Route::get('/bookingcreate',[FrontendRentalController::class,'create'])->name('customer.bookingcreate')->middleware('auth','checkrole:customer');
Route::post('/bookingstore',[FrontendRentalController::class,'store'])->name('customer.bookingstore')->middleware('auth','checkrole:customer');
Route::delete('/bookingcancel/{id}',[FrontendRentalController::class,'destroy'])->name('customer.bookingcancel')->middleware('auth','checkrole:customer');

Route::get('/aboutus',[PageController::class,'index'])->name('customer.aboutus')->middleware('auth','checkrole:customer');

require __DIR__.'/auth.php';

Route::get('/readme', function () {
    $readme = File::get(base_path('README.md'));
    return nl2br($readme);  // Basic line break conversion
});