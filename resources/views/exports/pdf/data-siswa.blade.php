<!DOCTYPE html>
<html>

<head>
    <title>Data Siswa</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #333;
            font-size: 12px;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        p {
            text-align: center;
            font-size: 12px;
            margin-bottom: 20px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #2c3e50;
            color: #fff;
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }

        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Footer style */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            font-size: 10px;
            text-align: center;
            color: #888;
        }
    </style>
</head>

<body>
    <h1>Data Siswa</h1>
    <p>Tanggal Cetak: {{ $date }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor Induk</th>
                <th>Tanggal Scan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userData as $user)
                <tr>
                    <td>{{ $user['nama'] }}</td>
                    <td>{{ $user['nisn'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($user['created_at'])->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak secara otomatis oleh Sistem Presensi &copy; {{ date('Y') }}
    </div>
</body>

</html>
