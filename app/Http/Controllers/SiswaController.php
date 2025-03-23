<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('admin.data-siswa', compact('siswas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'akademik' => 'required|integer|min:0|max:100',
            'minat' => 'required|integer|min:0|max:100',
            'bakat' => 'required|integer|min:0|max:100',
            'gaya_belajar' => 'required|integer|min:0|max:100',
        ]);
    
        // Simpan data siswa
        Siswa::create($request->all());
    
        // Redirect kembali ke halaman Data Siswa dengan pesan sukses
        return redirect('/admin/data-siswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'akademik' => 'required|string|max:50',
            'minat' => 'required|string|max:100',
            'bakat' => 'required|string|max:100',
            'gaya_belajar' => 'required|string|max:100',
        ]);
    
        $siswa = Siswa::findOrFail($id);
        $siswa->update([
            'nama' => $request->nama,
            'akademik' => $request->akademik,
            'minat' => $request->minat,
            'bakat' => $request->bakat,
            'gaya_belajar' => $request->gaya_belajar,
        ]);
    
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
    
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
    
}
