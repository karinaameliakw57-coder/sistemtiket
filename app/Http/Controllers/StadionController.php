<?php

namespace App\Http\Controllers;

use App\Models\Stadion;
use Illuminate\Http\Request;

class StadionController extends Controller
{
    // ================================
    // TAMPILAN LIST / INDEX
    // ================================
    public function index()
    {
        $stadion = Stadion::all();
        return view('stadion.index', compact('stadion'));
    }

    // ================================
    // TAMPILAN FORM TAMBAH
    // ================================
    public function create()
    {
        return view('stadion.create');
    }

    // PROSES SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'namaStadion' => 'required',
            'alamat' => 'required',
            'kapasitas' => 'required|integer'
        ]);

        Stadion::create($request->all());

        return redirect()->route('stadion.index')->with('success', 'Data stadion berhasil ditambahkan!');
    }

    // ================================
    // TAMPILAN EDIT
    // ================================
    public function edit($id)
    {
        $stadion = Stadion::findOrFail($id);
        return view('stadion.edit', compact('stadion'));
    }

    // PROSES UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaStadion' => 'required',
            'alamat' => 'required',
            'kapasitas' => 'required|integer'
        ]);

        $stadion = Stadion::findOrFail($id);
        $stadion->update($request->all());

        return redirect()->route('stadion.index')->with('success', 'Data stadion berhasil diperbarui!');
    }

    // ================================
    // HAPUS DATA
    // ================================
    public function destroy($id)
    {
        Stadion::findOrFail($id)->delete();
        return redirect()->route('stadion.index')->with('success', 'Data stadion dihapus!');
    }
}
