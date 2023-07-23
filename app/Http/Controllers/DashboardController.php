<?php

namespace App\Http\Controllers;

use App\Models\ExaminationReport;
use App\Models\Patient;
use App\Models\UserPatient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->hasRole('administrator')) {
            $teaching_staffs_count = Patient::with('user_data')->filter(request(['clinic']))->whereHas('user_data', function ($query) {
                return $query->where('user_patient_role', '=', 'teaching_staff');
            })->count();
            $students_count = Patient::with('user_data')->filter(request(['clinic']))->whereHas('user_data', function ($query) {
                return $query->where('user_patient_role', '=', 'student');
            })->count();
            $non_teaching_staffs_count = Patient::with('user_data')->filter(request(['clinic']))->whereHas('user_data', function ($query) {
                return $query->where('user_patient_role', '=', 'non_teaching_staff');
            })->count();
            return view('pages.admin.dashboard.index', compact('teaching_staffs_count',
                 'non_teaching_staffs_count', 'students_count'));
        } elseif (Auth::user()->hasRole('superadministrator')) {
            $january = Patient::whereMonth('patient_consult_date', '1')->count();
            $february = Patient::whereMonth('patient_consult_date', '2')->count();
            $march = Patient::whereMonth('patient_consult_date', '3')->count();
            $april = Patient::whereMonth('patient_consult_date', '4')->count();
            $may = Patient::whereMonth('patient_consult_date', '5')->count();
            $june = Patient::whereMonth('patient_consult_date', '6')->count();
            $july = Patient::whereMonth('patient_consult_date', '7')->count();
            $august = Patient::whereMonth('patient_consult_date', '8')->count();
            $september = Patient::whereMonth('patient_consult_date', '9')->count();
            $october = Patient::whereMonth('patient_consult_date', '10')->count();
            $november = Patient::whereMonth('patient_consult_date', '11')->count();
            $december = Patient::whereMonth('patient_consult_date', '12')->count();
            // number of patient in medical and dental
            $medicalCount = Patient::where('clinic', 'medical')->count();
            $dentalCount = Patient::where('clinic', 'dental')->count();
            // number of patient requested examination report ()
            $examinationReportPreEmployment =  ExaminationReport::where('pre_employment', 1)->count();
            $examinationReportAnnual =  ExaminationReport::where('annual', 1)->count();
            $examinationReportOJT =  ExaminationReport::where('ojt', 1)->count();

            return view('pages.superadmin.dashboard', compact(
                'january', 'february', 'march', 'april', 'may', 'june', 'july',
                'august','september','october', 'november','december', 'medicalCount',
                'dentalCount', 'examinationReportPreEmployment', 'examinationReportAnnual',
                'examinationReportOJT'
            ));
        } elseif (Auth::user()->hasRole('nurse')) {
            $teaching_staffs_count = UserPatient::where('user_patient_role', 'teaching_staff')->count();
            $non_teaching_staffs_count = UserPatient::where('user_patient_role', 'non_teaching_staff')->count();
            $students_count = UserPatient::where('user_patient_role', 'student')->count();
            return view('pages.admin.dashboard.index', compact('teaching_staffs_count',
                 'non_teaching_staffs_count', 'students_count'));
        };
    }
}
