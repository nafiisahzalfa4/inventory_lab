@extends('petugas.template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Peminjaman (Petugas)
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Alat</th>
                            <th>Jumlah</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th>Status</th>
                            <th>
                                <a href="{{ route('petugas.peminjaman.create') }}" class="btn btn-primary btn-sm">
                                    Tambah
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $v)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->nama_peminjam }}</td>
                            <td>{{ $v->alat->nama_alat }}</td>
                            <td>{{ $v->jumlah_pinjam }}</td>
                            <td>{{ $v->tgl_pinjam }}</td>
                            <td>{{ $v->tgl_kembali }}</td>
                            <td>{{ $v->status }}</td>
                            <td>
                                <form action="{{ route('petugas.peminjaman.destroy', $v->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('petugas.peminjaman.edit', $v->id) }}" class="btn btn-success btn-sm">
                                        Edit
                                    </a>

                                    <button type="submit" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection