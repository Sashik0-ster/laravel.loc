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


Route::middleware(['auth'])->group(function () {

//* Rout Sidebar *//
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('income', [IncomeController::class, 'index'])->name('income');
    Route::get('expenses', [ExpensesController::class, 'index'])->name('expenses');
    Route::get('saving', [SavingController::class, 'index'])->name('saving');
    Route::get('goal', [GoalController::class, 'index'])->name('goal');

//*Insert Incomes *//
    Route::post('create', [IncomeController::class, 'create'])->name('incomes.create');
    Route::delete('/incomes/{income}', [IncomeController::class, 'destroy'])->name('incomes.destroy');

//*Insert Goals *//
    Route::post('create', [GoalController::class, 'create'])->name('goals.create');

//** LogOut  *//
    Route::get('logout', [LogOutController::class, 'logout'])->name('logout');

});


Route::middleware(['guest'])->group(function () {

    //** Login  *//
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('login', [LoginController::class, 'login'])->name('login');

    //** Registration  *//
    Route::get('registration', [RegistrationController::class, 'showRegistrationForm'])->name('registration');
    Route::post('registration', [RegistrationController::class, 'registration'])->name('registration.store');
});
