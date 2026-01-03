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
        // 1. Ambil bobot mentah (1–10)
        $bobotInput = $request->validate([
            'akreditasi' => 'required|numeric|min:1|max:10',
            'dosen_s2' => 'required|numeric|min:1|max:10',
            'dosen_s3' => 'required|numeric|min:1|max:10',
            'jumlah_mahasiswa' => 'required|numeric|min:1|max:10',
            'ukt' => 'required|numeric|min:1|max:10',
        ]);

        // 2. Hitung total bobot
        $totalBobot = array_sum($bobotInput);

        // 3. Normalisasi bobot
        $bobot = [];
        foreach ($bobotInput as $key => $value) {
            $bobot[$key] = $value / $totalBobot;
        }

        // 4. Ambil data prodi
        $prodis = ProgramStudi::all();

        // 5. Ambil nilai MAX (benefit) dan MIN (cost)
        $max_s2  = $prodis->max('dosen_s2');
        $max_s3  = $prodis->max('dosen_s3');
        $max_mhs = $prodis->max('jumlah_mahasiswa');

        // COST → ambil nilai MIN
        $min_ukt = $prodis->where('ukt_max', '>', 0)->min('ukt_max');

        $ranking = [];
        $logs = [];

        foreach ($prodis as $prodi) {

            // 6. Normalisasi SAW
            $n_akreditasi = $this->nilaiAkreditasi($prodi->akreditasi);
            $n_s2  = $max_s2 > 0  ? $prodi->dosen_s2 / $max_s2 : 0;
            $n_s3  = $max_s3 > 0  ? $prodi->dosen_s3 / $max_s3 : 0;
            $n_mhs = $max_mhs > 0 ? $prodi->jumlah_mahasiswa / $max_mhs : 0;

            // COST → RUMUS DIBALIK
           $n_ukt = ($prodi->ukt_max > 0 && $min_ukt > 0)
                ? $min_ukt / $prodi->ukt_max
                : 0;

            // 7. Hitung nilai preferensi SAW
            $score =
                ($n_akreditasi * $bobot['akreditasi']) +
                ($n_s2 * $bobot['dosen_s2']) +
                ($n_s3 * $bobot['dosen_s3']) +
                ($n_mhs * $bobot['jumlah_mahasiswa']) +
                ($n_ukt * $bobot['ukt']);

            // 8. Simpan ranking
            $ranking[] = [
                'nama_prodi' => $prodi->nama_prodi,
                'nilai_saw' => round($score, 4),
            ];

            // 9. Log perhitungan (untuk transparansi)
            $logs[] = [
                'nama_prodi' => $prodi->nama_prodi,
                'detail' => [
                    'Akreditasi' => round($n_akreditasi, 4),
                    'Dosen S2' => round($n_s2, 4),
                    'Dosen S3' => round($n_s3, 4),
                    'Jumlah Mahasiswa' => round($n_mhs, 4),
                    'UKT (Cost)' => round($n_ukt, 4),
                ],
                'hasil' => round($score, 4),
            ];
        }

        // 10. Urutkan ranking (DESC)
        usort($ranking, fn($a, $b) => $b['nilai_saw'] <=> $a['nilai_saw']);

        return view('saw.result', compact(
            'ranking',
            'bobot',
            'bobotInput',
            'prodis',
            'logs'
        ));
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

}
