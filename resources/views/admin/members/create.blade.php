@extends('layouts.admin')

@section('title', 'Add Member')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h3>Add Member</h3>

                <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">

                    Back

                </a>

            </div>

        </div>
    </div>

    <div class="app-content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin.members.store') }}" method="POST">
                        @csrf

                        @include('admin.members._form')

                        <button type="submit" class="btn btn-primary">
                            Save Member
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection