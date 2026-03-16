<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard KRS - {{ $mahasiswa['nama'] }}</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
       
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-container {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e9ecef;
            font-weight: 600;
            color: #495057;
            padding: 1.25rem;
        }
        
        .card-header i {
            margin-right: 10px;
            color: #667eea;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
            color: #6c757d;
        }

        .btn {
            border-radius: 50px;
            padding: 0.375rem 1rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-primary {
            background-color: #667eea;
            border-color: #667eea;
        }
        .btn-primary:hover {
            background-color: #5a67d8;
            border-color: #5a67d8;
            transform: translateY(-2px);
        }
        
        .btn-success {
            background-color: #48bb78;
            border-color: #48bb78;
        }
        .btn-success:hover {
            background-color: #38a169;
            border-color: #38a169;
            transform: translateY(-2px);
        }

        .btn-danger {
            background-color: #f56565;
            border-color: #f56565;
        }
        .btn-danger:hover {
            background-color: #e53e3e;
            border-color: #e53e3e;
            transform: translateY(-2px);
        }
        
        .summary {
            font-size: 1.1rem;
            font-weight: bold;
        }
        
        .summary span {
            color: #667eea;
        }

        .student-info {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

    </style>
</head>
<body>

    <div class="container main-container">
        <!-- Header Informasi Mahasiswa -->
        <div class="card student-info">
            <div class="card-body">
                <h1 class="card-title text-center">
                    <i class="fas fa-graduation-cap"></i> Dashboard KRS
                </h1>
                <p class="text-center mb-0">
                    <strong>Nama:</strong> {{ $mahasiswa['nama'] }} | 
                    <strong>NIM:</strong> {{ $mahasiswa['nim'] }} | 
                    <strong>Jurusan:</strong> {{ $mahasiswa['jurusan'] }} | 
                    <strong>Semester:</strong> {{ $mahasiswa['semester_aktif'] }}
                </p>
            </div>
        </div>

        <!-- Kartu Rencana Studi (Mata Kuliah Diambil) -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-list-check"></i> Kartu Rencana Studi (Semester {{ $mahasiswa['semester_aktif'] }})
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Kode MK</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mataKuliahDiambil as $mk)
                                <tr>
                                    <td>{{ $mk['kode'] }}</td>
                                    <td>{{ $mk['nama'] }}</td>
                                    <td>{{ $mk['sks'] }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" onclick="alert('Fitur hapus belum tersedia')">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada mata kuliah yang diambil.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="summary mt-3">
                    Total SKS: <span>{{ $totalSKS }}</span>
                </div>
            </div>
        </div>

        <!-- Daftar Mata Kuliah Tersedia -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-book"></i> Daftar Mata Kuliah Tersedia
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Kode MK</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mataKuliahTersedia as $mk)
                                <tr>
                                    <td>{{ $mk['kode'] }}</td>
                                    <td>{{ $mk['nama'] }}</td>
                                    <td>{{ $mk['sks'] }}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" onclick="alert('Fitur tambah mata kuliah belum tersedia')">
                                            <i class="fas fa-plus-circle"></i> Ambil
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada mata kuliah tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="d-flex justify-content-end gap-2">
            <button class="btn btn-primary" onclick="alert('Fitur cetak KRS belum tersedia')">
                <i class="fas fa-print"></i> Cetak KRS
            </button>
            <button class="btn btn-success" onclick="alert('Fitur simpan perubahan belum tersedia')">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (untuk komponen interaktif, opsional untuk halaman statis ini) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>