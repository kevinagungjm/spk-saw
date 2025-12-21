<!DOCTYPE html>
<html>
<head>
    <title>Data Program Studi</title>
</head>
<body>

<h2>Data Program Studi</h2>
<a href="{{ route('program-studi.create') }}">
    <button>+ Tambah Program Studi</button>
</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Nama Prodi</th>
        <th>Jenjang</th>
        <th>Akreditasi</th>
        <th>Dosen S2</th>
        <th>Dosen S3</th>
        <th>Jumlah Mahasiswa</th>
        <th>UKT</th>
    </tr>

    @foreach ($programStudis as $index => $prodi)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $prodi->nama_prodi }}</td>
        <td>{{ $prodi->jenjang_pendidikan }}</td>
        <td>{{ $prodi->akreditasi }}</td>
        <td>{{ $prodi->dosen_s2 }}</td>
        <td>{{ $prodi->dosen_s3 }}</td>
        <td>{{ $prodi->jumlah_mahasiswa }}</td>
         <td>
                Rp {{ number_format($prodi->ukt_min, 0, ',', '.') }}
                -
                Rp {{ number_format($prodi->ukt_max, 0, ',', '.') }}
            </td>
    </tr>
    @endforeach

</table>

</body>
</html>
