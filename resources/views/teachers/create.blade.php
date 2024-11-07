<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Data Guru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('teachers.store') }}" method="POST">
                        @csrf

                        @if ($errors->any())
                            <div class="mb-4 text-red-600">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 gap-4 mb-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Nama:
                                </label>
                                <input type="text" id="name" name="name" class="mt-1 block w-full rounded-md text-black" required />
                            </div>

                            <div>
                                <label for="position" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Posisi:</label>
                                <select id="position" name="position" class="mt-1 block w-full rounded-md text-black" required>
                                    <option value="">Pilih Posisi</option>
                                    <optgroup label="Wali Kelas">
                                        <option value="Wali Kelas 1A">Wali Kelas 1A</option>
                                        <option value="Wali Kelas 1B">Wali Kelas 1B</option>
                                        <option value="Wali Kelas 2A">Wali Kelas 2A</option>
                                        <option value="Wali Kelas 2B">Wali Kelas 2B</option>
                                        <option value="Wali Kelas 3A">Wali Kelas 3A</option>
                                        <option value="Wali Kelas 3B">Wali Kelas 3B</option>
                                        <option value="Wali Kelas 4A">Wali Kelas 4A</option>
                                        <option value="Wali Kelas 4B">Wali Kelas 4B</option>
                                        <option value="Wali Kelas 5A">Wali Kelas 5A</option>
                                        <option value="Wali Kelas 5B">Wali Kelas 5B</option>
                                        <option value="Wali Kelas 6A">Wali Kelas 6A</option>
                                        <option value="Wali Kelas 6B">Wali Kelas 6B</option>
                                    </optgroup>
                                    <optgroup label="Guru Mata Pelajaran">
                                        <option value="Bahasa Inggris">Guru Bahasa Inggris</option>
                                        <option value="PJOK">Guru PJOK</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div>
                                <label for="no_hp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Nomor HP:
                                </label>
                                <input type="text" id="no_hp" name="no_hp" class="mt-1 block w-full rounded-md text-black" required />
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Email:
                                </label>
                                <input type="email" id="email" name="email" class="mt-1 block w-full rounded-md text-black" required />
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Buat Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>