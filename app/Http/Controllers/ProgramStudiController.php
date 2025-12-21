<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    public function index()
    {
        $programStudis = ProgramStudi::all();
        
        return view('program_studi.index', compact('programStudis'));
    }

    public function sawResult(Request $request)
    {
        $totalBobot =
        $request->w_akreditasi +
        $request->w_dosen_s2 +
        $request->w_dosen_s3 +
        $request->w_jumlah_mahasiswa +
        $request->w_ukt;

        if (round($totalBobot, 2) != 1) {
            return back()->with('error', 'Total bobot harus = 1');
        }
        
        // 1️⃣ Ambil data Program Studi
        $programStudis = ProgramStudi::all();

        // 2️⃣ Konversi akreditasi ke angka (TARUH DI SINI)
        $akreditasiMap = [
            'A' => 5,
            'B' => 4,
            'C' => 3,
            'Tidak' => 2,
        ];

        // 3️⃣ Hitung UKT rata-rata
        foreach ($programStudis as $prodi) {
            $prodi->ukt_rata = ($prodi->ukt_min + $prodi->ukt_max) / 2;
        }

        // 4️⃣ Cari nilai max & min
        $maxAkreditasi = $programStudis->max(fn($p) => $akreditasiMap[$p->akreditasi]);
        $maxDosenS2 = $programStudis->max('dosen_s2');
        $maxDosenS3 = $programStudis->max('dosen_s3');
        $maxMahasiswa = $programStudis->max('jumlah_mahasiswa');
        $minUKT = $programStudis->min('ukt_rata');

        // 5️⃣ Normalisasi & hitung Vi
        $hasil = [];

        foreach ($programStudis as $prodi) {
            $rAkreditasi = $akreditasiMap[$prodi->akreditasi] / $maxAkreditasi;
            $rDosenS2 = $prodi->dosen_s2 / $maxDosenS2;
            $rDosenS3 = $prodi->dosen_s3 / $maxDosenS3;
            $rMahasiswa = $prodi->jumlah_mahasiswa / $maxMahasiswa;
            $rUKT = $minUKT / $prodi->ukt_rata;

            $nilaiVi =
                ($request->w_akreditasi * $rAkreditasi) +
                ($request->w_dosen_s2 * $rDosenS2) +
                ($request->w_dosen_s3 * $rDosenS3) +
                ($request->w_jumlah_mahasiswa * $rMahasiswa) +
                ($request->w_ukt * $rUKT);

            $hasil[] = [
                'nama_prodi' => $prodi->nama_prodi,
                'jenjang' => $prodi->jenjang_pendidikan,
                'nilai' => $nilaiVi,
            ];
        }

        // 6️⃣ Sorting (ranking)
        usort($hasil, fn($a, $b) => $b['nilai'] <=> $a['nilai']);

        // 7️⃣ Tampilkan hasil
        return view('saw.result', compact('hasil'));
    }

    public function sawForm()
    {
        return view('saw.form');
    }

    public function create()
    {
    return view('program_studi.create');
    }


    public function store(Request $request)
    {
    ProgramStudi::create([
        'nama_prodi' => $request->nama_prodi,
        'jenjang_pendidikan' => $request->jenjang_pendidikan,
        'akreditasi' => $request->akreditasi,
        'dosen_s2' => $request->dosen_s2,
        'dosen_s3' => $request->dosen_s3,
        'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
        'ukt_min' => $request->ukt_min,
        'ukt_max' => $request->ukt_max,
    ]);

    return redirect()->route('program-studi.index');
    }

    // Tambahkan fungsi untuk mengubah skor menjadi kategori
    private function kategoriSAW($nilai) {
    if($nilai >= 0.9) return 'Sangat Baik';
    elseif($nilai >= 0.8) return 'Baik';
    elseif($nilai >= 0.7) return 'Cukup';
    elseif($nilai >= 0.6) return 'Kurang';
    else return 'Buruk';
    }

    public function hasilSaw() {
    $prodis = ProgramStudi::all(); // atau data hasil perhitungan SAW

    // Konversi nilai SAW ke kategori
    foreach ($prodis as $prodi) {
        $prodi->kategori_saw = $this->kategoriSAW($prodi->nilai_saw);
    }

    return view('hasil', compact('prodis'));
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
    
}
