<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\RegisterController;
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
    return view('auth.login');
})->name('login');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');

Route::post('/employers/home', [EmployerController::class, 'index'])->name('home');
Route::get('/employers/create', [EmployerController::class, 'create'])->name('employers.create');
Route::post('/employers/store', [EmployerController::class, 'store'])->name('employers.store');
Route::post('/employers/home', [EmployerController::class, 'show'])->name('employers.show');

// Route::middleware(['auth'])->group(function () {
//     //Route::resource('employers', EmployerController::class);
//     Route::put('employers/{employer}/check-in', [EmployerController::class, 'checkIn'])->name('employers.check-in');
//     Route::put('employers/{employer}/check-out', [EmployerController::class, 'checkOut'])->name('employers.check-out');
//     Route::post('/index', [EmployerController::class, 'index'])->name('employers.index');
// });