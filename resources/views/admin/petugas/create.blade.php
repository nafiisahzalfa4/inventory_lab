 @extends('admin.template.layout')
 @section('title', 'Tambah Petugas')
@section('content')
 <div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Tambah Petugas
            </div>

            <form action="{{ route('admin.petugas.store')}}" method="POST">
                {{ csrf_field() }}

                <div class="card-body table-responsive">

                    <div class="mb-3">
                        <label>Nama Petugas</label>
                        <input type="text" name="nama_petugas" class="form-control" value="{{ old('nama_petugas') }}">
                        @error('nama_petugas')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>NIP</label>
                        <input type="text" name="nip" class="form-control" value="{{ old('nip') }}">
                        @error('nip')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Telepon</label>
                        <input type="text" name="telp" class="form-control" value="{{ old('telp') }}">
                        @error('telp')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
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