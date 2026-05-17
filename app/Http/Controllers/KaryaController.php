<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\karyas;

class KaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua baris data karya dari database
        $karyas = karyas::all();
        // Mengirim data tersebut ke file tampilan (view) resources/views/karya/index.blade.php
        return view('karya.index', compact('karyas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua data kategori untuk dijadikan pilihan (dropdown) pada form tambah data
        $semua_kategori = Categories::all();
        return view('karya.create', compact('semua_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Memvalidasi data yang dikirim form sebelum diizinkan masuk ke database
        $request->validate([
            'title' => 'required|string|max:100|unique:karyas,title',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Menginisialisasi objek model baru
        $karya = new karyas();

        // Memproses file gambar jika pengguna mengunggahnya
        if ($request->hasFile('image')) {
            $gambar = $request->file('image');
            // Menambahkan timestamp pada nama file agar tidak terjadi bentrok nama (duplikasi)
            $nama_gambar_baru = time() . '_' . $gambar->getClientOriginalName();
            // Memindahkan gambar dari memori sementara ke folder public/images di server
            $gambar->move(public_path('images'), $nama_gambar_baru);
            // Menyimpan nama file tersebut ke properti model
            $karya->image = $nama_gambar_baru;
        }

        // Menyimpan sisa data inputan teks ke properti model
        $karya->title = $request->input('title');
        $karya->description = $request->input('description');
        $karya->category_id = $request->input('category_id');

        // Mengeksekusi penyimpanan secara permanen ke dalam tabel database
        $karya->save();

        // Mengalihkan halaman kembali ke daftar karya disertai pesan sukses sementara (flash session)
        return redirect()->route('karya.index')->with('success', 'Karya berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Mencari data karya spesifik berdasarkan ID.
        // findOrFail akan otomatis memunculkan halaman error 404 jika ID tidak ditemukan.
        $karya = karyas::findOrFail($id);
        return view('karya.show', compact('karya'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Mengambil data kategori untuk form dropdown
        $semua_kategori = Categories::all();
        // Mengambil data karya yang akan diubah untuk mengisi nilai awal pada form (old values)
        $karya = karyas::findOrFail($id);

        return view('karya.edit', compact('karya', 'semua_kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Aturan validasi. Bagian unique:karyas,title,id memastikan judul tidak bentrok
        // dengan data lain, tapi tetap mengizinkan jika judulnya sama dengan milik data ini sendiri
        $request->validate([
            'title' => 'required|string|max:100|unique:karyas,title,' . $id,
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $karya = karyas::findOrFail($id);
        // Menyimpan nama gambar yang lama sebagai referensi untuk dihapus nanti
        $nama_gambar_lama = $karya->image;

        // Mengeksekusi blok kode ini HANYA JIKA pengguna mengunggah gambar pengganti yang baru
        if ($request->hasFile('image')) {
            $gambar = $request->file('image');
            $nama_gambar_baru = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images'), $nama_gambar_baru);
            $karya->image = $nama_gambar_baru;

            // Menghapus file fisik gambar yang lama dari server agar tidak memenuhi ruang penyimpanan
            if ($nama_gambar_lama && file_exists(public_path('images/' . $nama_gambar_lama))) {
                unlink(public_path('images/' . $nama_gambar_lama));
            }
        }

        // Memperbarui sisa data
        $karya->title = $request->input('title');
        $karya->description = $request->input('description');
        $karya->category_id = $request->input('category_id');

        $karya->save();

        return redirect()->route('karya.index')->with('success', 'Karya berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $karya = karyas::findOrFail($id);

        // Sebelum menghapus data di database, pastikan file fisik gambarnya ikut terhapus di server
        if ($karya->image && file_exists(public_path('images/' . $karya->image))) {
            unlink(public_path('images/' . $karya->image));
        }

        // Mengeksekusi perintah DELETE pada database
        $karya->delete();

        return redirect()->route('karya.index')->with('success', 'Karya berhasil dihapus!');
    }
}
