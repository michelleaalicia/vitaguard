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
        $doctor = Doctor::findOrFail($request->doctor_id);

        $bookingDay = date('l', strtotime($request->booking_date));

        $availableDays = explode(',', $doctor->available_days);

        if (!in_array($bookingDay, $availableDays)) {

            return back()
                ->withInput()
                ->withErrors([
                    'booking_date' => 'The selected doctor is not available on this day.'
                ]);
        }

        $bookingTime = strtotime($request->booking_time);

        $start = strtotime($doctor->available_start);

        $end = strtotime($doctor->available_end);

        if ($bookingTime < $start || $bookingTime > $end) {

            return back()
                ->withInput()
                ->withErrors([
                    'booking_time' => 'The selected time is outside the doctor\'s practice hours.'
                ]);
        }

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
