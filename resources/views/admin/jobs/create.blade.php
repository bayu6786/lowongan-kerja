@extends('admin.dashboard')

@section('content')
    <div class="container mt-3">
        <h2>Tambah Lowongan Baru</h2>
        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf
            @include('admin.jobs.form')
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
