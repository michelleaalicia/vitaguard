@extends('layouts.admin')

@section('title', 'Booking')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <h3>Booking Management</h3>

            <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i>
                Add Booking
            </a>

        </div>

    </div>
</div>

<div class="app-content">

    <div class="container-fluid">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card">

            <div class="card-body">

                <table class="table table-bordered table-hover align-middle">

                    <thead>

                        <tr>

                            <th width="60">No</th>
                            <th>Member</th>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th width="170">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($bookings as $booking)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $booking->member->name }}</td>

                            <td>{{ $booking->doctor->user->name }}</td>

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

                                <a href="{{ route('admin.bookings.edit',$booking) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil"></i>

                                </a>

                                <form action="{{ route('admin.bookings.destroy',$booking) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this booking?')">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7" class="text-center">
                                No booking found.
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

                <div class="mt-3">
                    {{ $bookings->links() }}
                </div>

            </div>

        </div>

    </div>

</div>

@endsection