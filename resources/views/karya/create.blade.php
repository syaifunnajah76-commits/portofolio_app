@extends('layouts.master')
@section('title', 'Tambah Karya')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card bg-secondary text-white border-primary shadow">
                <div class="card-body p-4">
                    <h3 class="text-info mb-4 fw-bold">Tambah Karya Baru</h3>

                    @if ($errors->any())
                        <div class="alert alert-danger py-2 small">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('karya.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label text-info fw-bold">Judul Proyek</label>
                            <!-- Name dan old() disesuaikan menjadi 'title' -->
                            <input type="text" name="title" class="form-control bg-dark text-white border-0"
                                value="{{ old('title') }}" placeholder="Masukkan nama proyek">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-info fw-bold">Kategori Teknologi</label>
                            <select name="category_id" class="form-select bg-dark text-white border-0" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($semua_kategori as $kat)
                                    <option value="{{ $kat->id }}"
                                        {{ old('category_id') == $kat->id ? 'selected' : '' }}>
                                        <!-- Properti kategori disesuaikan -->
                                        {{ $kat->name_category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-info fw-bold">Unggah Gambar / Screenshot</label>
                            <!-- Name disesuaikan menjadi 'image' -->
                            <input type="file" name="image" class="form-control bg-dark text-white border-0"
                                accept="image/*" required>
                            <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal 2MB.</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-info fw-bold">Deskripsi Lengkap</label>
                            <!-- Name dan old() disesuaikan menjadi 'description' -->
                            <textarea name="description" class="form-control bg-dark text-white border-0" rows="4"
                                placeholder="Jelaskan rincian fitur sistem">{{ old('description') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 fw-bold">Simpan Karya</button>
                        <a href="{{ route('karya.index') }}" class="btn btn-outline-light w-100 mt-2">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
