<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramStudi;

class ProgramStudiController extends Controller
{
    public function index()
    {
        $prodis = ProgramStudi::all();
        return view('admin.prodi.index', compact('prodis'));
    }

    public function create()
    {
        return view('admin.prodi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'jenjang_pendidikan' => 'required',
            'akreditasi' => 'nullable',
            'dosen_s2' => 'required|numeric',
            'dosen_s3' => 'required|numeric',
            'jumlah_mahasiswa' => 'required|numeric',
            'ukt_min' => 'required|numeric',
            'ukt_max' => 'required|numeric',
        ]);

        ProgramStudi::create($request->all());

        return redirect()->route('admin.prodi.index')
            ->with('success', 'Program Studi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $prodi = ProgramStudi::findOrFail($id);
        return view('admin.prodi.edit', compact('prodi'));
    }

    public function update(Request $request, $id)
    {
        $prodi = ProgramStudi::findOrFail($id);
        $prodi->update($request->all());

        return redirect()->route('admin.prodi.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        ProgramStudi::destroy($id);

        return redirect()->route('admin.prodi.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
