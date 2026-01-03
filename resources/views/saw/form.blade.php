<!DOCTYPE html>
<html>
<head>
    <title>Input Bobot SAW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-label {
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            max-width: 180px;
            display: inline-block;
        }
        label + .form-control {
            margin-left: 10px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h3 class="mb-3">Input Bobot Kriteria</h3>

    <p class="text-muted">
        Masukkan tingkat kepentingan setiap kriteria dengan skala <strong>1 (sangat rendah)</strong>
        sampai <strong>10 (sangat tinggi)</strong>.
    </p>

    <form action="{{ route('saw.calculate') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label">Akreditasi</label>
            <input type="number" min="1" max="10" step="1"
                   name="akreditasi" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Jumlah Dosen S2</label>
            <input type="number" min="1" max="10" step="1"
                   name="dosen_s2" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Jumlah Dosen S3</label>
            <input type="number" min="1" max="10" step="1"
                   name="dosen_s3" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Jumlah Mahasiswa</label>
            <input type="number" min="1" max="10" step="1"
                   name="jumlah_mahasiswa" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">UKT</label>
            <input type="number" min="1" max="10" step="1"
                   name="ukt" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-4">
            Hitung SAW
        </button>
    </form>
</div>

</body>
</html>
