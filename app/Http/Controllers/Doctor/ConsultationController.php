<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Support\Facades\Auth;

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
        abort_unless(
            $consultation->booking->doctor_id == auth()->user()->doctor->id,
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
}