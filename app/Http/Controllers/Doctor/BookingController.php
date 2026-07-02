<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $doctorId = Auth::user()->doctor->id;

        $bookings = Booking::with('member')
            ->where('doctor_id', $doctorId)
            ->latest()
            ->paginate(10);

        return view('doctor.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        abort_unless($booking->doctor_id == Auth::user()->doctor->id, 403);

        return view('doctor.bookings.show', compact('booking'));
    }
}