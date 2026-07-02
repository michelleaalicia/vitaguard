@extends('layouts.member')

@section('title','My Bookings')

@section('content')

<section class="py-5">

<div class="container">

<h2 class="mb-4">

My Bookings

</h2>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<div class="card shadow border-0">

<div class="card-body">

<table class="table align-middle">

<thead>

<tr>

<th>No</th>
<th>Doctor</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>

</tr>

</thead>

<tbody>

@forelse($bookings as $booking)

<tr>

<td>{{ $loop->iteration }}</td>

<td>

{{ $booking->doctor->user->name }}

</td>

<td>

{{ $booking->booking_date }}

</td>

<td>

{{ \Carbon\Carbon::parse($booking->booking_time)->format('H:i') }}

</td>

<td>

@switch($booking->status)

@case('Pending')

<span class="badge bg-warning">

Pending

</span>

@break

@case('Approved')

<span class="badge bg-primary">

Approved

</span>

@break

@case('Completed')

<span class="badge bg-success">

Completed

</span>

@break

@case('Cancelled')

<span class="badge bg-danger">

Cancelled

</span>

@break

@endswitch

</td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center">

No booking yet.

</td>

</tr>

@endforelse

</tbody>

</table>

{{ $bookings->links() }}

</div>

</div>

</div>

</section>

@endsection