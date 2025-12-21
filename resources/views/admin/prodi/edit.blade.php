<!DOCTYPE html>
<html>
<head>
    <title>Edit Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Program Studi</h2>

    <form action="{{ route('admin.prodi.update', $prodi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Program Studi</label>
            <input type="text" name="nama_prodi" class="form-control" value="{{ $prodi->nama_prodi }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Jenjang Pendidikan</label>
            <input type="text" name="jenjang_pendidikan" class="form-control" value="{{ $prodi->jenjang_pendidikan }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Akreditasi</label>
            <input type="text" name="akreditasi" class="form-control" value="{{ $prodi->akreditasi }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Dosen S2</label>
            <input type="number" name="dosen_s2" class="form-control" value="{{ $prodi->dosen_s2 }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Dosen S3</label>
            <input type="number" name="dosen_s3" class="form-control" value="{{ $prodi->dosen_s3 }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Mahasiswa</label>
            <input type="number" name="jumlah_mahasiswa" class="form-control" value="{{ $prodi->jumlah_mahasiswa }}">
        </div>

        <div class="mb-3">
            <label class="form-label">UKT Minimum</label>
            <input type="number" name="ukt_min" class="form-control" value="{{ $prodi->ukt_min }}">
        </div>

        <div class="mb-3">
            <label class="form-label">UKT Maksimum</label>
            <input type="number" name="ukt_max" class="form-control" value="{{ $prodi->ukt_max }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.prodi.index') }}" class="btn btn-secondary ms-2">Kembali</a>
    </form>
</div>

</body>
</html>
