<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::latest()->paginate(9);

        return view('member.doctors.index', compact('doctors'));
    }

    public function show(Doctor $doctor)
    {
        $doctor->load('user');

        return view('member.doctors.show', compact('doctor'));
    }
}