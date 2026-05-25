<?php

namespace App\Http\Controllers\Peminjam;

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
        $data = Peminjaman::with('alat')
            ->where('nama_peminjam', auth()->user()->name)
            ->latest()
            ->get();

        return view('peminjam.peminjaman.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alat = Alat::where('stok', '>', 0)->get();
        return view('peminjam.peminjaman.create', compact('alat'));
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
            'jumlah_pinjam' => 'required|integer|min:1',
            'tgl_kembali' => 'nullable|date|after_or_equal:today'
        ]);

        $alat = Alat::findOrFail($request->alat_id);

        // 🔥 validasi stok
        if ($request->jumlah_pinjam > $alat->stok) {
            return back()->withErrors([
                'jumlah_pinjam' => 'Stok tidak mencukupi!'
            ])->withInput();
        }

        Peminjaman::create([
            'alat_id' => $request->alat_id,
            'petugas_id' => 1, // sementara (bisa kamu ubah nanti)
            'nama_peminjam' => auth()->user()->name,
            'jumlah_pinjam' => $request->jumlah_pinjam,
            'tgl_pinjam' => now(),
            'tgl_kembali' => $request->tgl_kembali,
            'status' => 'dipinjam'
        ]);

        // 🔹 kurangi stok
        $alat->decrement('stok', $request->jumlah_pinjam);

        return redirect()->route('peminjam.peminjaman.index')
            ->with('success', 'Berhasil meminjam alat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Peminjaman::where('id', $id)
            ->where('nama_peminjam', auth()->user()->name)
            ->firstOrFail();

        // 🔹 kembalikan stok
        $alat = $data->alat;
        $alat->increment('stok', $data->jumlah_pinjam);

        $data->delete();

        return redirect()->route('peminjam.peminjaman.index')
            ->with('success', 'Peminjaman dibatalkan');
    }
}
