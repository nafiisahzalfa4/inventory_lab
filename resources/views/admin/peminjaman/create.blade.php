@extends('admin.template.layout')
@section('title', 'Tambah Peminjaman')
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Tambah Peminjaman
            </div>

            <form action="{{ route('peminjaman.store')}}" method="POST">
                {{ csrf_field() }}

                <div class="card-body table-responsive">

                    <div class="mb-3">
                        <label>Alat</label>
                        <select name="alat_id" class="form-control">
                            <option value="">-- pilih alat --</option>
                            @foreach ($alat as $a)
                                <option value="{{ $a->id }}">{{ $a->nama_alat }}</option>
                            @endforeach
                        </select>
                        @error('alat_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Petugas</label>
                        <select name="petugas_id" class="form-control">
                            <option value="">-- pilih petugas --</option>
                            @foreach ($petugas as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_petugas }}</option>
                            @endforeach
                        </select>
                        @error('petugas_id')
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
                        @error('tgl_pinjam')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control">
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
@endsection