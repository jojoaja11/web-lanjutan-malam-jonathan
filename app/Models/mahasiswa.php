<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'fullname',
        'nim',
        'nidn',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
    ];
}
