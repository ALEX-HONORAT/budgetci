<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\DashboardController;


/*

| Routes Publiques

*/

Route::get('/', function () {
    return redirect()->route('login');
});

/*

| Routes Authentifiées
*/

Route::middleware('auth')->group(function () {
    
    // Dashboard
   
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');
    
    // Onboarding (création profil BudgetCI)
    Route::get('/onboarding', [OnboardingController::class, 'create'])->name('onboarding.create');
    Route::post('/onboarding', [OnboardingController::class, 'store'])->name('onboarding.store');
    
    // Profil utilisateur (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Revenus
    Route::get('/incomes/create', [IncomeController::class, 'create'])->name('incomes.create');
    Route::post('/incomes', [IncomeController::class, 'store'])->name('incomes.store');
    Route::delete('/incomes/month', [IncomeController::class, 'destroyMonth'])->name('incomes.destroyMonth');
    
    // Dépenses
    Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::delete('/expenses/month', [ExpenseController::class, 'destroyMonth'])->name('expenses.destroyMonth');
    Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
    

   // Route pour supprimer un mois complet ou tous les mois
   Route::delete('/dashboard/month/delete', [DashboardController::class, 'destroyMonthComplete'])->name('dashboard.month.delete');
});

/*

| Auth Routes (Breeze)

*/

require __DIR__.'/auth.php';
