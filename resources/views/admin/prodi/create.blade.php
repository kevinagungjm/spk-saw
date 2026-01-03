<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Program Studi</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tambah Program Studi</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.prodi.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Prodi</label>
                            <input type="text" name="nama_prodi" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenjang Pendidikan</label>
                            <input type="text" name="jenjang_pendidikan" class="form-control" placeholder="D3 / S1 / S2" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Akreditasi</label>
                            <input type="text" name="akreditasi" class="form-control" placeholder="A / B / Baik Sekali" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jumlah Dosen S2</label>
                                <input type="number" name="dosen_s2" class="form-control" min="0" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jumlah Dosen S3</label>
                                <input type="number" name="dosen_s3" class="form-control" min="0" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah Mahasiswa</label>
                            <input type="number" name="jumlah_mahasiswa" class="form-control" min="0" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">UKT Minimum</label>
                                <input type="number" name="ukt_min" class="form-control" min="0" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">UKT Maksimum</label>
                                <input type="number" name="ukt_max" class="form-control" min="0" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.prodi.index') }}" class="btn btn-secondary">
                                ← Kembali
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>
