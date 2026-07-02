<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with([
            'booking.doctor.user'
        ])
            ->whereHas('booking', function ($query) {
                $query->where('member_id', Auth::id());
            })
            ->latest()
            ->paginate(10);

        return view(
            'member.consultations.index',
            compact('consultations')
        );
    }

    public function show(Consultation $consultation)
    {
        abort_unless(
            $consultation->booking->member_id == Auth::id(),
            403
        );

        $consultation->load([
            'booking.doctor.user',
            'messages.sender'
        ]);

        return view(
            'member.consultations.show',
            compact('consultation')
        );
    }
}