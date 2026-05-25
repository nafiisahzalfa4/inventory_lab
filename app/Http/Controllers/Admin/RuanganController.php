<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use App\Models\Petugas;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Ruangan::with('petugas')->latest()->get();
        return view('admin.ruangan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $petugas = Petugas::all();
        return view('admin.ruangan.create', compact('petugas'));
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
        'nama_ruangan' => 'required|string|max:100',
        'petugas_id' => 'required|exists:petugas,id'
    ]);
    
    Ruangan::create($request->all());
    return redirect()->route('ruangan.index')->with('success', 'Data ruangan berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ruangan::findOrFail($id);
        $petugas = Petugas::all();
        return view('admin.ruangan.edit', compact('data', 'petugas'));
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
        $data = Ruangan::findOrFail($id);
        $request->validate([
        'nama_ruangan' => 'required|string|max:100',
        'petugas_id' => 'required|exists:petugas,id'
    ]);
    
    $data->update($request->all());
    return redirect()->route('ruangan.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Ruangan::findOrFail($id);
        $data->delete();
        return redirect()->route('ruangan.index')->with('success', 'Data berhasil dihapus');
    }
}
