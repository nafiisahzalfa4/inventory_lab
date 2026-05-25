<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alat;
use App\Models\Kategori;
use App\Models\Ruangan;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = Alat::with('kategori', 'ruangan')->latest()->get();
         return view('admin.alat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $ruangan = Ruangan::all();
        return view('admin.alat.create', compact('kategori', 'ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'ruangan_id' => 'required|exists:ruangan,id',
            'nama_alat' => 'required|string|max:100',
            'merek' => 'required|string|max:100',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|in:baik,rusak,maintenance'
        ]);

        Alat::create($request->all());

        return redirect()->route('alat.index')->with('success', 'Data alat berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Alat::findOrFail($id);
        $kategori = Kategori::all();
        $ruangan = Ruangan::all();

        return view('admin.alat.edit', compact('data', 'kategori', 'ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Alat::findOrFail($id);

        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'ruangan_id' => 'required|exists:ruangan,id',
            'nama_alat' => 'required|string|max:100',
            'merek' => 'required|string|max:100',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|in:baik,rusak,maintenance'
        ]);

        $data->update($request->all());

        return redirect()->route('alat.index')->with('success', 'Data alat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Alat::findOrFail($id);
        $data->delete();

        return redirect()->route('alat.index')->with('success', 'Data alat berhasil dihapus');
    }
}
