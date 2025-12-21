<!DOCTYPE html>
<html>
<head>
    <title>Input Bobot SAW</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-label {
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 20px;
        }
        /* Supaya input lebih konsisten lebarnya dan tidak berdempetan */
        .form-control {
            max-width: 150px;
            display: inline-block;
        }
        /* Tambahkan jarak antara label dan input */
        label + .form-control {
            margin-left: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Input Bobot Kriteria</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('saw.calculate') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label">Akreditasi</label>
            <input type="number" step="0.01" min="0" max="1" name="akreditasi" class="form-control" value="{{ old('akreditasi') }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">Dosen S2</label>
            <input type="number" step="0.01" min="0" max="1" name="dosen_s2" class="form-control" value="{{ old('dosen_s2') }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">Dosen S3</label>
            <input type="number" step="0.01" min="0" max="1" name="dosen_s3" class="form-control" value="{{ old('dosen_s3') }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">Jumlah Mahasiswa</label>
            <input type="number" step="0.01" min="0" max="1" name="jumlah_mahasiswa" class="form-control" value="{{ old('jumlah_mahasiswa') }}" required>
        </div>

        <div class="form-group">
            <label class="form-label">UKT</label>
            <input type="number" step="0.01" min="0" max="1" name="ukt" class="form-control" value="{{ old('ukt') }}" required>
        </div>

        <div class="mt-3 mb-2 text-muted">
        Hasil seluruh kriteria ketika dijumlahkan nilainya harus <strong>1</strong>.
        </div>
        
        <!-- Tambahkan margin atas supaya tombol tidak terlalu dekat -->
        <button type="submit" class="btn btn-primary mt-4">Hitung SAW</button>
    </form>
</div>
</body>
</html>
