<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'petugas';
    protected $fillable = ['nama_petugas', 'nip', 'telp', 'email'];

    public function ruangan()
    {
        return $this->hasMany(Ruangan::class, 'petugas_id', 'id');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'petugas_id', 'id');
    }
}
