<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
      public function index()
    {
        $response = Http::get('http://localhost:8080/mahasiswa');
        if ($response->successful()) {
            $mahasiswa = $response->json();
            return view('dataMhs', ['mahasiswa' => $mahasiswa]);
        }
        return view('dataMhs', ['mahasiswa' => [], 'error' => 'Gagal mengambil data dosen']);
    }
}
