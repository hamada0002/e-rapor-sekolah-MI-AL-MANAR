{{-- resources/views/students/erapor.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Rapor {{ $student->name }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>e-Rapor Siswa: {{ $student->name }}</h2>
    <p>Kelas: {{ $student->class }}</p>
    <p>NIS: {{ $student->nis }}</p>

    <table>
        <thead>
            <tr>
                <th>Mata Pelajaran</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grades->getAttributes() as $subject => $score)
                @if (!in_array($subject, ['id', 'student_id', 'created_at', 'updated_at', 'total', 'ranking'])) {{-- Exclude fields --}}
                    <tr>
                        <td>{{ ucfirst(str_replace('_', ' ', $subject)) }}</td>
                        <td>{{ $score }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 20px;">Catatan Guru: {{ $grades->catatan_guru ?? 'Tidak ada catatan' }}</p>
</body>
</html>
