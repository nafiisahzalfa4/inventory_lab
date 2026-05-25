<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Petugas::latest()->get();
        return view('admin.petugas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *` /
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.petugas.create');
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
        'nama_petugas' => 'required|string|max:100',
        'nip' => 'required|string|max:30|unique:petugas,nip',
        'telp' => 'required|string|max:15',
        'email' => 'required|email|unique:petugas,email'
    
    ]);

    Petugas::create($request->all());

    return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil ditambahkan');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Petugas::findOrFail($id);
        return view('admin.petugas.edit', compact('data'));
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
        $data = Petugas::findOrFail($id);
        
        $request->validate([
        'nama_petugas' => 'required|string|max:100',
        'nip' => 'required|string|max:30|unique:petugas,nip,' . $id,
        'telp' => 'required|string|max:15',
        'email' => 'required|email|unique:petugas,email,' . $id
    ]);

    $data->update($request->all());

    return redirect()->route('petugas.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Petugas::findOrFail($id);
        $data->delete();
        return redirect()->route('petugas.index')->with('success', 'Data berhasil dihapus');
    }
}
