<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $class ? __('Kelola Data Murid Kelas ' . $class) : __('Kelola Data Murid') }}
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

                    <div class="mb-4">
                        <label for="sort" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Urutkan</label>
                        <select id="sort" name="sort" class="mt-1 block w-1/3 pl-2 pr-2 py-1 text-sm border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 rounded-md bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" onchange="location = this.value;">
                            <option value="{{ route('students.index', ['sort' => 'name', 'class' => $class]) }}" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama</option>
                            <option value="{{ route('students.index', ['sort' => 'ranking', 'class' => $class]) }}" {{ request('sort') == 'ranking' ? 'selected' : '' }}>Ranking</option>
                        </select>
                    </div>

                    <p class="mb-4 text-gray-600 dark:text-gray-300">
                        Wali Kelas: {{ $teacher->name ?? 'Tidak ada data wali kelas' }}
                    </p>

                    @if ($students->isEmpty())
                        <p class="text-center">Tidak ada data murid untuk kelas ini.</p>
                    @else
                        <table class="w-full mt-4 table-auto">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700">
                                    <th class="p-4 text-left">Ranking</th>
                                    <th class="p-4 text-left">Nama</th>
                                    <th class="p-4 text-left">Jenis Kelamin</th>
                                    <th class="p-4 text-left">Agama</th>
                                    <th class="p-4 text-left">NIS</th>
                                    @if(in_array(auth()->user()->role, ['guru', 'admin']))
                                        <th class="p-4 text-left">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td class="p-4">{{ $student->grades->ranking ?? 'N/A' }}</td>
                                        <td class="p-4">
                                            <a href="{{ route('students.show', $student->id) }}" class="text-gray-900 dark:text-gray-100 no-underline hover:underline">
                                                {{ $student->name }}
                                            </a>
                                        </td>
                                        <td class="p-4">{{ $student->gender }}</td>
                                        <td class="p-4">{{ $student->religion }}</td>
                                        <td class="p-4">{{ $student->nis }}</td>
                                        @if(in_array(auth()->user()->role, ['guru', 'admin']))
                                            <td class="p-4">
                                                @if(auth()->user()->role === 'guru')
                                                    <a href="{{ route('students.input-nilai', $student->id) }}" class="text-blue-600">Input Nilai</a>
                                                @endif
                                                @if(auth()->user()->role === 'admin')
                                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apa Kau Yakin Ingin Menghapus Data Ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 ml-4">Hapus</button>
                                                    </form>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
