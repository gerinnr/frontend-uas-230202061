<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;


class MatkulController extends Controller
{
    public function index()
     {
         $response = Http::get('http://localhost:8080/matkul');
 
         if ($response->successful()) {
             $data = $response->json();
             return view('dataMatkul', ['matkul' => $data ?? []]);
         }
 
         return view('dataMatkul', ['matkul' => [], 'error' => 'Gagal mengambil data mata kuliah']);
     }

       public function create()
    {
        return view('dataMatkul');
    }

    // Menyimpan data matkul baru
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'sks' => 'required|integer'
        ]);
    
        // Kirim data ke API CodeIgniter
        $response = Http::post('http://localhost:8080/matkul', $validated);
    
        // Jika berhasil
        if ($response->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Mata kuliah berhasil ditambahkan.');
        }
    
        // Jika gagal, tampilkan pesan error
        return back()->withErrors(['msg' => $response->json()['messages']['error'] ?? 'Gagal menambah data.'])->withInput();
    }

    public function edit($kode_matkul)
    {
        $response = Http::get("http://localhost:8080/matkul/{$kode_matkul}");

        if ($response->successful()) {
            $matkul = $response->json();
            return view('editMatkul', ['matkul' => $matkul]);
        }

        return redirect()->route('matkul.index')->withErrors(['error' => 'Data tidak ditemukan.']);
    }

    // Menyimpan update data matkul
    public function update(Request $request, $kode_matkul)
    {
        $response = Http::put("http://localhost:8080/matkul/{$kode_matkul}", [
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks'         => $request->sks,
        ]);

        if ($response->status() === 200) {
            return redirect()->route('matkul.index')->with('success', 'Data berhasil diperbarui.');
        }

        return back()->withErrors(['error' => 'Gagal memperbarui data.'])->withInput();
    }

    public function destroy($kode_matkul)
    {
        $response = Http::delete("http://localhost:8080/matkul/{$kode_matkul}");

        if ($response->status() === 200) {
            return redirect()->route('matkul.index')->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->route('matkul.index')->withErrors(['error' => 'Gagal menghapus data.']);
    }

    public function exportPdf()
    {
        $response = Http::get('http://localhost:8080/matkul');
        if ($response->successful()) {
            $matkul = collect($response->json());
            $pdf = Pdf::loadView('pdf.cetak', compact('matkul')); 
            return $pdf->download('matkul.pdf');
        } else {
            return back()->with('error', 'Gagal mengambil data untuk PDF');
        }
    }
}
