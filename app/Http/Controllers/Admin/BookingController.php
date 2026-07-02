<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Consultation;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with(['member', 'doctor.user'])
            ->latest()
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = User::where('role', 'member')
            ->orderBy('name')
            ->get();

        $doctors = Doctor::with('user')
            ->orderBy('specialization')
            ->get();

        return view('admin.bookings.create', compact('members', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        Booking::create([
            'member_id' => $request->member_id,
            'doctor_id' => $request->doctor_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.bookings.index')
            ->with('success', 'Booking added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        $members = User::where('role', 'member')
            ->orderBy('name')
            ->get();

        $doctors = Doctor::with('user')
            ->orderBy('specialization')
            ->get();

        return view('admin.bookings.edit', compact(
            'booking',
            'members',
            'doctors'
        ));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $booking->update([
            'member_id' => $request->member_id,
            'doctor_id' => $request->doctor_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'status' => $request->status,
        ]);
        if (
            $request->status == 'Approved' &&
            !$booking->consultation
        ) {
            Consultation::create([
                'booking_id' => $booking->id,
                'status' => 'Open',
            ]);
        }
        return redirect()
            ->route('admin.bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()
            ->route('admin.bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
}
