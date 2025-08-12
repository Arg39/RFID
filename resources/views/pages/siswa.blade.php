@extends('templates.template', ['withSidebar' => true, 'activeMenu' => 'siswa'])

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('container')
    <div class="p-4">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar Siswa</h2>
        @php
            $headers = ['No', 'Nama', 'NISN', 'Email', 'Kelas', 'RFID Card UID', 'Aksi'];
            $rows = [];
            foreach ($students as $i => $student) {
                $aksi =
                    '
            <a href="' .
                    url('/siswa/edit', $student->id) .
                    '" class="inline-block px-2 py-1 text-xs text-white bg-blue-500 rounded hover:bg-blue-600 mr-1">Edit</a>
            <form action="' .
                    url('/siswa/destroy', $student->id) .
                    '" method="POST" style="display:inline;">
                ' .
                    csrf_field() .
                    method_field('DELETE') .
                    '
                <button type="submit" class="inline-block px-2 py-1 text-xs text-white bg-red-500 rounded hover:bg-red-600" onclick="return confirm(\'Yakin ingin menghapus?\')">Hapus</button>
            </form>
        ';
                $rows[] = [
                    $i + 1,
                    e($student->name),
                    e($student->nisn),
                    e($student->email),
                    e(optional($student->currentClass)->name ?? '-'),
                    e($student->rfid_card_uid ?? '-'),
                    $aksi,
                ];
            }
        @endphp
        <x-tables.table id="students-table" :headers="$headers" :rows="$rows" />
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#students-table').DataTable();
        });
    </script>
@endsection
