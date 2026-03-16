<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $daftarMataKuliah = [
            [
                'kode_mk' => 'IF001',
                'nama_mk' => 'Pemrograman Web',
                'sks' => 3,
                'dosen' => 'Dr. Budi Santoso, S.Kom., M.Kom.'
            ],
            [
                'kode_mk' => 'IF002',
                'nama_mk' => 'Basis Data',
                'sks' => 4,
                'dosen' => 'Prof. Siti Aminah, S.Kom., M.T.'
            ],
            [
                'kode_mk' => 'IF003',
                'nama_mk' => 'Algoritma dan Struktur Data',
                'sks' => 3,
                'dosen' => 'Ahmad Fauzi, S.T., M.Kom.'
            ],
            [
                'kode_mk' => 'IF004',
                'nama_mk' => 'Jaringan Komputer',
                'sks' => 3,
                'dosen' => 'Diana Putri, S.Kom., M.Eng.'
            ],
        ];

        return view('home.matkul', compact('daftarMataKuliah'));
    }
}