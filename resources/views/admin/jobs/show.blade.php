@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $job->position }} - {{ $job->company_name }}</h2>
    <p><strong>Lokasi:</strong> {{ $job->location }}</p>
    <p><strong>Deskripsi:</strong><br>{{ $job->job_description }}</p>
    <p><strong>Kualifikasi:</strong><br>{{ $job->qualification }}</p>
    <p><strong>Gaji:</strong> {{ $job->salary }}</p>
    <p><strong>Jenis Pekerjaan:</strong> {{ $job->job_type }}</p>
    <p><strong>Kontak:</strong> {{ $job->contact }}</p>
    <p><strong>Berlaku sampai:</strong> {{ $job->expiration_date }}</p>

    <a href="{{ route('user.jobs.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Lowongan</a>
</div>
@endsection
