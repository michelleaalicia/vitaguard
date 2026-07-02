@extends('layouts.admin')

@section('title', 'Edit Article')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h3>Edit Article</h3>

                <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </div>

        </div>
    </div>

    <div class="app-content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin.articles.update', $article) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        @include('admin.articles._form')

                        <button type="submit" class="btn btn-primary">
                            Update Article
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection