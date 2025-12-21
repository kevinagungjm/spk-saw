<?php

namespace App\Imports;

use App\Models\ProgramStudi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProgramStudiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ProgramStudi([
            'nama_prodi' => $row['nama_prodi'],
            'jenjang_pendidikan' => $row['jenjang_pendidikan'],
            'akreditasi' => $row['akreditasi'],
            'dosen_s2' => $row['dosen_s2'] ?? 0,
            'dosen_s3' => $row['dosen_s3'] ?? 0,
            'jumlah_mahasiswa' => $row['jumlah_mahasiswa'] ?? 0,
            'ukt_min' => $row['ukt_min'] ?? 0,
            'ukt_max' => $row['ukt_max'] ?? 0,
        ]);
    }
}
