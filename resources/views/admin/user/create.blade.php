@extends('admin.template.layout')
@section('content')
<div class="col-6">
<div class="card">
<div class="card-header">Tambah User</div>

<form action="{{ route('admin.user.store') }}" method="POST">
@csrf

<div class="card-body">
    <input type="text" name="name" class="form-control mb-2" placeholder="Nama">
    <input type="email" name="email" class="form-control mb-2" placeholder="Email">
    <input type="password" name="password" class="form-control mb-2" placeholder="Password">

    <select name="role" class="form-control">
        <option value="">-- pilih role --</option>
        <option value="admin">Admin</option>
        <option value="petugas">Petugas</option>
        <option value="peminjam">Peminjam</option>
    </select>
</div>

<div class="card-footer">
    <button class="btn btn-primary btn-sm">Simpan</button>
</div>

</form>
</div>
</div>
@endsection