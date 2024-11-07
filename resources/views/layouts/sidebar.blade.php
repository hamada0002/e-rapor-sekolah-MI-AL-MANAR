<nav class="flex flex-col dark:bg-gray-800 h-full min-h-screen border-t">
    <div class="pt-8 pl-3">
        
        <div class="pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <i class="fa-solid fa-dashboard pr-2"></i>{{ __('Dashboard') }}
            </x-nav-link>
        </div>
        
        <div class="pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('teachers.index')" :active="request()->routeIs('teachers')">
                <i class="fa-solid fa-chalkboard-teacher pr-2"></i>{{ __('Data Guru') }}
            </x-nav-link>
        </div>
        
        @if(auth()->user()->role === 'admin')
        <div class="pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <a href="{{ route('students.create') }}" class="flex items-center text-gray-300 hover:text-white p-2 rounded-lg">
                <i class="fa-solid fa-user-plus pr-2"></i>
                <span>{{ __('Tambah Data Murid') }}</span>
            </a>
        </div>
        @endif
        
        <div class="pb-6 space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <div class="relative">
                <button onclick="toggleDropdown()" class="flex items-center text-gray-300 hover:text-white focus:outline-none">
                    <i class="fa-solid fa-school pr-2"></i>{{ __('Kelas') }}
                    <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                
                <div id="dropdownMenu" class="hidden bg-white dark:bg-gray-700 rounded shadow-lg mt-2 absolute z-10 max-h-60 overflow-y-auto w-48">
                    <a href="{{ route('students.class', ['class' => '1A']) }}" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Kelas 1A</a>
                    <a href="{{ route('students.class', ['class' => '1B']) }}" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Kelas 1B</a>
                    <a href="{{ route('students.class', ['class' => '2A']) }}" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Kelas 2A</a>
                    <a href="{{ route('students.class', ['class' => '2B']) }}" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Kelas 2B</a>
                    <a href="{{ route('students.class', ['class' => '3A']) }}" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Kelas 3A</a>
                    <a href="{{ route('students.class', ['class' => '3B']) }}" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Kelas 3B</a>
                    <a href="{{ route('students.class', ['class' => '4A']) }}" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Kelas 4A</a>
                    <a href="{{ route('students.class', ['class' => '4B']) }}" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Kelas 4B</a>
                    <a href="{{ route('students.class', ['class' => '5A']) }}" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Kelas 5A</a>
                    <a href="{{ route('students.class', ['class' => '5B']) }}" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Kelas 5B</a>
                    <a href="{{ route('students.class', ['class' => '6A']) }}" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Kelas 6A</a>
                    <a href="{{ route('students.class', ['class' => '6B']) }}" class="block px-4 py-2 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600">Kelas 6B</a>
                </div>
            </div>
        </div>

    </div>
</nav>

<script>
function toggleDropdown() {
    var dropdownMenu = document.getElementById('dropdownMenu');
    dropdownMenu.classList.toggle('hidden');
}
</script>
