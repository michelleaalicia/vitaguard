@extends('layouts.admin')

@section('title', 'Consultation Detail')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">
            <h3>Consultation Detail</h3>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-header">

                    <h5>
                        Member :
                        {{ $consultation->booking->member->name }}
                    </h5>

                    <h6>
                        Doctor :
                        {{ $consultation->booking->doctor->user->name }}
                    </h6>

                </div>

                <div class="card-body">

                    @forelse($consultation->messages as $message)

                        <div class="mb-3">

                            <strong>
                                {{ $message->sender->name }}
                            </strong>

                            <br>

                            {{ $message->message }}

                            <br>

                            <small class="text-muted">

                                {{ $message->created_at->format('d M Y H:i') }}

                            </small>

                        </div>

                        <hr>

                    @empty

                        <p class="text-muted">
                            No messages yet.
                        </p>

                    @endforelse

                </div>

            </div>

        </div>
    </div>

@endsection