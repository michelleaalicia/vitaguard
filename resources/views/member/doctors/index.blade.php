@extends('layouts.member')

@section('title', 'Doctors')

@section('content')

    <section class="py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2>Our Doctors</h2>

                <p class="text-muted">
                    Choose a trusted doctor according to your healthcare needs.
                </p>

            </div>

            <div class="row">

                @forelse($doctors as $doctor)

                    <div class="col-lg-4 col-md-6 mb-4">

                        <div class="card shadow-sm border-0 h-100">

                            @if($doctor->photo)

                                <img src="{{ asset('storage/' . $doctor->photo) }}" class="card-img-top"
                                    style="height:320px; object-fit:cover;">

                            @else

                                <img src="{{ asset('medilab/assets/img/doctors/doctors-1.jpg') }}" class="card-img-top"
                                    style="height:320px; object-fit:cover;">

                            @endif

                            <div class="card-body text-center">

                                <h5 class="fw-bold">
                                    {{ $doctor->user->name }}
                                </h5>

                                <p class="text-primary mb-2">
                                    {{ $doctor->specialization }}
                                </p>

                                <p class="text-muted small">
                                    {{ Str::limit($doctor->description, 100) }}
                                </p>

                            </div>

                            <div class="card-footer bg-white border-0">

                                <a href="{{ route('member.doctors.show', $doctor) }}" class="btn btn-primary w-100">

                                    View Detail

                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">

                        <h5>No doctors available.</h5>

                    </div>

                @endforelse

            </div>

            <div class="mt-4">

                {{ $doctors->links() }}

            </div>

        </div>

    </section>

@endsection