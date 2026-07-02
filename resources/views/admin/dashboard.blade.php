@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">

            <div class="mb-4">
                <h2 class="fw-bold">Administrator Dashboard</h2>
                <p class="text-muted mb-0">
                    Welcome back, <strong>{{ auth()->user()->name }}</strong> 👋
                </p>
            </div>

        </div>
    </div>

    <div class="app-content">

        <div class="container-fluid">

            <div class="row">

                <!-- Doctors -->
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="small-box bg-primary shadow rounded">

                        <div class="inner">

                            <h3>{{ $doctorCount }}</h3>

                            <p>Total Doctors</p>

                        </div>

                        <div class="icon">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>

                        <a href="{{ route('admin.doctors.index') }}" class="small-box-footer">

                            Manage Doctors
                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

                <!-- Members -->
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="small-box bg-success shadow rounded">

                        <div class="inner">

                            <h3>{{ $memberCount }}</h3>

                            <p>Total Members</p>

                        </div>

                        <div class="icon">
                            <i class="bi bi-people-fill"></i>
                        </div>

                        <a href="{{ route('admin.members.index') }}" class="small-box-footer">

                            Manage Members
                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

                <!-- Articles -->
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="small-box bg-warning shadow rounded">

                        <div class="inner">

                            <h3>{{ $articleCount }}</h3>

                            <p>Health Articles</p>

                        </div>

                        <div class="icon">
                            <i class="bi bi-file-earmark-text-fill"></i>
                        </div>

                        <a href="{{ route('admin.articles.index') }}" class="small-box-footer">

                            Manage Articles
                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

                <!-- Bookings -->
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="small-box bg-info shadow rounded">

                        <div class="inner">

                            <h3>{{ $bookingCount }}</h3>

                            <p>Total Bookings</p>

                        </div>

                        <div class="icon">
                            <i class="bi bi-calendar-check-fill"></i>
                        </div>

                        <a href="{{ route('admin.bookings.index') }}" class="small-box-footer">

                            Manage Bookings
                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

                <!-- Open Consultation -->
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="small-box bg-secondary shadow rounded">

                        <div class="inner">

                            <h3>{{ $openConsultationCount }}</h3>

                            <p>Ongoing Consultation</p>

                        </div>

                        <div class="icon">
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>

                        <a href="{{ route('admin.consultations.index') }}" class="small-box-footer">

                            View Consultation
                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

                <!-- Closed Consultation -->
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="small-box bg-danger shadow rounded">

                        <div class="inner">

                            <h3>{{ $closedConsultationCount }}</h3>

                            <p>Completed Consultation</p>

                        </div>

                        <div class="icon">
                            <i class="bi bi-check-circle-fill"></i>
                        </div>

                        <a href="{{ route('admin.consultations.index') }}" class="small-box-footer">

                            View Consultation
                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>

            <div class="card shadow">

                <div class="card-header">

                    <h5 class="mb-0">
                        <i class="bi bi-bar-chart-fill me-2"></i>
                        System Overview
                    </h5>

                </div>

                <div class="card-body">

                    <div class="row text-center">

                        <div class="col-md-2">

                            <h3 class="text-primary">
                                {{ $doctorCount }}
                            </h3>

                            <small class="text-muted">
                                Doctors
                            </small>

                        </div>

                        <div class="col-md-2">

                            <h3 class="text-success">
                                {{ $memberCount }}
                            </h3>

                            <small class="text-muted">
                                Members
                            </small>

                        </div>

                        <div class="col-md-2">

                            <h3 class="text-warning">
                                {{ $articleCount }}
                            </h3>

                            <small class="text-muted">
                                Articles
                            </small>

                        </div>

                        <div class="col-md-2">

                            <h3 class="text-info">
                                {{ $bookingCount }}
                            </h3>

                            <small class="text-muted">
                                Bookings
                            </small>

                        </div>

                        <div class="col-md-2">

                            <h3 class="text-secondary">
                                {{ $openConsultationCount }}
                            </h3>

                            <small class="text-muted">
                                Ongoing
                            </small>

                        </div>

                        <div class="col-md-2">

                            <h3 class="text-danger">
                                {{ $closedConsultationCount }}
                            </h3>

                            <small class="text-muted">
                                Completed
                            </small>

                        </div>

                    </div>

                    <hr>

                    <p class="text-center text-muted mb-0">

                        This dashboard displays a real-time summary of VitaGuard system data to help administrators
                        consolidate user activity, bookings, health articles, and consultations.

                    </p>

                </div>

            </div>

        </div>

    </div>

@endsection