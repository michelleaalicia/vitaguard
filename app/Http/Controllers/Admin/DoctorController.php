<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateDoctorRequest;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

    public function store(StoreDoctorRequest $request)
    {
        DB::transaction(function () use ($request) {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'doctor',
            ]);

            $photo = null;

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo')->store('doctors', 'public');
            }

            Doctor::create([
                'user_id' => $user->id,
                'specialization' => $request->specialization,
                'phone' => $request->phone,
                'photo' => $photo,
                'description' => $request->description,
                'available_days' => implode(',', $request->available_days),
                'available_start' => $request->available_start,
                'available_end' => $request->available_end,
            ]);

        });

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Doctor added successfully.');
    }

    public function show(string $id)
    {
        return view('admin.doctors.show');
    }

    public function edit(Doctor $doctor)
    {
        $user = $doctor->user;

        return view('admin.doctors.edit', compact('doctor', 'user'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        try {

            $doctor->user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $photo = $doctor->photo;

            if ($request->hasFile('photo')) {

                if ($photo) {
                    Storage::disk('public')->delete($photo);
                }

                $photo = $request->file('photo')->store('doctors', 'public');
            }

            $doctor->update([
                'specialization' => $request->specialization,
                'phone' => $request->phone,
                'photo' => $photo,
                'description' => $request->description,
                'available_days' => implode(',', $request->available_days),
                'available_start' => $request->available_start,
                'available_end' => $request->available_end,
            ]);

            return redirect()
                ->route('admin.doctors.index')
                ->with('success', 'Doctor updated successfully.');

        } catch (\Exception $e) {

            dd($e->getMessage(), $e->getTraceAsString());

        }
    }

    public function destroy(Doctor $doctor)
    {
        if ($doctor->photo && Storage::disk('public')->exists($doctor->photo)) {
            Storage::disk('public')->delete($doctor->photo);
        }

        $doctor->user->delete();

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Doctor deleted successfully.');
    }
}