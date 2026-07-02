@extends('layouts.admin')

@section('title', 'Edit Booking')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h3>Edit Booking</h3>

                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </div>

        </div>
    </div>

    <div class="app-content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">

                        @csrf
                        @method('PUT')

                        @include('admin.bookings._form')

                        <button type="submit" class="btn btn-primary">
                            Update Booking
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection