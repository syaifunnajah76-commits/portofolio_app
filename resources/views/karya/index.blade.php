@extends('layouts.master')

@section('title', 'Eksplorasi Seluruh Karya')

@section('content')
<div class="border-bottom border-info pb-3 mb-4">
    <h2 class="text-info fw-bold">Eksplorasi Seluruh Karya</h2>
    <p class="mb-0">Daftar lengkap produk teknologi yang telah di-deploy oleh mahasiswa.</p>
</div>

<a href="{{ route('karya.create') }}" class="btn btn-primary mb-4 fw-bold">Tambah Karya Baru</a>

<div class="row">
    @foreach ($karyas as $item)
        <div class="col-md-6 mb-4">
            <div class="card bg-secondary text-white border-start border-info border-4 shadow-sm h-100">

                <img src="{{ asset('images/' . $item->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Gambar Karya">

                <div class="card-body p-4 d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge bg-dark text-info">{{ $item->category->name_category }}</span>
                        <small class="text-white-50">Author: Labib Zuhair Muntasir</small>
                    </div>

                    <h4 class="fw-bold">{{ $item->title }}</h4>
                    <p class="text-light opacity-75 card-text text-truncate">{{ $item->description }}</p>

                    <!-- mt-auto digunakan agar tombol selalu terdorong ke bawah jika deskripsi pendek -->
                    <a href="{{ route('karya.show', $item->id) }}" class="btn btn-outline-info btn-sm fw-bold w-100 mt-auto">Buka Detail Karya &rarr;</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
