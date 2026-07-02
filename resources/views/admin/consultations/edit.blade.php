@extends('layouts.admin')

@section('title', 'Edit Consultation')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h3>Edit Consultation</h3>

                <a href="{{ route('admin.consultations.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </div>

        </div>
    </div>

    <div class="app-content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin.consultations.update', $consultation) }}" method="POST">

                        @csrf
                        @method('PUT')

                        @include('admin.consultations._form')

                        <button class="btn btn-primary">
                            Update Consultation
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection