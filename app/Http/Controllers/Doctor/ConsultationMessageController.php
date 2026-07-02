<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\ConsultationMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationMessageController extends Controller
{
    public function store(Request $request, Consultation $consultation)
    {
        $request->validate([
            'message' => 'required'
        ]);

        ConsultationMessage::create([
            'consultation_id' => $consultation->id,
            'sender_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return back();
    }
}