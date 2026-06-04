@extends('admin.template.layout')
@section('title', 'Ruangan')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Ruangan
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Ruangan</th>
                            <th>Penanggung Jawab</th>
                            <th>
                                <a href="{{ route('ruangan.create') }}" class="btn btn-primary btn-sm">Tambah Ruangan</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $v)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->nama_ruangan }}</td>
                            <td>{{ $v->petugas->nama_petugas ?? '-' }}</td>
                            <td>
                                <form action="{{ route('ruangan.destroy', $v->id) }}" method="POST" style="display:inline">
                                    {{ csrf_field() }}
                                    @method('DELETE')

                                    <a href="{{ route('ruangan.edit', $v->id) }}" class="btn btn-success btn-sm">Edit</a>

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