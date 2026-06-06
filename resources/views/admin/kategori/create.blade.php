@extends('admin.template.layout')
@section('title', 'Tambah Kategori')
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Tambah Kategori
            </div>

            <form action="{{ route('admin.kategori.store')}}" method="POST">
                {{ csrf_field() }}

                <div class="card-body table-responsive">

                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori') }}">
                        @error('nama_kategori')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
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