<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardKrsController extends Controller
{
    /**
     * Menampilkan halaman dashboard KRS mahasiswa.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // --- DATA CONTOH MAHASISWA ---
        // Nanti bisa diambil dari session atau database berdasarkan user yang login
        $mahasiswa = [
            'nim' => '3312501007',
            'nama' => 'Nabila fatin',
            'jurusan' => 'Teknik Informatika',
            'semester_aktif' => 2,
        ];

        // --- DATA CONTOH MATA KULIAH YANG SUDAH DIAMBIL ---
        $mataKuliahDiambil = [
            ['kode' => 'IF501', 'nama' => 'Pemrograman Web', 'sks' => 3],
            ['kode' => 'IF502', 'nama' => 'Basis Data', 'sks' => 4],
            ['kode' => 'IF503', 'nama' => 'Jaringan Komputer', 'sks' => 3],
        ];

        // --- DATA CONTOH MATA KULIAH YANG TERSEDIA ---
        $mataKuliahTersedia = [
            ['kode' => 'IF504', 'nama' => 'Proyek Pembuatan Prototipe', 'sks' => 3],
            ['kode' => 'IF505', 'nama' => 'Pemrograman Berorientasi Objek', 'sks' => 3],
            ['kode' => 'IF506', 'nama' => 'Dasar Rekayasa Perangkat Lunak', 'sks' => 4],
        ];

        // --- HITUNG TOTAL SKS ---
        $totalSKS = array_sum(array_column($mataKuliahDiambil, 'sks'));

        // Kirim semua data ke view
        return view('dashboard.krs', compact(
            'mahasiswa',
            'mataKuliahDiambil',
            'mataKuliahTersedia',
            'totalSKS'
        ));
    }
}