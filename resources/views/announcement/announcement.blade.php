<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pengumuman</title>
</head>
<body>
    <h1>Buat Pengumuman</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('announcements.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required>{{ old('content') }}</textarea>
        </div>
        <button type="submit">Create</button>
    </form>

    <a href="{{ route('announcements.index') }}">Back to Announcements</a>
</body>
</html>
