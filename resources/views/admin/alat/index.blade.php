@extends('admin.template.layout')
@section('title', 'Alat')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Alat
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Ruangan</th>
                            <th>Nama Alat</th>
                            <th>Merek</th>
                            <th>Stok</th>
                            <th>Kondisi</th>
                            <th>
                                <a href="{{ route('alat.create') }}" class="btn btn-primary btn-sm">Tambah Alat</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $v)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->kategori->nama_kategori ?? '-' }}</td>
                            <td>{{ $v->ruangan->nama_ruangan ?? '-' }}</td>
                            <td>{{ $v->nama_alat }}</td>
                            <td>{{ $v->merek }}</td>
                            <td>{{ $v->stok }}</td>
                            <td>{{ $v->kondisi }}</td>
                            <td>
                                <form action="{{ route('alat.destroy', $v->id) }}" method="POST" style="display:inline">
                                    {{ csrf_field() }}
                                    @method('DELETE')

                                    <a href="{{ route('alat.edit', $v->id) }}" class="btn btn-success btn-sm">Edit</a>

                                    <button type="submit" onclick="return confirm('Are you sure want delete?')" class="btn btn-danger btn-sm">
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