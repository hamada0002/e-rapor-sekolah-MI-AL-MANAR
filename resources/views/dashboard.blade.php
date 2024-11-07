<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Bagian info login -->
    <div class="pt-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian form pengisian pengumuman, hanya untuk admin -->
    @if(auth()->user()->role === 'admin')
        <div class="pt-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="font-semibold text-lg text-gray-900 dark:text-gray-100">Buat Pengumuman Baru</h3>

                        <form action="{{ route('announcements.store') }}" method="POST" class="mt-4">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul:</label>
                                <input type="text" id="title" name="title" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-gray-100" required>
                            </div>

                            <div class="mb-4">
                                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Isi Pengumuman:</label>
                                <textarea id="content" name="content" rows="4" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-gray-100" required></textarea>
                            </div>

                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Buat Pengumuman</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Bagian untuk menampilkan daftar pengumuman -->
    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-gray-100">Pengumuman</h3>

                    @if ($announcements->isEmpty())
                        <p class="mt-4">Tidak ada pengumuman.</p>
                    @else
                        <ul class="mt-4">
                            @foreach ($announcements as $announcement)
                                <li class="mb-4">
                                    <h4 class="font-semibold text-md text-gray-900 dark:text-gray-100">{{ $announcement->title }}</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">{{ $announcement->content }}</p>
                                    <small class="text-xs text-gray-500 dark:text-gray-400">Posted on {{ $announcement->created_at->format('Y-m-d') }}</small>

                                    <!-- Tombol hapus, hanya untuk admin -->
                                    @if(auth()->user()->role === 'admin')
                                        <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this announcement?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="mt-2 px-4 py-2 bg-red-600 text-white rounded-md">Delete</button>
                                        </form>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>