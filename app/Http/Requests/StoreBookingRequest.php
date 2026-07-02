<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'member_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:doctors,id',

            'booking_date' => 'required|date',

            'booking_time' => 'required|date_format:H:i',

            'status' => 'required|in:Pending,Approved,Completed,Cancelled',

            'notes' => 'nullable|max:500',
        ];
    }
}