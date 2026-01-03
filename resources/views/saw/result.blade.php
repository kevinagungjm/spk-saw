<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan SAW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">Hasil Perhitungan Metode SAW</h2>

    <!-- 1. Bobot Kriteria -->
    <h4>Bobot Kriteria (Hasil Normalisasi)</h4>
    <table class="table table-bordered w-50">
        <tr><th>Akreditasi</th><td>{{ round($bobot['akreditasi'], 4) }}</td></tr>
        <tr><th>Dosen S2</th><td>{{ round($bobot['dosen_s2'], 4) }}</td></tr>
        <tr><th>Dosen S3</th><td>{{ round($bobot['dosen_s3'], 4) }}</td></tr>
        <tr><th>Jumlah Mahasiswa</th><td>{{ round($bobot['jumlah_mahasiswa'], 4) }}</td></tr>
        <tr><th>UKT</th><td>{{ round($bobot['ukt'], 4) }}</td></tr>
    </table>

    <!-- 2. Ranking SAW -->
    <h4 class="mt-5">Hasil Perangkingan</h4>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Ranking</th>
                <th>Nama Prodi</th>
                <th>Nilai Preferensi</th>
                <th>Informasi Program Studi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ranking as $i => $r)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $r['nama_prodi'] }}</td>
                <td>{{ $r['nilai_saw'] }}</td>
                <td>
                    <button 
                        class="btn btn-sm btn-info"
                        data-bs-toggle="modal"
                        data-bs-target="#modal{{ $i }}">
                        Detail Prodi
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- 3. Log Perhitungan -->
    <h4 class="mt-5">Log Perhitungan SAW</h4>
    @foreach($logs as $log)
        <div class="card mb-3">
            <div class="card-header fw-bold">
                {{ $log['nama_prodi'] }}
            </div>
            <div class="card-body">
                <ul>
                    @foreach($log['detail'] as $k => $v)
                        <li>{{ $k }} = {{ round($v, 4) }}</li>
                    @endforeach
                </ul>
                <strong>Nilai SAW: {{ $log['hasil'] }}</strong>
            </div>
        </div>
    @endforeach

    <a href="{{ route('saw.form') }}" class="btn btn-secondary mt-4">Kembali</a>

</div>

<!-- MODAL DETAIL PRODI -->
@foreach($prodis as $index => $p)
<div class="modal fade" id="modal{{ $index }}" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail Program Studi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
            <tr><th>Nama Prodi</th><td>{{ $p->nama_prodi }}</td></tr>
            <tr><th>Jenjang</th><td>{{ $p->jenjang_pendidikan }}</td></tr>
            <tr><th>Akreditasi</th><td>{{ $p->akreditasi }}</td></tr>
            <tr><th>Dosen S2</th><td>{{ $p->dosen_s2 }}</td></tr>
            <tr><th>Dosen S3</th><td>{{ $p->dosen_s3 }}</td></tr>
            <tr><th>Jumlah Mahasiswa</th><td>{{ $p->jumlah_mahasiswa }}</td></tr>
            <tr><th>UKT</th><td>{{ $p->ukt_max }}</td></tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endforeach

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
