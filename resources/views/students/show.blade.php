{{-- resources/views/students/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nilai Murid: ') . $student->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Tabel Nilai dalam Tampilan Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($student->grades->getAttributes() as $subject => $score)
                            @if (!in_array($subject, ['id', 'student_id', 'created_at', 'updated_at', 'total'])) {{-- Exclude "total" --}}
                                <div class="p-4 border border-gray-300 dark:border-gray-600 rounded-md">
                                    <span class="block font-semibold">{{ ucfirst(str_replace('_', ' ', $subject)) }}</span>
                                    <span class="block">{{ $score }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Tombol Download di Bawah -->
                    <div class="mt-6 flex justify-end">
                        <a href="{{ route('students.download-pdf', $student->id) }}" class="bg-green-600 text-white px-4 py-2 rounded">
                            Download e-Rapor
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
