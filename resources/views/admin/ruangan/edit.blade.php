@extends('admin.template.layout')
@section('title', 'Perbarui Ruangan')
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Edit Ruangan
            </div>

            <div class="card-body table-responsive">
                <form action="{{ route('ruangan.update', $data->id)}}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')

                    <div class="mb-3">
                        <label>Nama Ruangan</label>
                        <input type="text" name="nama_ruangan" class="form-control" value="{{ $data->nama_ruangan }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Penanggung Jawab</label>
                        <select name="petugas_id" class="form-control">
                            @foreach ($petugas as $p)
                                <option value="{{ $p->id }}" {{ $data->petugas_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama_petugas }}
                                </option>
                            @endforeach
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