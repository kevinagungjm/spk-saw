<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramStudi;

class SawController extends Controller
{
    // Menampilkan form input bobot
    public function form()
    {
        return view('saw.form');
    }

    // Menghitung ranking SAW
    public function calculate(Request $request)
    {
        $bobot = $request->validate([
            'akreditasi' => 'required|numeric|min:0|max:1',
            'dosen_s2' => 'required|numeric|min:0|max:1',
            'dosen_s3' => 'required|numeric|min:0|max:1',
            'jumlah_mahasiswa' => 'required|numeric|min:0|max:1',
            'ukt' => 'required|numeric|min:0|max:1',
        ]);

        if (round(array_sum($bobot), 2) != 1) {
            return back()->with('error', 'Total bobot harus 1');
        }

        $prodis = ProgramStudi::all();

        // ambil max setiap kriteria untuk normalisasi
        $max_s2 = $prodis->max('dosen_s2');
        $max_s3 = $prodis->max('dosen_s3');
        $max_mhs = $prodis->max('jumlah_mahasiswa');
        $max_ukt = $prodis->max('ukt_max');

        $ranking = [];

        foreach ($prodis as $prodi) {
            // normalisasi + hitung skor
            $score =
                ($this->nilaiAkreditasi($prodi->akreditasi) * $bobot['akreditasi']) +
                (($max_s2 > 0 ? $prodi->dosen_s2 / $max_s2 : 0) * $bobot['dosen_s2']) +
                (($max_s3 > 0 ? $prodi->dosen_s3 / $max_s3 : 0) * $bobot['dosen_s3']) +
                (($max_mhs > 0 ? $prodi->jumlah_mahasiswa / $max_mhs : 0) * $bobot['jumlah_mahasiswa']) +
                (($max_ukt > 0 ? $prodi->ukt_max / $max_ukt : 0) * $bobot['ukt']);

            $ranking[] = [
                'nama_prodi' => $prodi->nama_prodi,
                'nilai_saw' => round($score, 2),
                'kategori_saw' => $this->kategoriSaw($score),
            ];
        }

        // urut descending berdasarkan nilai SAW
        usort($ranking, fn($a, $b) => $b['nilai_saw'] <=> $a['nilai_saw']);

        return view('saw.result', compact('ranking'));
    }

    // Konversi akreditasi ke nilai numerik
    private function nilaiAkreditasi($akreditasi)
    {
        switch(strtoupper($akreditasi)) {
            case 'A': case 'UNGUL': case 'UNGGUL':
                return 1;
            case 'B': case 'BAIK SEKALI':
                return 0.8;
            case 'C': case 'BAIK':
                return 0.6;
            default:
                return 0.5; // jika kosong
        }
    }

    // Kategori SAW
    private function kategoriSaw($nilai)
    {
        if ($nilai >= 0.85) return 'Sangat Baik';
        if ($nilai >= 0.70) return 'Baik';
        if ($nilai >= 0.55) return 'Cukup';
        return 'Kurang';
    }
}
