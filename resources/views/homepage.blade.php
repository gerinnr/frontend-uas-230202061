<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - SIMON</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-tr from-blue-50 via-white to-green-50 font-[system-ui] leading-normal tracking-normal">

  <div class="flex flex-col min-h-screen">

    <!-- Top Header -->
    <header class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow z-10 w-full">
      <div class="max-w-full mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">🎓 SIMON - Sistem Informasi Monitoring Kehadiran Mahasiswa</h1>
        <span class="text-sm text-white flex items-center gap-1">
          Selamat datang, <strong>Admin</strong>
          <i class="fas fa-user-shield text-white ml-1"></i>
        </span>
      </div>
    </header>

    <!-- Body Container -->
    <div class="flex flex-1 overflow-hidden">

            <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg flex-shrink-0 border-r border-gray-300">
        <div class="p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">📚 Menu Navigasi</h2>
            <nav class="space-y-2">
            <a href="/" class="flex items-center gap-2 py-2 px-4 rounded-lg bg-blue-500 text-white font-medium shadow">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>
            <a href="{{ route('matkul.index') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg text-gray-700 hover:bg-blue-100 transition">
                <i class="fas fa-chalkboard-teacher"></i> Data Mata Kuliah
            </a>
            <a href="{{ route('mahasiswa.index') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg text-gray-700 hover:bg-blue-100 transition">
                <i class="fas fa-user-graduate"></i> Data Mahasiswa
            </a>
            </nav>
        </div>
        </aside>

      <!-- Main Content -->
      <main class="flex-1 p-8 overflow-y-auto bg-white border-l border-gray-300">

        <!-- Page Header -->
        <div class="mb-6">
          <h2 class="text-3xl font-bold text-gray-800">📊 Dashboard</h2>
          <p class="text-gray-500">Selamat datang di halaman utama sistem informasi kehadiran mahasiswa.</p>
        </div>

        <!-- Konten Dashboard -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

          <!-- Card 1 -->
          <div class="bg-white border rounded-xl shadow p-6 flex items-center gap-4">
            <div class="bg-blue-100 text-blue-600 p-4 rounded-full">
              <i class="fas fa-user-tie fa-2x"></i>
            </div>
            <div>
              <h3 class="text-lg font-semibold">Jumlah Matkul</h3>
              <p class="text-2xl font-bold text-gray-700">24</p>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="bg-white border rounded-xl shadow p-6 flex items-center gap-4">
            <div class="bg-green-100 text-green-600 p-4 rounded-full">
              <i class="fas fa-users fa-2x"></i>
            </div>
            <div>
              <h3 class="text-lg font-semibold">Jumlah Mahasiswa</h3>
              <p class="text-2xl font-bold text-gray-700">1200</p>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="bg-white border rounded-xl shadow p-6 flex items-center gap-4">
            <div class="bg-yellow-100 text-yellow-600 p-4 rounded-full">
              <i class="fas fa-building-columns fa-2x"></i>
            </div>
            <div>
              <h3 class="text-lg font-semibold">Total Prodi</h3>
              <p class="text-2xl font-bold text-gray-700">11</p>
            </div>
          </div>

        </div>

        <!-- Seksi Tambahan -->
        <div class="mt-10">
          <h3 class="text-xl font-semibold text-gray-800 mb-2">📅 Pengumuman Terbaru</h3>
          <ul class="list-disc ml-5 text-gray-600 space-y-1 text-sm">
            <li>Perkuliahan Semester Ganjil dimulai 1 September 2025.</li>
            <li>Batas akhir pengisian KRS: 25 Agustus 2025.</li>
            <li>Workshop dosen akan diadakan pada 10 Juni 2025.</li>
          </ul>
        </div>

      </main>
    </div>
  </div>

</body>
</html>