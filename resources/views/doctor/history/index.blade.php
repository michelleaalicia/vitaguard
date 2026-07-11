@extends('layouts.doctor')

@section('title','Consultation History')

@section('content')

<div class="app-content-header">

    <div class="container-fluid">

        <h3>Consultation History</h3>

    </div>

</div>

<div class="app-content">

    <div class="container-fluid">

        <div class="card">

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Patient</th>

                            <th>Date</th>

                            <th>Status</th>

                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($consultations as $consultation)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $consultation->booking->member->name }}</td>

                            <td>{{ $consultation->booking->booking_date }}</td>

                            <td>

                                <span class="badge bg-secondary">

                                    {{ $consultation->status }}

                                </span>

                            </td>

                            <td>

                                <a href="{{ route('doctor.consultations.show',$consultation) }}"
                                    class="btn btn-primary btn-sm">

                                    View

                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5" class="text-center">

                                No consultation history.

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