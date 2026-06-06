@extends('petugas.template.layout')
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Tambah Peminjaman
            </div>

            <form action="{{ route('petugas.peminjaman.store') }}" method="POST">
                @csrf

                <div class="card-body">

                    <div class="mb-3">
                        <label>Alat</label>
                        <select name="alat_id" class="form-control">
                            <option value="">-- Pilih Alat --</option>
                            @foreach ($alat as $a)
                                <option value="{{ $a->id }}">{{ $a->nama_alat }} (Stok: {{ $a->stok }})</option>
                            @endforeach
                        </select>
                        @error('alat_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Nama Peminjam</label>
                        <input type="text" name="nama_peminjam" class="form-control" value="{{ old('nama_peminjam') }}">
                        @error('nama_peminjam')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Jumlah Pinjam</label>
                        <input type="number" name="jumlah_pinjam" class="form-control" value="{{ old('jumlah_pinjam') }}">
                        @error('jumlah_pinjam')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tgl_pinjam" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control">
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection