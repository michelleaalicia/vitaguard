<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreConsultationRequest;
use App\Http\Requests\UpdateConsultationRequest;
use App\Models\Booking;
use App\Models\Consultation;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::with([
            'booking.member',
            'booking.doctor.user'
        ])
            ->latest()
            ->paginate(10);

        return view('admin.consultations.index', compact('consultations'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {
        $consultation->load([
            'booking.member',
            'booking.doctor.user',
            'messages.sender'
        ]);

        return view(
            'admin.consultations.show',
            compact('consultation')
        );
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation)
    {
        $bookings = Booking::with([
            'member',
            'doctor.user'
        ])->get();

        return view('admin.consultations.edit', compact(
            'consultation',
            'bookings'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsultationRequest $request, Consultation $consultation)
    {
        $consultation->update([
            'booking_id' => $request->booking_id,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.consultations.index')
            ->with('success', 'Consultation updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();

        return redirect()
            ->route('admin.consultations.index')
            ->with('success', 'Consultation deleted successfully.');
    }
}
