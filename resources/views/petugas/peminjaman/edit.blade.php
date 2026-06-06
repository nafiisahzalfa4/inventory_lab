@extends('petugas.template.layout')
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Edit Peminjaman
            </div>

            <form action="{{ route('petugas.peminjaman.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">

                    <div class="mb-3">
                        <label>Alat</label>
                        <select name="alat_id" class="form-control">
                            @foreach ($alat as $a)
                                <option value="{{ $a->id }}" {{ $data->alat_id == $a->id ? 'selected' : '' }}>
                                    {{ $a->nama_alat }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Nama Peminjam</label>
                        <input type="text" name="nama_peminjam" class="form-control" value="{{ $data->nama_peminjam }}">
                    </div>

                    <div class="mb-3">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah_pinjam" class="form-control" value="{{ $data->jumlah_pinjam }}">
                    </div>

                    <div class="mb-3">
                        <label>Tgl Pinjam</label>
                        <input type="date" name="tgl_pinjam" class="form-control" value="{{ $data->tgl_pinjam }}">
                    </div>

                    <div class="mb-3">
                        <label>Tgl Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control" value="{{ $data->tgl_kembali }}">
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="dipinjam" {{ $data->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="dikembalikan" {{ $data->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection