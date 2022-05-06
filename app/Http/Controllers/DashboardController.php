<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->hasRole('administrator')) {
            return view('pages.admin.dashboard.index');
        } elseif (Auth::user()->hasRole('superadministrator')) {
            return view('pages.superadmin.dashboard');
        }
    }
}
