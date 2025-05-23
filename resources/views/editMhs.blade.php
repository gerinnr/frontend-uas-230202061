<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Data Mahasiswa</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
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
            <a href="/" class="flex items-center gap-2 py-2 px-4 rounded-lg text-gray-700 hover:bg-blue-100 transition">
              <i class="fas fa-chart-line"></i> Dashboard
            </a>
            <a href="{{ route('matkul.index') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg {{ request()->routeIs('matkul.*') ? 'bg-blue-500 text-white font-medium shadow' : 'text-gray-700 hover:bg-blue-100 transition' }}">
              <i class="fas fa-chalkboard-teacher"></i> Data MataKuliah
            </a>
            <a href="{{ route('mahasiswa.index') }}" class="flex items-center gap-2 py-2 px-4 rounded-lg {{ request()->routeIs('mahasiswa.*') ? 'bg-blue-500 text-white font-medium shadow' : 'text-gray-700 hover:bg-blue-100 transition' }}">
              <i class="fas fa-user-graduate"></i> Data Mahasiswa
            </a>
          </nav>
        </div>
      </aside>

      <!-- Main Form -->
      <main class="flex-1 flex items-center justify-center p-8 overflow-y-auto bg-white">
        <div class="w-full max-w-lg bg-white border border-gray-200 rounded-2xl shadow-lg p-8">
          <div class="mb-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800">✏️ Edit Data Mahasiswa</h2>
            <p class="text-gray-500 text-sm">Perbarui data mahasiswa sesuai kebutuhan</p>
          </div>

          <form action="{{ route('mahasiswa.update', $mahasiswa['npm']) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-1">NPM</label>
              <input type="text" name="npm" value="{{ old('npm', $mahasiswa['npm']) }}" placeholder="Masukkan NPM"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" required>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Mahasiswa</label>
              <input type="text" name="nama_mahasiswa" value="{{ old('nama_mahasiswa', $mahasiswa['nama_mahasiswa']) }}" placeholder="Masukkan Nama"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" required>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
              <input type="email" name="email" value="{{ old('email', $mahasiswa['email']) }}" placeholder="example@gmail.com"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" required>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-1">ID User</label>
              <select name="id_user" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                <option value="" disabled>Pilih ID User</option>
                @foreach ($user as $u)
                  <option value="{{ $u['id_user'] }}" {{ old('id_user', $mahasiswa['id_user']) == $u['id_user'] ? 'selected' : '' }}>
                    {{ $u['id_user'] }} - {{ $u['username'] }}
                  </option>
                @endforeach
              </select>
            </div>

            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-1">Kode Kelas</label>
              <select name="kode_kelas" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                <option value="" disabled>Pilih Kelas</option>
                @foreach ($kelas as $k)
                  <option value="{{ $k['kode_kelas'] }}" {{ old('kode_kelas', $mahasiswa['kode_kelas']) == $k['kode_kelas'] ? 'selected' : '' }}>
                    {{ $k['kode_kelas'] }} - {{ $k['nama_kelas'] }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="flex justify-end space-x-3 pt-2">
              <a href="{{ route('mahasiswa.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-arrow-left"></i> Batal
              </a>
              <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition duration-200">
                <i class="fas fa-save"></i> Update
              </button>
            </div>
          </form>
        </div>
      </main>

    </div>
  </div>

</body>
</html>
