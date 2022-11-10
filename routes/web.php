<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DailyRecordReport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ExaminationReportController;
use App\Http\Controllers\ExportDailyRecordController;
use App\Http\Controllers\ExportMedicalRecordController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MedicineRecordController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\TreatmentRecordController;
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
    Route::resource('change-password', ChangePasswordController::class);
    Route::post('/password/update', [ChangePasswordController::class, 'changePassword'])
    ->name('change.password');
     // export document
    Route::get('document/export/{user}', [ExaminationReportController::class, 'exportDocument'])->name('export-document');
});

// ** Route for admin
Route::group(['middleware' => ['auth', 'role:administrator']], function() {
    // Analytics
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');
    // Medicines
    Route::resource('medicine', MedicineController::class);
    Route::resource('medicine-record', MedicineRecordController::class);
      Route::get('document/export-medical-record', [ExportMedicalRecordController::class, 'medicalReport'])->name('export.medical-report');
    // Patients
    Route::resource('patient', PatientController::class);
    Route::get('consult/{user}', [PatientController::class, 'consult'])->name('consult');
    // Users
    Route::resource('users', UserPatientController::class);
    // Examination Report
    // Route::resource('medical-examination-report', ExaminationReportController::class);
    Route::get('examine/{user}', [ExaminationReportController::class, 'examine'])->name('examine');
    // treatment records
    Route::resource('treatment-records', TreatmentRecordController::class);
    // treatment records
    Route::resource('school-year', SchoolYearController::class);
    // daily record report
    Route::resource('report', DailyRecordReport::class)->only(['index']);
    Route::get('/report/students', [DailyRecordReport::class, 'students'])->name('report.students');
    Route::get('/report/teaching-staffs', [DailyRecordReport::class, 'teaching'])->name('report.teaching');
    Route::get('/report/non-teaching-staffs', [DailyRecordReport::class, 'non_teaching'])->name('report.non_teaching');
    // exporting daily record
    // students
    Route::get('document/export-students-first-sem/{id}', [ExportDailyRecordController::class, 'exportStudentsFirstSem'])->name('export.students-first-sem');
    Route::get('document/export-students-second-sem/{id}', [ExportDailyRecordController::class, 'exportStudentsSecondSem'])->name('export.students-second-sem');
    Route::get('document/export-students-summer/{id}', [ExportDailyRecordController::class, 'exportStudentsSummer'])->name('export.students-summer');
    // teaching
    Route::get('document/export-teaching-first-sem/{id}', [ExportDailyRecordController::class, 'exportTeachingFirstSem'])->name('export.teaching-first-sem');
    Route::get('document/export-teaching-second-sem/{id}', [ExportDailyRecordController::class, 'exportTeachingSecondSem'])->name('export.teaching-second-sem');
    Route::get('document/export-teaching-summer/{id}', [ExportDailyRecordController::class, 'exportTeachingSummer'])->name('export.teaching-summer');
    // non teaching
    Route::get('document/export-non-teaching-first-sem/{id}', [ExportDailyRecordController::class, 'exportNonTeachingFirstSem'])->name('export.non-teaching-first-sem');
    Route::get('document/export-non-teaching-second-sem/{id}', [ExportDailyRecordController::class, 'exportNonTeachingSecondSem'])->name('export.non-teaching-second-sem');
    Route::get('document/export-non-teaching-summer/{id}', [ExportDailyRecordController::class, 'exportNonTeachingSummer'])->name('export.non-teaching-summer');
});


// Fallback Route
Route::fallback(FallbackController::class);

require __DIR__.'/auth.php';
