@extends('layouts.doctor')

@section('title', 'My Profile')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h3>My Profile</h3>

                <a href="{{ route('doctor.dashboard') }}" class="btn btn-secondary">

                    Back

                </a>

            </div>

        </div>
    </div>

    <div class="app-content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <form action="{{ route('doctor.profile.update') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        @include('doctor.profile._form')

                        <button class="btn btn-primary mt-3">
                            Update Profile
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection