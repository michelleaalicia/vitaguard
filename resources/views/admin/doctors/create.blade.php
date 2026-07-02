@extends('layouts.admin')

@section('title', 'Add Doctor')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h3>Add Doctor</h3>

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

                    <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        @include('admin.doctors._form')

                        <button class="btn btn-primary">

                            Save Doctor

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection