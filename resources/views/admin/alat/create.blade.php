@extends('admin.template.layout')
@section('title', 'Tambah Alat')
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Tambah Alat
            </div>

            <form action="{{ route('admin.alat.store')}}" method="POST">
                {{ csrf_field() }}

                <div class="card-body table-responsive">

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-control">
                            <option value="">-- pilih kategori --</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ruangan</label>
                        <select name="ruangan_id" class="form-control">
                            <option value="">-- pilih ruangan --</option>
                            @foreach ($ruangan as $r)
                                <option value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>
                            @endforeach
                        </select>
                        @error('ruangan_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Alat</label>
                        <input type="text" name="nama_alat" class="form-control" value="{{ old('nama_alat') }}">
                        @error('nama_alat')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Merek</label>
                        <input type="text" name="merek" class="form-control" value="{{ old('merek') }}">
                        @error('merek')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ old('stok') }}">
                        @error('stok')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kondisi</label>
                        <select name="kondisi" class="form-control">
                            <option value="">-- pilih kondisi --</option>
                            <option value="baik">Baik</option>
                            <option value="rusak">Rusak</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                        @error('kondisi')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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