<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',

            'specialization' => 'required',

            'phone' => 'required|max:20',

            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'description' => 'nullable',

            'available_days' => 'required|array',

            'available_days.*' => 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'available_start' => 'required|date_format:H:i',
            'available_end' => 'required|date_format:H:i|after:available_start',
        ];
    }
    public function messages(): array
    {
        return [
            'available_days.required' => 'Please select at least one available day.',
            'available_start.required' => 'Start time is required.',
            'available_end.required' => 'End time is required.',
            'available_end.after' => 'End time must be after start time.',
        ];
    }
}
