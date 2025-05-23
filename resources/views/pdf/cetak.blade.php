<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 12px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .header h3 {
            margin: 4px 0;
            font-size: 16px;
        }

        .header p {
            margin: 2px 0;
            font-size: 11px;
        }

        .content {
            margin-top: 20px;
        }

        .content h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <h3>KEMENTERIAN PENDIDIKAN, TINGGI, SAINS, DAN TEKNOLOGI</h3>
        <h3>POLITEKNIK NEGERI CILACAP</h3>
        <p>Jalan Dr. Soetomo No. 1, Sidakaya - Cilacap 53212 Jawa Tengah</p>
        <p>Telepon: (0282) 533329, Fax: (0282) 537992</p>
        <p>www.pnc.ac.id | Email: sekretariat@pnc.ac.id</p>
    </div>

    <!-- Konten -->
    <div class="content">
        <h2>Data Mata Kuliah</h2>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th>SKS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($matkul as $index => $m)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td>{{ $m['kode_matkul'] }}</td>
                    <td>{{ $m['nama_matkul'] }}</td>
                    <td>{{ $m['sks'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>