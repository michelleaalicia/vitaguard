@extends('layouts.member')

@section('title', 'Home')

@section('content')

    <section class="py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2>Welcome, {{ Auth::user()->name }}</h2>

                <p class="text-muted">
                    Book appointments, read health articles, and consult with doctors anytime.
                </p>

                <a href="{{ route('member.bookings.create') }}" class="btn btn-primary mt-2">
                    Book Consultation
                </a>

            </div>

            <div class="row">

                <div class="col-lg-4 mb-3">

                    <div class="card shadow-sm">

                        <div class="card-body text-center">

                            <h3>{{ $doctors->count() }}</h3>

                            <p>Available Doctors</p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 mb-3">

                    <div class="card shadow-sm">

                        <div class="card-body text-center">

                            <h3>{{ $articles->count() }}</h3>

                            <p>Latest Articles</p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 mb-3">

                    <div class="card shadow-sm">

                        <div class="card-body text-center">

                            <h3>24/7</h3>

                            <p>Online Consultation</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="py-5 bg-light">

        <div class="container">

            <h3 class="mb-4">
                Featured Doctors
            </h3>

            <div class="row">

                @foreach($doctors as $doctor)

                    <div class="col-lg-4 mb-4">

                        <div class="card h-100 shadow-sm">

                            @if($doctor->photo)

                                <img src="{{ asset('storage/' . $doctor->photo) }}" class="card-img-top"
                                    style="height:250px;object-fit:cover;">

                            @endif

                            <div class="card-body">

                                <h5>{{ $doctor->user->name }}</h5>

                                <p>{{ $doctor->specialization }}</p>

                            </div>

                            <a href="{{ route('member.doctors.show', $doctor) }}" class="btn btn-primary w-100">
                                View Profile
                            </a>
                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>

    <section class="py-5">

        <div class="container">

            <h3 class="mb-4">
                Latest Articles
            </h3>

            <div class="row">

                @foreach($articles as $article)

                    <div class="col-lg-4 mb-4">

                        <div class="card h-100 shadow-sm">

                            @if($article->image)

                                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top"
                                    style="height:220px;object-fit:cover;">

                            @endif

                            <div class="card-body">

                                <h5>{{ $article->title }}</h5>

                                <p>

                                    {{ Str::limit(strip_tags($article->content), 100) }}

                                </p>

                                <a href="{{ route('member.articles.show', $article) }}" class="btn btn-outline-primary">

                                    Read More

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>

@endsection