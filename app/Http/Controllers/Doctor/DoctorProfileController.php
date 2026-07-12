<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DoctorProfileController extends Controller
{
    public function edit()
    {
        $doctor = Doctor::where('user_id', Auth::id())
            ->with('user')
            ->firstOrFail();

        return view('doctor.profile.edit', compact('doctor'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'required|max:20',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable',

            'available_days' => 'required|array',
            'available_days.*' => 'in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',

            'available_start' => 'required',
            'available_end' => 'required|after:available_start',
        ]);

        $doctor = Doctor::where('user_id', Auth::id())
            ->with('user')
            ->firstOrFail();

        // Update data user
        $doctor->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Upload foto baru (jika ada)
        $photo = $doctor->photo;

        if ($request->hasFile('photo')) {

            if ($photo && Storage::disk('public')->exists($photo)) {
                Storage::disk('public')->delete($photo);
            }

            $photo = $request->file('photo')->store('doctors', 'public');
        }

        // Update data dokter
        $doctor->update([
            'phone' => $request->phone,
            'photo' => $photo,
            'description' => $request->description,
            'available_days' => implode(',', $request->available_days),
            'available_start' => $request->available_start,
            'available_end' => $request->available_end,
        ]);

        return redirect()
            ->route('doctor.profile.edit')
            ->with('success', 'Profile updated successfully.');
    }
}
