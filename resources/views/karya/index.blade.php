@extends('layouts.master')

@section('title', 'Eksplorasi Seluruh Karya')

@section('content')
<div class="border-bottom border-info pb-3 mb-4">
    <h2 class="text-info fw-bold">Eksplorasi Seluruh Karya</h2>
    <p class=" mb-0">Daftar lengkap produk teknologi yang telah di-deploy oleh mahasiswa.</p>
</div>

<div class="row">
    <a href="{{ route('karya.create') }}" class="btn btn-primary mb-4 fw-bold">Tambah Karya Baru</a>
    @foreach ($karyas as $item)

        <div class="col-md-6 mb-4">
            <div class="card bg-secondary text-white border-start border-info border-4 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-dark text-info">{{ $item->category->name_category; }}</span>
                        <small class="text-muted">Author: Labib Zuhair Muntasir</small>
                    </div>
                    <img src="{{ asset( $item->image) }}" class="card-image-top" style="max-height: 100px; object-fit: cover;" alt="Gambar Karya">
                    <h4 class="fw-bold">{{ $item->title }}</h4>
                    <p class="text-light opacity-75 card-text text-truncate" style="max-width: 500px;">{{ $item->description; }}</p>
                    <a href="{{ route('karya.show', $item->id) }}" class="btn btn-outline-info btn-sm fw-bold w-100 mt-2">Buka Detail Karya &rarr;</a>
                </div>
            </div>
        </div>
    @endforeach

</div>
@endsection
