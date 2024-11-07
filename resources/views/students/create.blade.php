{{-- resources/views/students/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Data Murid') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                            <input type="text" name="name" id="name" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md text-black">
                        </div>

                        <div class="mb-4">
                            <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md text-black">
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="religion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Agama</label>
                            <input type="text" name="religion" id="religion" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md text-black">
                        </div>

                        <div class="mb-4">
                            <label for="class" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kelas dan Subkelas</label>
                            <select name="class" id="class" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md text-black">
                                <option value="1A">1A</option>
                                <option value="1B">1B</option>
                                <option value="2A">2A</option>
                                <option value="2B">2B</option>
                                <option value="3A">3A</option>
                                <option value="3B">3B</option>
                                <option value="4A">4A</option>
                                <option value="4B">4B</option>
                                <option value="5A">5A</option>
                                <option value="5B">5B</option>
                                <option value="6A">6A</option>
                                <option value="6B">6B</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="nis" class="block text-sm font-medium text-gray-700 dark:text-gray-300">NIS</label>
                            <input type="text" name="nis" id="nis" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md text-black">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
