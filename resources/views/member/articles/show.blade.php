@extends('layouts.member')

@section('title', $article->title)

@section('content')

    <section class="py-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-9">

                    @if($article->image)

                        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded mb-4">

                    @endif

                    <h2 class="mb-3">

                        {{ $article->title }}

                    </h2>

                    <hr>

                    <div>

                        {!! nl2br(e($article->content)) !!}

                    </div>

                    <div class="mt-4">

                        <a href="{{ route('member.articles.index') }}" class="btn btn-secondary">

                            Back

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection