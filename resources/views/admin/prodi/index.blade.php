<!DOCTYPE html>
<html>
<head>
    <title>Admin - Program Studi</title>
</head>
<body>

<h2>Data Program Studi</h2>

<a href="{{ route('admin.prodi.create') }}">Tambah Prodi</a>

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Nama Prodi</th>
        <th>Aksi</th>
    </tr>
    @foreach($prodis as $index => $prodi)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $prodi->nama_prodi }}</td>
        <td>
            <a href="{{ route('admin.prodi.edit', $prodi->id) }}">Edit</a>
            <form action="{{ route('admin.prodi.destroy', $prodi->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">
        Logout
    </button>
</form>
</body>
</html>
