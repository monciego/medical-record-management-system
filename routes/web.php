<?php

use App\Http\Controllers\AnalyticsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicineController;

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

// Login route
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

// ** Route for both (admin and user)
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// ** Route for admin
Route::group(['middleware' => ['auth', 'role:administrator']], function() {
    // Analytics
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');
    // Medicines
    Route::get('/medicine', [MedicineController::class, 'index'])->name('medicine');
    Route::post('/medicine-create', [MedicineController::class, 'store'])->name('medicine-create');
    Route::delete('/medicine/{medicine}', [MedicineController::class, 'destroy'])
    ;
});


require __DIR__.'/auth.php';
