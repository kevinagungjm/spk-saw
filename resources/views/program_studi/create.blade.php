<!DOCTYPE html>
<html>
<head>
    <title>Tambah Program Studi</title>
</head>
<body>

<h2>Tambah Program Studi</h2>

<form action="{{ route('program-studi.store') }}" method="POST">
    @csrf

    <label>Nama Program Studi</label><br>
    <input type="text" name="nama_prodi" required><br><br>

    <label>Jenjang Pendidikan</label><br>
    <select name="jenjang_pendidikan" required>
        <option value="">-- Pilih Jenjang --</option>
        <option value="D3">D3</option>
        <option value="D4">D4</option>
        <option value="S1">S1</option>
        <option value="S2">S2</option>
    </select><br><br>

    <label>Akreditasi</label><br>
    <select name="akreditasi" required>
        <option value="">-- Pilih --</option>
        <option value="A">Unggul</option>
        <option value="B">Baik Sekali</option>
        <option value="C">Baik</option>
    </select><br><br>

    <label>Jumlah Dosen S2</label><br>
    <input type="number" name="dosen_s2" required><br><br>

    <label>Jumlah Dosen S3</label><br>
    <input type="number" name="dosen_s3" required><br><br>

    <label>Jumlah Mahasiswa</label><br>
    <input type="number" name="jumlah_mahasiswa" required><br><br>

    <label>UKT Minimum (Rp)</label><br>
    <input type="number" name="ukt_min" required>
    <br><br>

    <label>UKT Maksimum (Rp)</label><br>
    <input type="number" name="ukt_max" required>
    <br><br>


    <button type="submit">Simpan</button>
</form>

</body>
</html>
