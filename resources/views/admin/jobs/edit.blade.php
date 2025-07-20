@extends('admin.dashboard')

@section('content')
    <div class="container mt-3">
        <h2>Edit Lowongan</h2>
        <form action="{{ route('jobs.update', $job->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.jobs.form')
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
