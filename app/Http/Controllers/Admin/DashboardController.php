<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Booking;
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'doctorCount' => Doctor::count(),
            'memberCount' => User::where('role', 'member')->count(),
            'articleCount' => Article::count(),
            'bookingCount' => Booking::count(),
            'openConsultationCount' => Consultation::where('status', 'Open')->count(),
            'closedConsultationCount' => Consultation::where('status', 'Closed')->count(),
        ]);
    }
}