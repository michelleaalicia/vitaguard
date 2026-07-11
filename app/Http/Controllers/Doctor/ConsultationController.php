<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;

class ConsultationController extends Controller
{
    public function index()
    {
        $doctorId = Auth::user()->doctor->id;

        $consultations = Consultation::with([
            'booking.member',
            'booking.doctor.user'
        ])
            ->whereHas('booking', function ($q) use ($doctorId) {
                $q->where('doctor_id', $doctorId);
            })
            ->latest()
            ->paginate(10);

        return view('doctor.consultations.index', compact('consultations'));
    }

    public function show(Consultation $consultation)
    {
        $user = Auth::user();

        $doctor = Doctor::where('user_id', $user->id)->firstOrFail();

        abort_unless(
            $consultation->booking->doctor_id == $doctor->id,
            403
        );

        $consultation->load([
            'booking.member',
            'messages.sender'
        ]);

        return view(
            'doctor.consultations.show',
            compact('consultation')
        );
    }
    public function close(Consultation $consultation)
    {
        $user = Auth::user();

        abort_unless(
            $consultation->booking->doctor->user_id == $user->id,
            403
        );

        $consultation->update([
            'status' => 'Closed',
        ]);

        return redirect()
            ->route('doctor.consultations.show', $consultation)
            ->with('success', 'Consultation closed successfully.');
    }

    public function history()
    {
        $doctor = Doctor::where('user_id', Auth::id())->firstOrFail();

        $consultations = Consultation::with([
            'booking.member'
        ])
            ->whereHas('booking', function ($query) use ($doctor) {

                $query->where('doctor_id', $doctor->id);
            })
            ->where('status', 'Closed')
            ->latest()
            ->paginate(10);

        return view(
            'doctor.history.index',
            compact('consultations')
        );
    }
}
