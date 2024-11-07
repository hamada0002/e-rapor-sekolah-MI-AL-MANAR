<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col">
        @include('layouts.navigation')

        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow flex items-center px-4 sm:px-6 lg:px-8 py-4">
                <!-- Hamburger Icon for Mobile (Moved to the Left) -->
                <div class="sm:hidden mr-4">
                    <button onclick="toggleSidebar()" class="text-gray-600 dark:text-gray-300 focus:outline-none">
                        ☰
                    </button>
                </div>
                <div>
                    {{ $header }}
                </div>
            </header>
        @endif

        <div class="flex-1 flex">
            <!-- Sidebar Menu -->
            <div id="sidebar" class="w-80 bg-white dark:bg-gray-800 fixed sm:relative sm:block hidden z-30 h-full transition-transform transform sm:translate-x-0 -translate-x-full">
                @include('layouts.sidebar')
            </div>

            <!-- Page Content Wrapper with Overflow Handling -->
            <div class="flex-1 overflow-x-auto"> <!-- Tambahkan overflow-x-auto untuk wrapper konten -->
                <main class="p-4 sm:p-6 lg:p-8"> <!-- Padding tambahan untuk memberikan ruang lebih -->
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

    <script>
    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full'); // Toggle kelas untuk menampilkan/menyembunyikan sidebar
        sidebar.classList.toggle('hidden'); // Toggle kelas hidden agar dapat muncul di layar kecil
    }
    </script>
</body>
</html>
