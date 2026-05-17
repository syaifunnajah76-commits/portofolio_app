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
        $karyas = Karyas::all();
        return view('karya.index', compact('karyas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karya.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('karya.store');
    }

    public function show($id)
    {
        $karya = Karyas::findOrFail($id);
        return view('karya.show', compact('karya'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $semua_kategori = Categories::all();
        $karya = Karyas::findOrFail($id);
        return view('karya.edit', compact('karya', 'semua_kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:100|unique:karyas,title,' . $id,
            'description' => 'required|string',
            'i  mage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $karya = Karyas::findOrFail($id);
       $nama_gambar_lama = $karya->image;

        if ($request->hasFile('image')) {
            $gambar = $request->file('image');
            $nama_gambar_baru = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images'), $nama_gambar_baru);
            $karya->image = $nama_gambar_baru;

            if ($nama_gambar_lama && file_exists(public_path('images/' . $nama_gambar_lama))) {
                unlink(public_path('images/' . $nama_gambar_lama));
            }
        }

        $karya->title = $request->input('title');
        $karya->description = $request->input('description');
        $karya->category_id = $request->input('category_id');
        $karya->save();
        return redirect()->route('karya.index')->with('success', 'Karya berhasil diperbarui!');
    }
}
