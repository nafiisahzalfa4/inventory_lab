@extends('admin.template.layout')
@section('title', 'Perbarui Kategori')
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Edit Kategori
            </div>

            <div class="card-body table-responsive">
                <form action="{{ route('kategori.update', $data->id)}}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" value="{{ $data->nama_kategori }}" required>
                        @error('nama_kategori')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control">{{ $data->deskripsi }}</textarea>
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