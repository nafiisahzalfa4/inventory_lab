@extends('admin.template.layout')
@section('title', 'Perbarui Petugas')
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Edit Petugas
            </div>

            <div class="card-body table-responsive">
                <form action="{{ route('admin.petugas.update', $data->id)}}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')

                    <div class="mb-3">
                        <label>Nama Petugas</label>
                        <input type="text" name="nama_petugas" class="form-control" value="{{ $data->nama_petugas }}" required>
                    </div>

                    <div class="mb-3">
                        <label>NIP</label>
                        <input type="text" name="nip" class="form-control" value="{{ $data->nip }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Telepon</label>
                        <input type="text" name="telp" class="form-control" value="{{ $data->telp }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $data->email }}" required>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endsection