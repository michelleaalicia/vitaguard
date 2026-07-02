@extends('layouts.admin')

@section('title', 'Article')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h3>Article Management</h3>

                <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i>
                    Add Article
                </a>

            </div>

        </div>
    </div>

    <div class="app-content">

        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card">

                <div class="card-body">

                    <table class="table table-bordered table-hover align-middle">

                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th width="100">Image</th>
                                <th>Title</th>
                                <th width="170">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($articles as $article)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        @if($article->image)
                                            <img src="{{ asset('storage/' . $article->image) }}" width="70" class="rounded">
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>{{ $article->title }}</td>

                                    <td>

                                        <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete this article?')">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="text-center">
                                        No article found.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                    <div class="mt-3">
                        {{ $articles->links() }}
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection