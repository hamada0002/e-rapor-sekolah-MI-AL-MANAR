<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Input Nilai Murid') }}
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

                    <form action="{{ route('students.store-nilai', $student->id) }}" method="POST">
                        @csrf

                        <!-- Grid Layout for Subject Grades -->
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach (['alquran_hadist', 'akidah_akhlak', 'fikih', 'sejarah_kebudayaan_islam', 'pkn', 'bahasa_indonesia', 'bahasa_inggris', 'bahasa_sunda', 'bahasa_arab', 'matematika', 'ipa', 'ips', 'sbk', 'pjok'] as $subject)
                                <div>
                                    <label for="{{ $subject }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ ucfirst(str_replace('_', ' ', $subject)) }}</label>
                                    <input type="number" name="{{ $subject }}" id="{{ $subject }}" value="{{ old($subject, $student->grades?->$subject) }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md text-black">
                                </div>
                            @endforeach
                        </div>

                        <!-- Attendance Section in Grid Layout -->
                        <div class="grid grid-cols-3 gap-4 mt-6">
                            <div>
                                <label for="izin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Izin</label>
                                <input type="number" name="izin" id="izin" value="{{ old('izin') }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md text-black">
                            </div>
                            <div>
                                <label for="sakit" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sakit</label>
                                <input type="number" name="sakit" id="sakit" value="{{ old('sakit') }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md text-black">
                            </div>
                            <div>
                                <label for="tanpa_keterangan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanpa Keterangan</label>
                                <input type="number" name="tanpa_keterangan" id="tanpa_keterangan" value="{{ old('tanpa_keterangan') }}" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md text-black">
                            </div>
                        </div>

                        <!-- Catatan Guru -->
                        <div class="mt-6">
                            <label for="catatan_guru" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Catatan Guru</label>
                            <textarea name="catatan_guru" id="catatan_guru" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md text-black">{{ old('catatan_guru', $student->grades?->catatan_guru) }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-6">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Nilai</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
