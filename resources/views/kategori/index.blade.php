@extends('layouts.master')
@section('title', 'Manajemen Kategori')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-info fw-bold mb-0">Manajemen Kategori</h2>
            <a href="{{ route('kategori.create') }}" class="btn btn-primary fw-bold">+ Tambah Kategori</a>
        </div>

        <div class="card bg-secondary text-white border-info shadow-sm">
            <div class="card-body p-0">
                <table class="table table-dark table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="p-3 text-info">#</th>
                            <th class="p-3 text-info">Nama Kategori</th>
                            <th class="p-3 text-info text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $index => $item)
                        <tr>
                            <td class="p-3">{{ $index + 1 }}</td>
                            <td class="p-3 fw-bold">{{ $item->name_category }}</td>
                            <td class="p-3 text-end">
                                <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm text-dark fw-bold">Edit</a>
                                <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('PERINGATAN: Menghapus kategori ini juga akan MENGHAPUS SEMUA KARYA yang ada di dalamnya! Lanjutkan?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm fw-bold">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
