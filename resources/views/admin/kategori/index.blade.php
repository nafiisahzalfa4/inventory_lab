@extends('admin.template.layout')
@section('title', 'Kategori')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Kategori
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>
                                <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm">Tambah Kategori</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $v)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->nama_kategori }}</td>
                            <td>{{ $v->deskripsi }}</td>
                            <td>
                                <form action="{{ route('kategori.destroy', $v->id) }}" method="POST" style="display:inline">
                                    {{ csrf_field() }}
                                    @method('DELETE')

                                    <a href="{{ route('kategori.edit', $v->id) }}" class="btn btn-success btn-sm">Edit</a>

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