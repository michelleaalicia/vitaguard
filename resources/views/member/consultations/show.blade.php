@extends('layouts.member')

@section('title', 'Consultation')

@section('content')

<section class="py-5">

    <div class="container">

        <div class="card shadow">

            <div class="card-header">

                <h4>

                    {{ $consultation->booking->doctor->user->name }}

                </h4>

            </div>

            <div class="card-body" style="height:450px;overflow-y:auto;">

                @forelse($consultation->messages as $message)

                <div class="mb-3
                                        @if($message->sender_id == auth()->id())
                                            text-end
                                        @endif">

                    <div class="d-inline-block
                                        p-3 rounded
                                        @if($message->sender_id == auth()->id())
                                            bg-primary text-white
                                        @else
                                            bg-light
                                        @endif">

                        {{ $message->message }}

                    </div>

                </div>

                @empty

                <p class="text-center">

                    No messages yet.

                </p>

                @endforelse

            </div>

            <div class="card-footer">


                @if($consultation->status == 'Open')

                <form action="{{ route('doctor.consultations.messages.store', $consultation) }}"
                    method="POST">

                    @csrf

                    <div class="input-group">

                        <input type="text" name="message" class="form-control" placeholder="Type message...">

                        <button class="btn btn-primary">

                            Send

                        </button>
                    </div>

                </form>

                @else

                <div class="alert alert-secondary">

                    This consultation has been closed.

                </div>

                @endif

            </div>

        </div>

    </div>

</section>

@endsection