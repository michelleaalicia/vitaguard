@extends('layouts.doctor')

@section('title','My Bookings')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">

        <h3>My Bookings</h3>

    </div>
</div>

<div class="app-content">

    <div class="container-fluid">

        <div class="card">

            <div class="card-body">

                <table class="table table-bordered align-middle">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>Member</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($bookings as $booking)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $booking->member->name }}</td>

                            <td>{{ $booking->booking_date }}</td>

                            <td>{{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }}</td>

                            <td>

                                @switch($booking->status)

                                    @case('Pending')
                                        <span class="badge bg-warning">Pending</span>
                                        @break

                                    @case('Approved')
                                        <span class="badge bg-primary">Approved</span>
                                        @break

                                    @case('Completed')
                                        <span class="badge bg-success">Completed</span>
                                        @break

                                    @case('Cancelled')
                                        <span class="badge bg-danger">Cancelled</span>
                                        @break

                                @endswitch

                            </td>

                            <td>

                                <a href="{{ route('doctor.bookings.show',$booking) }}"
                                   class="btn btn-info btn-sm">

                                    <i class="bi bi-eye"></i>

                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6" class="text-center">

                                No booking found.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

                {{ $bookings->links() }}

            </div>

        </div>

    </div>

</div>

@endsection