<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BoothManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\HomeController;
use App\Models\User;


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


Route::get('/', [HomeController::class, 'index']);
Route::get('/cara_pemesanan', function () {
    return view('howToOrderPage');
}); 

//Authentication Routes
Route::get('authPage', [AuthController::class,'index'])->name('login');
Route::get('register', [AuthController::class,'register'])->name('register');
Route::get('logout', [AuthController::class,'logout'])->name('logout');
Route::post('proses_login', [AuthController::class,'proses_login'])->name('proses_login'); 
Route::post('proses_register', [AuthController::class,'proses_register'])->name('proses_register'); 


// Middleware Login
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('booth-management', BoothManagementController::class);
        Route::resource('user-management', UserManagementController::class, ['parameters' => [
            'user-management' => 'user'
        ]]);
    });
    Route::group(['middleware' => ['cek_login:user']], function () {
        Route::resource('userPage', UserController::class);
    });
});

// pesan Booth 
Route::get('/pesan_booth', [OrderController::class,'index'])->name('orderPage');