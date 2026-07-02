@extends('layouts.admin')

@section('title', 'Edit Doctor')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">
                <h3>Edit Doctor</h3>

                <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary">
                    Back
                </a>
            </div>

        </div>
    </div>

    <div class="app-content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="_method" value="PUT">

                        @include('admin.doctors._form')

                        <button type="submit" class="btn btn-primary mt-3">

                            Update Doctor

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection