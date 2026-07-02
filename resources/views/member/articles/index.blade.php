@extends('layouts.member')

@section('title', 'Articles')

@section('content')

    <section class="py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2>Health Articles</h2>

                <p class="text-muted">
                    Stay informed with the latest health information.
                </p>

            </div>

            <div class="row">

                @forelse($articles as $article)

                    <div class="col-lg-4 mb-4">

                        <div class="card shadow-sm border-0 h-100">

                            @if($article->image)

                                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top"
                                    style="height:220px;object-fit:cover;">

                            @endif

                            <div class="card-body">

                                <h5>{{ $article->title }}</h5>

                                <p>

                                    {{ Str::limit(strip_tags($article->content), 120) }}

                                </p>

                            </div>

                            <div class="card-footer bg-white border-0">

                                <a href="{{ route('member.articles.show', $article) }}" class="btn btn-primary w-100">

                                    Read More

                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">

                        No articles available.

                    </div>

                @endforelse

            </div>

            {{ $articles->links() }}

        </div>

    </section>

@endsection