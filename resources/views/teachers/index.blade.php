<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('teachers.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Buat Data Baru</a>
                    @endif

                    <table class="w-full mt-4 table-auto overflow-x-auto">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="p-4 text-left">Nama</th>
                                <th class="p-4 text-left">Email</th>
                                <th class="p-4 text-left">Nomor HP</th>
                                <th class="p-4 text-left">Posisi</th>
                                @if(auth()->user()->role === 'admin')
                                    <th class="p-4 text-left">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td class="p-4">{{ $teacher->name }}</td>
                                    <td class="p-4">{{ $teacher->email }}</td>
                                    <td class="p-4">{{ $teacher->no_hp }}</td>
                                    <td class="p-4">{{ $teacher->position }}</td>
                                    @if(auth()->user()->role === 'admin')
                                        <td class="p-4">
                                            <a href="{{ route('teachers.edit', $teacher->id) }}" class="text-blue-600">Edit</a>
                                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apa Kau Yakin Ingin Menghapus Akun Ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 ml-4">Delete</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>