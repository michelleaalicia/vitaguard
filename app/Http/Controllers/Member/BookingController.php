<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemberBookingRequest;
use App\Models\Booking;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('doctor.user')
            ->where('member_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('member.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $doctors = Doctor::with('user')->get();

        $selectedDoctor = request('doctor');

        return view(
            'member.bookings.create',
            compact('doctors', 'selectedDoctor')
        );
    }

    public function store(StoreMemberBookingRequest $request)
    {
        Booking::create([
            'member_id' => Auth::id(),
            'doctor_id' => $request->doctor_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status' => 'Pending',
        ]);

        return redirect()
            ->route('member.bookings.index')
            ->with('success', 'Booking created successfully.');
    }
}