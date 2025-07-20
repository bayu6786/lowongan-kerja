@extends('admin.dashboard')

@section('content')
    <div class="container mt-3">
        <h2>Daftar Lowongan</h2>
        <a href="{{ route('jobs.create') }}" class="btn btn-success mb-2">+ Tambah Lowongan</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Perusahaan</th>
                    <th>Posisi</th>
                    <th>Lokasi</th>
                    <th>Kadaluarsa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ $job->company_name }}</td>
                        <td>{{ $job->position }}</td>
                        <td>{{ $job->location }}</td>
                        <td>{{ $job->expiration_date }}</td>
                        <td>
                            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus lowongan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
