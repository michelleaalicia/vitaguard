@extends('layouts.member')

@section('title', 'Book Consultation')

@section('content')

    <section class="py-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-7">

                    <div class="card shadow border-0">

                        <div class="card-body p-4">

                            <h3 class="mb-4">

                                Book Consultation

                            </h3>

                            <form action="{{ route('member.bookings.store') }}" method="POST">

                                @csrf

                                @include('member.bookings._form')

                                <button class="btn btn-primary">

                                    Confirm Booking

                                </button>

                                <a href="{{ route('member.dashboard') }}" class="btn btn-secondary">

                                    Cancel

                                </a>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection