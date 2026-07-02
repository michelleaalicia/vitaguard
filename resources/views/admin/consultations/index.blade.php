@extends('layouts.admin')

@section('title', 'Consultation')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h3>Consultation Management</h3>

            </div>

        </div>
    </div>

    <div class="app-content">

        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
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
                                <th>Booking Date</th>
                                <th>Status</th>
                                <th width="170">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($consultations as $consultation)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $consultation->booking->member->name }}</td>

                                    <td>{{ $consultation->booking->doctor->user->name }}</td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($consultation->booking->booking_date)->format('d M Y') }}
                                    </td>

                                    <td>

                                        @if($consultation->status == 'Open')

                                            <span class="badge bg-success">
                                                Open
                                            </span>

                                        @else

                                            <span class="badge bg-secondary">
                                                Closed
                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        <a href="{{ route('admin.consultations.edit', $consultation) }}"
                                            class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <form action="{{ route('admin.consultations.destroy', $consultation) }}" method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete this consultation?')">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center">
                                        No consultation found.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                    <div class="mt-3">
                        {{ $consultations->links() }}
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection