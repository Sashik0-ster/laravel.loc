<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogOutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\GoalController;
//use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.index');
});


//Route::get('/', [HomeController::class, 'index'])->name('home');


//* Rout Sidebar *//
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('income', [IncomeController::class, 'index'])->name('income');
Route::get('expenses', [ExpensesController::class, 'index'])->name('expenses');
Route::get('saving', [SavingController::class, 'index'])->name('saving');
Route::get('goal', [GoalController::class, 'index'])->name('goal');

//** Registration  *//
Route::get('registration', [RegistrationController::class, 'index'])->name('registration');
Route::post('registration', [RegistrationController::class, 'store'])->name('registration.store');


//** Login  *//

Route::get('login', [LoginController::class, 'index'])->name('login');


//** LogOut  *//

Route::get('logout', [LogOutController::class, 'index'])->name('logout');
