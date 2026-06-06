<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'alat_id',
        'petugas_id',
        'nama_peminjam',
        'jumlah_pinjam',
        'tgl_pinjam',
        'tgl_kembali',
        'status'
    ];
}