@extends('admin.template.layout')
@section('title', 'Petugas')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Petugas
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Petugas</th>
                            <th>NIP</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>
                                <a href="{{ route('petugas.create') }}" class="btn btn-primary btn-sm">Tambah Petugas</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $v)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->nama_petugas }}</td>
                            <td>{{ $v->nip }}</td>
                            <td>{{ $v->telp }}</td>
                            <td>{{ $v->email }}</td>
                            <td>
                                <form action="{{ route('petugas.destroy', $v->id) }}" method="POST" style="display:inline">
                                    {{ csrf_field() }}
                                    @method('DELETE')

                                    <a href="{{ route('petugas.edit', $v->id) }}" class="btn btn-success btn-sm">Edit</a>

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