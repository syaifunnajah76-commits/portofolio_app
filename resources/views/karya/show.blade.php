@extends('layouts.master')
@section('title', 'Detail Karya: ' . $karya->judul)

@section('content')
<div class="mb-4">
    <a href="{{ route('karya.index') }}" class="btn btn-outline-light btn-sm">&larr; Kembali ke Daftar</a>
    <div class="float-end">
        <a href="{{ route('karya.edit', $karya->id) }}" class="btn btn-warning btn-sm fw-bold text-dark">Edit Karya</a>
        <form action="{{ route('karya.destroy', $karya->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus karya ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm fw-bold">Hapus Karya</button>
        </form>
    </div>
</div>

<div class="card bg-secondary text-white border-info shadow-lg">
    <div class="card-header bg-dark border-info py-3 d-flex justify-content-between align-items-center">
        <span class="badge bg-info text-dark fw-bold fs-6">{{ $karya->category->nama_kategori }}</span>
        <span class="text-muted">Diposting: {{ $karya->created_at->format('d M Y') }}</span>
    </div>
    <div class="card-body p-5">
        <img src="{{ asset('storage/karya/' . $karya->gambar) }}" alt="Gambar Karya" class="card-image-top mb-4 rounded shadow-sm " style="max-height: 400px; object-fit: cover;">
        <h1 class="display-5 fw-bold text-info mb-3">{{ $karya->judul }}</h1>

        <div class="p-3 bg-dark rounded border border-secondary mb-4">
            <h5 class="mb-1 text-muted text-uppercase small font-monospace">Informasi Pengembang</h5>
            <p class="mb-0 fw-bold fs-5 text-white">Labib Zuhair Muntasir</p>
            <small class="text-info">Labiblpc@gmail.com</small>
        </div>

        <h4 class="fw-bold text-warning border-bottom border-secondary pb-2 mb-3">Deskripsi Proyek</h4>
        <p class="fs-5 text-light style-text-justify" style="line-height: 1.8;">
            {{ $karya->deskripsi }}
        </p>
    </div>
</div>
@endsection
