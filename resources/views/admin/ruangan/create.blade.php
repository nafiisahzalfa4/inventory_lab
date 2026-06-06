@extends('admin.template.layout')
@section('title', 'Tambah Ruangan')
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Tambah Ruangan
            </div>

            <form action="{{ route('admin.ruangan.store')}}" method="POST">
                {{ csrf_field() }}

                <div class="card-body table-responsive">

                    <div class="mb-3">
                        <label>Nama Ruangan</label>
                        <input type="text" name="nama_ruangan" class="form-control" value="{{ old('nama_ruangan') }}">
                        @error('nama_ruangan')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Penanggung Jawab</label>
                        <select name="petugas_id" class="form-control">
                            <option value="">-- pilih petugas --</option>
                            @foreach ($petugas as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_petugas }}</option>
                            @endforeach
                        </select>
                        @error('petugas_id')
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