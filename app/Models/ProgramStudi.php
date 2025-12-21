<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_prodi',
        'jenjang_pendidikan',
        'akreditasi',
        'dosen_s2',
        'dosen_s3',
        'jumlah_mahasiswa',
        'ukt_min',
        'ukt_max',
    ];
}
