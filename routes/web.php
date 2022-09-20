<?php

use App\Http\Controllers\AnalyticsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ExaminationReportController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserPatientController;

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
    // Examination Report
    Route::resource('medical-examination-report', ExaminationReportController::class);
});

// ** Route for admin
Route::group(['middleware' => ['auth', 'role:administrator']], function() {
    // Analytics
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');
    // Medicines
    Route::resource('medicine', MedicineController::class);
    // Patients
    Route::resource('patient', PatientController::class);
    Route::get('consult/{user}', [PatientController::class, 'consult'])->name('consult');
    // Users
    Route::resource('users', UserPatientController::class);
    // Examination Report
    // Route::resource('medical-examination-report', ExaminationReportController::class);
    Route::get('examine/{user}', [ExaminationReportController::class, 'examine'])->name('examine');
    // export document
    Route::get('document/export/{user}', [ExaminationReportController::class, 'exportDocument'])->name('export-document');
});


require __DIR__.'/auth.php';
