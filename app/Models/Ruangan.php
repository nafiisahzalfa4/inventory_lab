<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';
    protected $fillable = ['nama_ruangan', 'petugas_id'];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'petugas_id', 'id');
    }

    public function alat()
    {
        return $this->hasMany(Alat::class, 'ruangan_id', 'id');
    }
}
