@extends('admin.template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                User
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>
                                <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm">Tambah</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $v)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->name }}</td>
                            <td>{{ $v->email }}</td>
                            <td>{{ $v->role }}</td>
                            <td>
                                <form action="{{ route('admin.user.destroy', $v->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('admin.user.edit', $v->id) }}" class="btn btn-success btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Delete</button>
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