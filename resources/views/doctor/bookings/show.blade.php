@extends('layouts.doctor')

@section('title', 'Booking Detail')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between">

                <h3>Booking Detail</h3>

                <a href="{{ route('doctor.bookings.index') }}" class="btn btn-secondary">

                    Back

                </a>

            </div>

        </div>
    </div>

    <div class="app-content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <table class="table">

                        <tr>
                            <th width="200">Member</th>
                            <td>{{ $booking->member->name }}</td>
                        </tr>

                        <tr>
                            <th>Date</th>
                            <td>{{ $booking->booking_date }}</td>
                        </tr>

                        <tr>
                            <th>Time</th>
                            <td>{{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{ $booking->status }}</td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection