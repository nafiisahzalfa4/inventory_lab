<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Alat;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Peminjaman::with('alat', 'petugas')->latest()->get();
        return view('petugas.peminjaman.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alat = Alat::all();
        return view('petugas.peminjaman.create', compact('alat'));
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
            'alat_id' => 'required|exists:alat,id',
            'nama_peminjam' => 'required|string|max:100',
            'jumlah_pinjam' => 'required|integer|min:1',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'nullable|date|after_or_equal:tgl_pinjam'
        ]);

        $alat = Alat::findOrFail($request->alat_id);

        // validasi stok
        if ($request->jumlah_pinjam > $alat->stok) {
            return back()->withErrors([
                'jumlah_pinjam' => 'Stok tidak cukup!'
            ])->withInput();
        }

        Peminjaman::create([
            'alat_id' => $request->alat_id,
            'petugas_id' => auth()->user()->petugas_id,
            'nama_peminjam' => $request->nama_peminjam,
            'jumlah_pinjam' => $request->jumlah_pinjam,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'status' => 'dipinjam'
        ]);

        // kurangi stok
        $alat->decrement('stok', $request->jumlah_pinjam);

        return redirect()->route('petugas.peminjaman.index')
            ->with('success', 'Peminjaman berhasil ditambahkan');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Peminjaman::findOrFail($id);
        $alat = Alat::all();
        return view('petugas.peminjaman.edit', compact('data', 'alat'));
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
        $data = Peminjaman::findOrFail($id);

        $request->validate([
            'alat_id' => 'required|exists:alat,id',
            'nama_peminjam' => 'required|string|max:100',
            'jumlah_pinjam' => 'required|integer|min:1',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'nullable|date|after_or_equal:tgl_pinjam',
            'status' => 'required|in:dipinjam,dikembalikan'
        ]);

        // 🔹 kalau dikembalikan → tambah stok
        if ($request->status == 'dikembalikan' && $data->status == 'dipinjam') {
            $alat = $data->alat;
            $alat->increment('stok', $data->jumlah_pinjam);
        }

        $data->update($request->all());

        return redirect()->route('petugas.peminjaman.index')
            ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Peminjaman::findOrFail($id);

        // balikin stok sebelum hapus
        $alat = $data->alat;
        $alat->increment('stok', $data->jumlah_pinjam);

        $data->delete();

        return redirect()->route('petugas.peminjaman.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
