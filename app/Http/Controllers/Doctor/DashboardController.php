<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Consultation;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $doctorId = Auth::user()->doctor->id;

        $todayBookings = Booking::where('doctor_id', $doctorId)
            ->whereDate('booking_date', today())
            ->count();

        $pendingBookings = Booking::where('doctor_id', $doctorId)
            ->where('status', 'Pending')
            ->count();

        $openConsultations = Consultation::whereHas('booking', function ($q) use ($doctorId) {
            $q->where('doctor_id', $doctorId);
        })->where('status', 'Open')->count();

        return view('doctor.dashboard', compact(
            'todayBookings',
            'pendingBookings',
            'openConsultations'
        ));
    }
}