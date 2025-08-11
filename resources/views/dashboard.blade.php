<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Siswa</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-200 flex justify-center">
    <div class="mt-20">
        <p class="text-3xl font-bold text-gray-600 text-center mb-5 ">Data Siswa & Guru</p>
        <table class="text-center drop-shadow-lg">
            <th>
                <tr class="bg-linear-to-t from-sky-800 to-sky-600 text-white text-lg font-bold">
                    <td class="px-10 py-2">No</td>
                    <td class="px-10 py-2">Nama</td>
                    <td class="px-10 py-2">Nomor Induk</td>
                    <td class="px-10 py-2">Jam Scan Kartu</td>
                    <td class="px-10 py-2">Status Kehadiran</td>
                </tr>
            </th>
            <tbody class="bg-white text-md text-gray-600">
                @foreach ($scans as $s)
                    <tr class="py-1">
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $s->nama }}
                        </td>
                        <td>
                            {{ $s->nisn }}
                        </td>
                        <td>
                            {{ $s->created_at }}
                        </td>
                        <td class="p-2">
                            @if ($s->status === 'tepat_waktu')
                                <div class="bg-green-500 rounded-full px-3 py-1 text-white font-semibold">
                                    Tepat Waktu
                                </div>
                            @else
                                <div class="bg-red-500 rounded-full px-3 py-1 text-white font-semibold">
                                    Terlambat
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-end">
            <form action="{{ url('/export-pdf') }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-red-300 font-bold text-red-800 p-2 mt-5 rounded-md hover:bg-red-400 transition-all duration-200 ease-in-out hover:scale-105">
                    Export PDF
                </button>
            </form>
        </div>
    </div>
</body>

</html>
