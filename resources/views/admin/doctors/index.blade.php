@extends('layouts.admin')

@section('title', 'Doctor')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h3>Doctor Management</h3>

                <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">

                    <i class="bi bi-plus-circle"></i>

                    Add Doctor

                </a>

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

                                <th width="50">No</th>

                                <th>Photo</th>

                                <th>Name</th>

                                <th>Specialization</th>

                                <th>Phone</th>

                                <th width="170">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($doctors as $doctor)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>

                                        @if($doctor->photo)

                                            <img src="{{ asset('storage/' . $doctor->photo) }}" width="60" class="rounded">

                                        @else

                                            -

                                        @endif

                                    </td>

                                    <td>{{ $doctor->user->name }}</td>

                                    <td>{{ $doctor->specialization }}</td>

                                    <td>{{ $doctor->phone }}</td>

                                    <td>

                                        <a href="{{ route('admin.doctors.edit', $doctor) }}" class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete this doctor?')">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center">

                                        No doctor found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection