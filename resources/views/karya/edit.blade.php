@extends('layouts.master')

@section('title', 'Edit Karya')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card bg-secondary text-white border-warning shadow">
            <div class="card-body p-4">
                <h3 class="text-warning mb-4 fw-bold">Edit Data Karya</h3>

                @if ($errors->any())
                    <div class="alert alert-danger py-2 small">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('karya.update', $karya->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                     <div class="mb-3">
                        <label class="form-label text-warning fw-bold">Judul Proyek</label>
                        <input type="text" name="title" class="form-control bg-dark text-white border-0" value="{{ old('title', $karya->title) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-warning fw-bold">Kategori Teknologi</label>
                        <select name="category_id" class="form-select bg-dark text-white border-0" required>
                            @foreach($semua_kategori as $kat)
                                <option value="{{ $kat->id }}" {{ old('category_id', $karya->category_id) == $kat->id ? 'selected' : '' }}>
                                    {{ $kat->name_category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

<div class="mb-3">
        <label class="form-label text-warning fw-bold">Unggah Gambar Baru (Opsional)</label>

        <div class="mb-2">
            <img src="{{ asset('storage/karya/' . $karya->image) }}" alt="Preview" class="img-thumbnail" width="150">
        </div>

        <input type="file" name="image" class="form-control bg-dark text-white border-0" accept="image/*">
        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah image lama.</small>
    </div>
                    <div class="mb-4">
                        <label class="form-label text-warning fw-bold">Deskripsi Lengkap</label>
                        <textarea name="description" class="form-control bg-dark text-white border-0" rows="4">{{ old('description', $karya->description) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold text-dark">Perbarui Data Karya</button>
                    <a href="{{ route('karya.index') }}" class="btn btn-outline-light w-100 mt-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
