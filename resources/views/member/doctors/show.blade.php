@extends('layouts.member')

@section('title', $doctor->user->name)

@section('content')

    <section class="py-5">

        <div class="container">

            <div class="row">

                <div class="col-lg-4">

                    @if($doctor->photo)

                        <img src="{{ asset('storage/' . $doctor->photo) }}" class="img-fluid rounded shadow">

                    @else

                        <img src="{{ asset('medilab/assets/img/doctors/doctors-1.jpg') }}" class="img-fluid rounded shadow">

                    @endif

                </div>

                <div class="col-lg-8">

                    <h2>{{ $doctor->user->name }}</h2>

                    <h5 class="text-primary mb-3">

                        {{ $doctor->specialization }}

                    </h5>

                    <p>

                        {{ $doctor->description }}

                    </p>

                    <hr>

                    <p>

                        <strong>Phone</strong><br>

                        {{ $doctor->phone }}

                    </p>

                    <p>

                        <strong>Practice Days</strong><br>

                        {{ str_replace(',', ', ', $doctor->available_days) }}

                    </p>

                    <p>

                        <strong>Practice Hours</strong><br>

                        {{ substr($doctor->available_start, 0, 5) }}
                        -
                        {{ substr($doctor->available_end, 0, 5) }}

                    </p>

                    <a href="{{ route('member.bookings.create', ['doctor' => $doctor->id]) }}" class="btn btn-primary">
                        Book Consultation
                    </a>

                </div>

            </div>

        </div>

    </section>

@endsection