@extends('layouts.master')
@section('title', 'Edit Kategori')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card bg-secondary text-white border-warning shadow">
            <div class="card-body p-4">
                <h3 class="text-warning mb-4 fw-bold">Edit Kategori</h3>

                @if ($errors->any())
                    <div class="alert alert-danger py-2 small">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label text-warning fw-bold">Nama Kategori</label>
                        <input type="text" name="name_category" class="form-control bg-dark text-white border-0" value="{{ old('name_category', $kategori->name_category) }}" required>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold text-dark">Perbarui Kategori</button>
                    <a href="{{ route('kategori.index') }}" class="btn btn-outline-light w-100 mt-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
