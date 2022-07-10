<?php

namespace App\Http\Controllers;

use App\Models\UserPatient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->hasRole('administrator')) {
            $teaching_staffs_count = UserPatient::where('user_patient_role', 'teaching_staff')->count();
            $non_teaching_staffs_count = UserPatient::where('user_patient_role', 'non_teaching_staff')->count();
            $students_count = UserPatient::where('user_patient_role', 'student')->count();
            return view('pages.admin.dashboard.index', compact('teaching_staffs_count',
                 'non_teaching_staffs_count', 'students_count'));
        } elseif (Auth::user()->hasRole('superadministrator')) {
            return view('pages.superadmin.dashboard');
        }
    }
}
