@extends('admin.template.layout')
@section('title', 'Perbarui Alat')
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Edit Alat
            </div>

            <div class="card-body table-responsive">
                <form action="{{ route('admin.alat.update', $data->id)}}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-control">
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}" {{ $data->kategori_id == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ruangan</label>
                        <select name="ruangan_id" class="form-control">
                            @foreach ($ruangan as $r)
                                <option value="{{ $r->id }}" {{ $data->ruangan_id == $r->id ? 'selected' : '' }}>
                                    {{ $r->nama_ruangan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Alat</label>
                        <input type="text" name="nama_alat" class="form-control" value="{{ $data->nama_alat }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Merek</label>
                        <input type="text" name="merek" class="form-control" value="{{ $data->merek }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ $data->stok }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kondisi</label>
                        <select name="kondisi" class="form-control">
                            <option value="baik" {{ $data->kondisi == 'baik' ? 'selected' : '' }}>Baik</option>
                            <option value="rusak" {{ $data->kondisi == 'rusak' ? 'selected' : '' }}>Rusak</option>
                            <option value="maintenance" {{ $data->kondisi == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
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
