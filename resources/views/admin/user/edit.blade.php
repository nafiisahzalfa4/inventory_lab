@extends('admin.template.layout')
@section('content')
<div class="col-6">
<div class="card">
<div class="card-header">Edit User</div>

<form action="{{ route('admin.user.update', $data->id) }}" method="POST">
@csrf
@method('PUT')

<div class="card-body">
    <input type="text" name="name" value="{{ $data->name }}" class="form-control mb-2">
    <input type="email" name="email" value="{{ $data->email }}" class="form-control mb-2">
    <input type="password" name="password" class="form-control mb-2" placeholder="Kosongkan jika tidak diubah">

    <select name="role" class="form-control">
        <option value="admin" {{ $data->role=='admin'?'selected':'' }}>Admin</option>
        <option value="petugas" {{ $data->role=='petugas'?'selected':'' }}>Petugas</option>
        <option value="peminjam" {{ $data->role=='peminjam'?'selected':'' }}>Peminjam</option>
    </select>
</div>

<div class="card-footer">
    <button class="btn btn-success btn-sm">Update</button>
</div>

</form>
</div>
</div>
@endsection