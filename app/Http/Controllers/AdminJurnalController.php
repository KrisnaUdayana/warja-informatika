<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;

class AdminJurnalController extends Controller
{
    public function index()
    {
        $jurnals = Jurnal::orderBy('tahun', 'desc')->orderBy('judul')->paginate(10);
        return view('admin.jurnal.index', compact('jurnals'));
    }

    public function create()
    {
        return view('admin.jurnal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'jalur' => 'required',
            'tahun' => 'required',
            'link' => 'nullable',
        ]);
        Jurnal::create($request->all());
        return redirect()->route('admin.jurnal.index')->with('success', 'Jurnal berhasil ditambahkan');
    }

    public function edit(Jurnal $jurnal)
    {
        return view('admin.jurnal.edit', compact('jurnal'));
    }

    public function update(Request $request, Jurnal $jurnal)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'jalur' => 'required',
            'tahun' => 'required',
            'link' => 'nullable',
        ]);
        $jurnal->update($request->all());
        return redirect()->route('admin.jurnal.index')->with('success', 'Jurnal berhasil diupdate');
    }

    public function destroy(Jurnal $jurnal)
    {
        $jurnal->delete();
        return redirect()->route('admin.jurnal.index')->with('success', 'Jurnal berhasil dihapus');
    }
}
