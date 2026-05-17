<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories; // Sesuaikan dengan nama model Anda

class CategoryController extends Controller
{
    public function index()
    {
        $kategori = Categories::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // unique:categories memastikan tidak ada nama kategori yang kembar
            'name_category' => 'required|string|max:100|unique:categories,name_category',
        ]);

        $kategori = new Categories();
        $kategori->name_category = $request->input('name_category');
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = Categories::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_category' => 'required|string|max:100|unique:categories,name_category,' . $id,
        ]);

        $kategori = Categories::findOrFail($id);
        $kategori->name_category = $request->input('name_category');
        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Nama kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = Categories::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
