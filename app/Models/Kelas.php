<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'kode_kelas',
        'kode_mata_kuliah',
        'kode_dosen',
        'hari',
        'jam',
        'tahun_ajaran',
        'ruang_kelas',
        'jumlah_max',
        'semester',
    ];

    // relasi ke Matakuliah
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kode_mata_kuliah');
    }

    // relasi ke Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'kode_dosen');
    }

    // relasi ke KRSDetail jika ada
    public function krsDetails()
    {
        return $this->hasMany(KRSDetail::class, 'kelas_id');
    }
}
