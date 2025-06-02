<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="icon" type="image/png" href="images/logofix2.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Header -->
    <header class="bg-orange-500 text-white py-6 flex items-center justify-center space-x-4">
        <img src="{{ asset('images/logofix1.jpg') }}" alt="Company Logo" class="rounded-full h-12 w-12">
        <h1 class="text-center text-xl font-bold">Selamat Datang di Dashboard Admin, {{ Auth::user()->name }}</h1>
    </header>
    
    <!-- Navigation -->
    <nav class="bg-orange-500">
        <!-- Mobile Menu Button -->
        <div class="flex justify-between items-center px-4 py-4 md:hidden">
            <span class="text-white font-bold">Menu</span>
            <button id="dropdownButton" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <!-- Desktop Menu -->
        <div id="dropdownMenu" class="hidden md:flex md:justify-center md:space-x-4">
            <a href="{{ route('dashboard') }}" class="text-white font-bold uppercase hover:bg-orange-600 px-4 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-orange-600' : '' }}">Dashboard</a>
            <a href="{{ route('reservasi.index') }}" class="text-white font-bold uppercase hover:bg-orange-600 px-4 py-2 rounded-lg {{ request()->routeIs('reservasi.index') ? 'bg-orange-600' : '' }}">Daftar Reservasi</a>
            <a href="{{ route('reservasi.history') }}" class="text-white font-bold uppercase hover:bg-orange-600 px-4 py-2 rounded-lg {{ request()->routeIs('reservasi.history') ? 'bg-orange-600' : '' }}">History Reservasi</a>
            <a href="{{ route('jenis_kerusakan.index') }}" class="text-white font-bold uppercase hover:bg-orange-600 px-4 py-2 rounded-lg {{ request()->routeIs('jenis_kerusakan.index') ? 'bg-orange-600' : '' }}">Jenis Kerusakan</a>
            <a href="{{ route('jadwal.index') }}" class="text-white font-bold uppercase hover:bg-orange-600 px-4 py-2 rounded-lg {{ request()->routeIs('jadwal.index') ? 'bg-orange-600' : '' }}">Jadwal</a>
            <a href="{{ route('pelanggan.index') }}" class="text-white font-bold uppercase hover:bg-orange-600 px-4 py-2 rounded-lg {{ request()->routeIs('pelanggan.index') ? 'bg-orange-600' : '' }}">Pelanggan</a>
            

            
            <a href="{{ route('ulasan.index') }}" class="text-white font-bold uppercase hover:bg-orange-600 px-4 py-2 rounded-lg {{ request()->routeIs('ulasan.index') ? 'bg-orange-600' : '' }}">Ulasan</a>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div id="mobileDropdown" class="hidden md:hidden">
            <a href="{{ route('dashboard') }}" class="block text-white font-bold uppercase hover:bg-orange-600 px-4 py-2">Dashboard</a>
            <a href="{{ route('reservasi.index') }}" class="block text-white font-bold uppercase hover:bg-orange-600 px-4 py-2">Daftar Reservasi</a>
            <a href="{{ route('reservasi.history') }}" class="block text-white font-bold uppercase hover:bg-orange-600 px-4 py-2">History Reservasi</a>
            <a href="{{ route('jenis_kerusakan.index') }}" class="block text-white font-bold uppercase hover:bg-orange-600 px-4 py-2">Jenis Kerusakan</a>
            <a href="{{ route('jadwal.index') }}" class="block text-white font-bold uppercase hover:bg-orange-600 px-4 py-2">Jadwal</a>
            <a href="{{ route('pelanggan.index') }}" class="block text-white font-bold uppercase hover:bg-orange-600 px-4 py-2">Pelanggan</a>
            <a href="{{ route('ulasan.index') }}" class="block text-white font-bold uppercase hover:bg-orange-600 px-4 py-2">Ulasan</a>
        </div>
    </nav>

    <!-- Content Area -->
    <div class="container mx-auto mt-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            @yield('content')
        </div>
    </div>

    <!-- JavaScript for Dropdown -->
    <script>
        // Toggle the dropdown menu for mobile view
        const dropdownButton = document.getElementById('dropdownButton');
        const mobileDropdown = document.getElementById('mobileDropdown');

        dropdownButton.addEventListener('click', () => {
            mobileDropdown.classList.toggle('hidden');
        });
    </script>
</body>
</html>
