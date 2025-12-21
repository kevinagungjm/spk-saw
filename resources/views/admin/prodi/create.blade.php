<!DOCTYPE html>
<html>
<head>
    <title>Tambah Program Studi</title>
</head>
<body>

<h2>Tambah Program Studi</h2>

<form method="POST" action="{{ route('admin.prodi.store') }}">
    @csrf

    <div>
        <label>Nama Prodi</label><br>
        <input type="text" name="nama_prodi">
    </div><br>

    <div>
        <label>Jenjang Pendidikan</label><br>
        <input type="text" name="jenjang_pendidikan">
    </div><br>

    <div>
        <label>Akreditasi</label><br>
        <input type="text" name="akreditasi">
    </div><br>

    <div>
        <label>Dosen S2</label><br>
        <input type="number" name="dosen_s2">
    </div><br>

    <div>
        <label>Dosen S3</label><br>
        <input type="number" name="dosen_s3">
    </div><br>

    <div>
        <label>Jumlah Mahasiswa</label><br>
        <input type="number" name="jumlah_mahasiswa">
    </div><br>

    <div>
        <label>UKT Min</label><br>
        <input type="number" name="ukt_min">
    </div><br>

    <div>
        <label>UKT Max</label><br>
        <input type="number" name="ukt_max">
    </div><br>

    <button type="submit">Simpan</button>
</form>

<br>
<a href="{{ route('admin.prodi.index') }}">← Kembali</a>

</body>
</html>
