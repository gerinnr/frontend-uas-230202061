<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Data Mahasiswa</title>
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


      <!-- Main Content -->
      <main class="flex-1 p-8 overflow-y-auto bg-white border-l border-gray-300">

        <!-- Page Header -->
        <div class="mb-6">
          <h2 class="text-3xl font-bold text-gray-800">📋 Data Mahasiswa</h2>
          <p class="text-gray-500">Berikut adalah data mahasiswa yang tersedia dalam sistem.</p>
        </div>

        <!-- Header Tabel -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-4">
          <div>
            <h3 class="text-xl font-semibold text-gray-800">Daftar Mahasiswa</h3>
            <p class="text-sm text-gray-500">Kelola data mahasiswa yang tersedia di sistem.</p>
          </div>

          <div class="flex flex-col md:flex-row items-center gap-2">
            <!-- Form Pencarian -->
            <form method="GET" action="{{ route('mahasiswa.index') }}" class="flex items-center border rounded-md overflow-hidden bg-white shadow-sm">
              <input type="text" name="search" placeholder="Search..." class="px-3 py-2 outline-none text-sm w-48" value="{{ request('search') }}">
              <button type="submit" class="bg-blue-600 text-white px-3 py-2 hover:bg-blue-700 text-sm">Cari</button>
            </form>

            <!-- Tombol Tambah -->
            <a href="{{ route('mahasiswa.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md text-sm hover:bg-green-700 shadow-sm">
              <i class="fas fa-plus"></i> Tambah Data
            </a>
          </div>
        </div>

        <!-- Tabel -->
        <div class="bg-white rounded-xl shadow p-4 overflow-auto border border-gray-200">
          <table class="min-w-full table-auto text-sm">
            <thead>
              <tr class="bg-blue-200 text-gray-800 uppercase text-xs">
                <th class="py-3 px-4 text-center border">No</th>
                <th class="py-3 px-4 text-center border">NPM</th>
                <th class="py-3 px-4 text-center border">Nama Mahasiswa</th>
                <th class="py-3 px-4 text-center border">Email</th>
                <th class="py-3 px-4 text-center border">ID User</th>
                <th class="py-3 px-4 text-center border">Kode Kelas</th>
                <th class="py-3 px-4 text-center border">Aksi</th>
              </tr>
            </thead>
            <tbody id="mahasiswaTableBody">
              @foreach ($mahasiswa as $index => $mhs)
              <tr class="hover:bg-blue-50 border-b">
                <td class="py-2 px-4 text-center">{{ $index + 1 }}</td>
                <td class="py-2 px-4 text-center">{{ $mhs['npm'] }}</td>
                <td class="py-2 px-4 text-center">{{ $mhs['nama_mahasiswa'] }}</td>
                <td class="py-2 px-4 text-center">{{ $mhs['email'] }}</td>
                <td class="py-2 px-4 text-center">{{ $mhs['id_user'] }}</td>
                <td class="py-2 px-4 text-center">{{ $mhs['nama_kelas'] }}</td>
                <td class="py-2 px-4 text-center space-x-1">
                  <a href="{{ route('mahasiswa.edit', $mhs['npm']) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 transition">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="{{ route('mahasiswa.destroy', $mhs['npm']) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition" onclick="return confirm('Yakin ingin menghapus data ini?')">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <!-- Pagination -->
          <div class="mt-4 flex justify-end">
            <div id="pagination" class="flex gap-2 items-center flex-wrap"></div>
          </div>
        </div>

      </main>
    </div>
  </div>

  <!-- Script Pagination -->
  <script>
    const rowsPerPage = 9;
    let currentPage = 1;
    const table = document.querySelector("#mahasiswaTableBody");
    const rows = [...table.querySelectorAll("tr")];
    const searchInput = document.querySelector('input[name="search"]');
    const paginationContainer = document.getElementById("pagination");

    function renderTable() {
      const query = searchInput.value.toLowerCase();
      const filtered = rows.filter(r => r.innerText.toLowerCase().includes(query));
      const totalPages = Math.ceil(filtered.length / rowsPerPage);
      table.innerHTML = "";
      filtered
        .slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage)
        .forEach(row => table.appendChild(row));
      renderPagination(totalPages);
    }

    function renderPagination(totalPages) {
      paginationContainer.innerHTML = "";

      const prevBtn = document.createElement("button");
      prevBtn.textContent = "Back";
      prevBtn.disabled = currentPage === 1;
      prevBtn.className = `px-3 py-1 rounded ${prevBtn.disabled ? 'bg-gray-200 text-gray-400 cursor-not-allowed' : 'bg-blue-500 text-white hover:bg-blue-600'}`;
      prevBtn.onclick = () => {
        if (currentPage > 1) {
          currentPage--;
          renderTable();
        }
      };
      paginationContainer.appendChild(prevBtn);

      for (let i = 1; i <= totalPages; i++) {
        const btn = document.createElement("button");
        btn.textContent = i;
        btn.className = `px-3 py-1 rounded ${i === currentPage ? 'bg-blue-700 text-white font-semibold' : 'bg-gray-200 hover:bg-gray-300'}`;
        btn.onclick = () => {
          currentPage = i;
          renderTable();
        };
        paginationContainer.appendChild(btn);
      }

      const nextBtn = document.createElement("button");
      nextBtn.textContent = "Next";
      nextBtn.disabled = currentPage >= totalPages;
      nextBtn.className = `px-3 py-1 rounded ${nextBtn.disabled ? 'bg-gray-200 text-gray-400 cursor-not-allowed' : 'bg-blue-500 text-white hover:bg-blue-600'}`;
      nextBtn.onclick = () => {
        if (currentPage < totalPages) {
          currentPage++;
          renderTable();
        }
      };
      paginationContainer.appendChild(nextBtn);
    }

    searchInput.addEventListener("input", () => {
      currentPage = 1;
      renderTable();
    });

    renderTable();
  </script>

</body>
</html>