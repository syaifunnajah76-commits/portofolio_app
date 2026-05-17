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
}
