@extends('layouts.doctor')

@section('title', 'Dashboard')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">
            <h3>Doctor Dashboard</h3>
        </div>
    </div>

    <div class="app-content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-4">

                    <div class="small-box text-bg-primary">

                        <div class="inner">
                            <h3>{{ $todayBookings }}</h3>
                            <p>Today's Bookings</p>
                        </div>

                        <i class="small-box-icon bi bi-calendar-check"></i>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="small-box text-bg-warning">

                        <div class="inner">
                            <h3>{{ $pendingBookings }}</h3>
                            <p>Pending Bookings</p>
                        </div>

                        <i class="small-box-icon bi bi-clock-history"></i>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="small-box text-bg-success">

                        <div class="inner">
                            <h3>{{ $openConsultations }}</h3>
                            <p>Open Consultations</p>
                        </div>

                        <i class="small-box-icon bi bi-chat-dots"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection