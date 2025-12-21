<!DOCTYPE html>
<html>
<head>
    <title>SAW - Ranking Prodi</title>
</head>
<body>
<h2>Ranking Program Studi Berdasarkan Preferensi Anda</h2>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Prodi</th>
            <th>Nilai Preferensi</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ranking as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item['nama_prodi'] }}</td>
                <td>{{ $item['nilai_saw'] }}</td>
                <td>{{ $item['kategori_saw'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Tambahkan margin top supaya tombol tidak terlalu dekat -->
<div style="margin-top: 20px;">
    <form action="{{ route('saw.form') }}" method="get">
        <button type="submit" class="btn btn-primary">Kembali</button>
    </form>
</div>

</body>
</html>
