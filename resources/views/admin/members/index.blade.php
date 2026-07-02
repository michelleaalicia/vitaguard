@extends('layouts.admin')

@section('title', 'Member')

@section('content')

    <div class="app-content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h3>Member Management</h3>

                <a href="{{ route('admin.members.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i>
                    Add Member
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
                                <th>Name</th>
                                <th>Email</th>
                                <th width="170">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($members as $member)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $member->name }}</td>

                                    <td>{{ $member->email }}</td>

                                    <td>

                                        <a href="{{ route('admin.members.edit', $member) }}" class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <form action="{{ route('admin.members.destroy', $member) }}" method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete this member?')">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="text-center">
                                        No member found.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                    <div class="mt-3">
                        {{ $members->links() }}
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection