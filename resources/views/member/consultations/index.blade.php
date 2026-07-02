@extends('layouts.member')

@section('title', 'My Consultations')

@section('content')

    <section class="py-5">

        <div class="container">

            <h2 class="mb-4">
                My Consultations
            </h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card shadow">

                <div class="card-body">

                    <table class="table table-bordered align-middle">

                        <thead>

                            <tr>
                                <th>No</th>
                                <th>Doctor</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th width="140">Action</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($consultations as $consultation)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        {{ $consultation->booking->doctor->user->name }}
                                    </td>

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

                                        <a href="{{ route('member.consultations.show', $consultation) }}"
                                            class="btn btn-primary btn-sm">

                                            Open Chat

                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5" class="text-center">

                                        No consultations found.

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

    </section>

@endsection