@extends('layouts.doctor')

@section('title', 'Consultations')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">
            <h3>My Consultations</h3>
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
                                <th>Status</th>
                                <th width="100">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($consultations as $consultation)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $consultation->booking->member->name }}</td>

                                    <td>{{ $consultation->booking->booking_date }}</td>

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

                                        <a href="{{ route('doctor.consultations.show', $consultation) }}"
                                            class="btn btn-info btn-sm">

                                            <i class="bi bi-eye"></i>

                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center">

                                        No consultation found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                    {{ $consultations->links() }}

                </div>

            </div>

        </div>

    </div>

@endsection