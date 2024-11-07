<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Data Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama:</label>
                            <input type="text" id="name" name="name" value="{{ $teacher->name }}" class="mt-1 block w-full rounded-md text-black" required>
                        </div>

                        <div class="mb-4">
                            <label for="position" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Posisi:</label>
                            <select id="position" name="position" class="mt-1 block w-full rounded-md text-black" required>
                                <option value="">Pilih Posisi</option>
                                <optgroup label="Wali Kelas">
                                    <option value="Wali Kelas 1A" {{ $teacher->position == 'Wali Kelas 1A' ? 'selected' : '' }}>Wali Kelas 1A</option>
                                    <option value="Wali Kelas 1B" {{ $teacher->position == 'Wali Kelas 1B' ? 'selected' : '' }}>Wali Kelas 1B</option>
                                    <option value="Wali Kelas 2A" {{ $teacher->position == 'Wali Kelas 2A' ? 'selected' : '' }}>Wali Kelas 2A</option>
                                    <option value="Wali Kelas 2B" {{ $teacher->position == 'Wali Kelas 2B' ? 'selected' : '' }}>Wali Kelas 2B</option>
                                    <option value="Wali Kelas 3A" {{ $teacher->position == 'Wali Kelas 3A' ? 'selected' : '' }}>Wali Kelas 3A</option>
                                    <option value="Wali Kelas 3B" {{ $teacher->position == 'Wali Kelas 3B' ? 'selected' : '' }}>Wali Kelas 3B</option>
                                    <option value="Wali Kelas 4A" {{ $teacher->position == 'Wali Kelas 4A' ? 'selected' : '' }}>Wali Kelas 4A</option>
                                    <option value="Wali Kelas 4B" {{ $teacher->position == 'Wali Kelas 4B' ? 'selected' : '' }}>Wali Kelas 4B</option>
                                    <option value="Wali Kelas 5A" {{ $teacher->position == 'Wali Kelas 5A' ? 'selected' : '' }}>Wali Kelas 5A</option>
                                    <option value="Wali Kelas 5B" {{ $teacher->position == 'Wali Kelas 5B' ? 'selected' : '' }}>Wali Kelas 5B</option>
                                    <option value="Wali Kelas 6A" {{ $teacher->position == 'Wali Kelas 6A' ? 'selected' : '' }}>Wali Kelas 6A</option>
                                    <option value="Wali Kelas 6B" {{ $teacher->position == 'Wali Kelas 6B' ? 'selected' : '' }}>Wali Kelas 6B</option>
                                </optgroup>
                                <optgroup label="Guru Mata Pelajaran">
                                    <option value="Bahasa Inggris" {{ $teacher->position == 'Bahasa Inggris' ? 'selected' : '' }}>Guru Bahasa Inggris</option>
                                    <option value="PJOK" {{ $teacher->position == 'PJOK' ? 'selected' : '' }}>Guru PJOK</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email:</label>
                            <input type="email" id="email" name="email" value="{{ $teacher->email }}" class="mt-1 block w-full rounded-md text-black" required>
                        </div>

                        <div class="mb-4">
                            <label for="no_hp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor HP:</label>
                            <input type="text" id="no_hp" name="no_hp" value="{{ $teacher->no_hp }}" class="mt-1 block w-full rounded-md text-black" required>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>