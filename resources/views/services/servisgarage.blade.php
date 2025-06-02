<!-- resources/views/servisGarage.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servis Sepeda Listrik</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofix2.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100">
<body class="bg-gray-100">
        <header>
            <h1>Bengkel Sepeda Listrik,Kendaraan Listrik, Motor Listrik HOKI</h1>
            <nav class="p-4 fixed top-0 w-full z-10 border-b border-black" style="background-color: #f97316">
    <div class="container mx-auto flex flex-auto justify-between items-center">
        <!-- Mobile menu button -->
        <button id="menu-btn" class="block md:hidden text-white focus:outline-none order-1 md:order-none transition-transform duration-300">
            <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path id="line1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16"></path>
                <path id="line2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12h16"></path>
                <path id="line3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 18h16"></path>
            </svg>
        </button>

        <!-- Logo and Title -->
        <a href="http://127.0.0.1:8000" id="logo-container" class="hover:text-gray-900 text-white text-xl font-bold flex items-center md:ml-0 ml-auto order-2 md:order-none">
            Selis Molis Hoki
            <div class="ml-1 p-1 rounded-full border-1 border-black flex-auto items-center justify-center">
                <img src="images/logofix2.png" alt="Logo Perusahaan" class="h-10 md:h-10 lg:h-12 w-auto rounded-full">
            </div>
        </a>


        <!-- Desktop and mobile menu -->
        <ul id="menu" class="hidden flex-col md:flex md:flex-row md:space-x-8 text-white mt-4 md:mt-0 md:items-center transition-all duration-300 ease-in-out relative top-full left-0 w-full md:static md:w-auto bg-orange-500 md:bg-transparent">
            <li class="w-full md:w-auto"><a href="home#services" class="block py-2 px-4 bg-orange-500 hover:bg-yellow-700 rounded transition-colors duration-300 ease-in-out text-center">Servis</a></li>
            <li class="w-full md:w-auto"><a href="home#cek-status" class="block py-2 px-4 bg-orange-500 hover:bg-yellow-700 rounded transition-colors duration-300 ease-in-out text-center">Cek Status</a></li>
            <li class="w-full md:w-auto"><a href="home#testimoni" class="block py-2 px-4 bg-orange-500 hover:bg-yellow-700 rounded transition-colors duration-300 ease-in-out text-center">Testimoni</a></li>
            <li class="w-full md:w-auto"><a href="home#faq" class="block py-2 px-4 bg-orange-500 hover:bg-yellow-700 rounded transition-colors duration-300 ease-in-out text-center">FAQ</a></li>
            <li class="w-full md:w-auto"><a href="home#aboutus" class="block py-2 px-4 bg-orange-500 hover:bg-yellow-700 rounded transition-colors duration-300 ease-in-out text-center">Tentang Kami</a></li>
            <li class="w-full md:w-auto"><a href="home#contact" class="block py-2 px-4 bg-orange-500 hover:bg-yellow-700 rounded transition-colors duration-300 ease-in-out text-center">Kontak</a></li>
        </ul>
    </div>
</nav>

<!-- JavaScript for handling dropdown with animation -->
<script>
    const menuBtn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');
    const menuIcon = document.getElementById('menu-icon');
    const line1 = document.getElementById('line1');
    const line2 = document.getElementById('line2');
    const line3 = document.getElementById('line3');
    const logoContainer = document.getElementById('logo-container'); // Reference to the logo container

    menuBtn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        menu.classList.toggle('block');

        // Toggle the icon appearance
        if (menu.classList.contains('hidden')) {
            line1.setAttribute('d', 'M4 6h16');
            line2.setAttribute('d', 'M4 12h16');
            line3.setAttribute('d', 'M4 18h16');
            line3.classList.remove('hidden');
            logoContainer.classList.remove('hidden'); // Show logo when menu is hidden
        } else {
            line1.setAttribute('d', 'M6 4L18 20');
            line2.setAttribute('d', 'M6 20L18 4');
            line3.classList.add('hidden');
            logoContainer.classList.add('hidden'); // Hide logo when menu is opened
        }
    });

    // Adding smooth scroll
    menu.addEventListener('click', function(event) {
        const targetId = event.target.getAttribute('href');
        if (targetId.startsWith('#')) {
            event.preventDefault();
            const targetElement = document.querySelector(targetId);
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
    });

</script>

    <main>
        <!-- Form Section -->
        <section id="form" class="py-16 isolate bg-gray-100 px-6 sm:py-32 lg:px-8 pt-36">
            <div class="container mx-auto max-w-lg sm:max-w-2xl">
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <!-- Tombol Back -->
                    <div class="flex items-center mb-4">
                        <button onclick="window.history.back()" class="flex items-center text-orange-600 hover:text-orange-800 transition duration-300 ease-in-out">
                            <svg class="h-6 w-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            <span class="font-semibold text-lg">Kembali</span>
                        </button>
                    </div>

                    <div class="text-center">
                        <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-gray-900">Formulir Servis di Bengkel</h2>
                        <p class="mt-2 text-base sm:text-lg leading-7 sm:leading-8 text-gray-600">Isi formulir di bawah ini untuk reservasi jadwal servis sepeda listrik Anda.</p>
                    </div>
                    <form id="reservation-form" action="{{ route('services.submitGarage') }}" method="POST" enctype="multipart/form-data" class="mx-auto mt-10 sm:mt-16 max-w-md sm:max-w-xl">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Nama Lengkap -->
                            <div>
                                <label for="name" class="block text-sm font-semibold leading-6 text-black">Nama Lengkap</label>
                                <div class="mt-2.5">
                                    <input type="text" id="name" placeholder="Tulis nama lengkap anda" name="namaLengkap" required class="block w-full rounded-md border-0 px-3 py-2 shadow-sm ring-1 ring-inset ring-blue-300 focus:ring-2 focus:ring-blue-400 sm:text-sm">
                                </div>
                            </div>
                            <!-- Nomor Telepon -->
                            <div>
                                <label for="phone" class="block text-sm font-semibold leading-6 text-black">Nomor WhatsApp/Telepon</label>
                                <div class="mt-2.5">
                                    <input type="text" id="phone" placeholder="Tulis nomor WA/Telp anda" name="noTelp" required class="block w-full rounded-md border-0 px-3 py-2 shadow-sm ring-1 ring-inset ring-blue-300 focus:ring-2 focus:ring-blue-400 sm:text-sm">
                                </div>
                            </div>
                            <!-- Alamat -->
                            <div class="sm:col-span-2">
                                <label for="address" class="block text-sm font-semibold leading-6 text-black">Alamat Lengkap</label>
                                <div class="mt-2.5">
                                    <textarea id="address" placeholder="Tulis alamat lengkap beserta patokan rumah anda" name="alamatLengkap" rows="3" required class="block w-full rounded-md border-0 px-3 py-2 shadow-sm ring-1 ring-inset ring-blue-300 focus:ring-2 focus:ring-blue-400 sm:text-sm"></textarea>
                                </div>
                            </div>
                            <!-- Jenis Kerusakan -->
                            <div class="sm:col-span-2">
                                <label for="damage_type" class="block text-sm font-semibold leading-6 text-black">Jenis Kerusakan</label>
                                <div class="mt-2.5">
                                    <select id="damage_type" name="idJenisKerusakan" required class="block w-full rounded-md border-0 px-3 py-2 shadow-sm ring-1 ring-inset ring-blue-300 focus:ring-2 focus:ring-blue-400 sm:text-sm">
                                        <option value="">Pilih Jenis Kerusakan</option>
                                        @foreach($jenisKerusakan as $kerusakan)
                                            <option value="{{ $kerusakan->id }}">{{ $kerusakan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Deskripsi Kerusakan -->
                            <div class="sm:col-span-2">
                                <label for="damage_description" class="block text-sm font-semibold leading-6 text-black">Deskripsi Kerusakan</label>
                                <div class="mt-2.5">
                                    <textarea id="damage_description" placeholder="Dekripsikan secara jelas kerusakan kendaraan anda" name="deskripsi" rows="4" required class="block w-full rounded-md border-0 px-3 py-2 shadow-sm ring-1 ring-inset ring-blue-300 focus:ring-2 focus:ring-blue-400 sm:text-sm"></textarea>
                                </div>
                            </div>
                            <!-- Input Jadwal -->
                            <div class="sm:col-span-2">
                                <label for="tanggal" class="block text-sm font-semibold leading-6 text-black">Tanggal</label>
                                <div class="mt-2.5">
                                    <input type="date" name="tanggal" id="tanggal" class="block w-full rounded-md border-0 px-3 py-2 shadow-sm ring-1 ring-inset ring-blue-300 focus:ring-2 focus:ring-blue-400 sm:text-sm" value="{{ old('tanggal') }}" required>
                                    @error('tanggal')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="waktuMulai" class="block text-sm font-semibold leading-6 text-black">Waktu Mulai</label>
                                <div class="mt-2.5">
                                    <select name="waktuMulai" id="waktuMulai" class="block w-full rounded-md border-0 px-3 py-2 shadow-sm ring-1 ring-inset ring-blue-300 focus:ring-2 focus:ring-blue-400 sm:text-sm" required>
                                        <option value="">Pilih Waktu Mulai</option>
                                        @for ($hour = 8; $hour <= 17; $hour++)
                                            <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                        @endfor
                                    </select>
                                    @error('waktuMulai')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="waktuSelesai" class="block text-sm font-semibold leading-6 text-black">Waktu Selesai</label>
                                <div class="mt-2.5">
                                    <select name="waktuSelesai" id="waktuSelesai" class="block w-full rounded-md border-0 px-3 py-2 shadow-sm ring-1 ring-inset ring-blue-300 focus:ring-2 focus:ring-blue-400 sm:text-sm" required>
                                        <option value="">Pilih Waktu Selesai</option>
                                        @for ($hour = 9; $hour <= 18; $hour++) <!-- Waktu selesai harus lebih dari waktu mulai -->
                                            <option value="{{ sprintf('%02d:00', $hour) }}">{{ sprintf('%02d:00', $hour) }}</option>
                                        @endfor
                                    </select>
                                    @error('waktuSelesai')
                                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Upload Gambar Kerusakan -->
                            <div class="sm:col-span-2">
                                <label for="damage_image" class="block text-sm font-semibold leading-6 text-black">Upload Gambar Kerusakan</label>
                                <div class="mt-2.5">
                                    <input type="file" id="damage_image" name="gambar" accept="image/*" required class="block w-full rounded-md border-0 px-3 py-2 shadow-sm ring-1 ring-inset ring-blue-300 focus:ring-2 focus:ring-blue-400 sm:text-sm">
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                            <button style="background-color: #ea580c" type="submit" class="block w-full rounded-md px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm">Reservasi Jadwal Servis</button>
                        </div>

                        <!-- Elemen Loading -->
                        <div id="loading" class="hidden flex items-center justify-center mt-4">
                            <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-orange-600"></div>
                            <span class="ml-2 text-gray-600">Memproses...</span>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer>
        @include('layouts.footer')
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Estimasi harga berdasarkan jenis kerusakan
            const hargaMap = @json($jenisKerusakan->pluck('harga', 'id'));

            const selectKerusakan = document.getElementById('idJenisKerusakan');
            if (selectKerusakan) {
                selectKerusakan.addEventListener('change', function () {
                    const id = this.value;
                    const harga = hargaMap[id] ?? 0;
                    document.getElementById('estimasiHarga').textContent = `Rp ${harga.toLocaleString()}`;

                    const btnSubmitContainer = document.getElementById('btnSubmitContainer');
                    if (btnSubmitContainer) {
                        btnSubmitContainer.style.display = id ? 'block' : 'none';
                    }
                });
            }

            // JavaScript untuk AJAX dan penanganan SweetAlert
            const form = document.getElementById('reservation-form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // Mencegah submit form bawaan

                    const formData = new FormData(this);
                    const loadingElement = document.getElementById('loading');
                    loadingElement?.classList.remove('hidden');

                    fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        loadingElement?.classList.add('hidden');
                        if (data.success) {
                            Swal.fire({
                                title: 'Reservasi Berhasil',
                                html: 'No Resi Anda: ' + data.no_resi + '<br>Simpan No Resi anda untuk melihat status servis anda!',
                                icon: 'success',
                                showCancelButton: true,
                                confirmButtonText: 'Unggah Video Tambahan',
                                cancelButtonText: 'Kembali ke Beranda'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/upload-video?no_resi=' + data.no_resi;
                                } else {
                                    window.location.href = '/';
                                }
                            });
                        } else {
                            Swal.fire('Error', data.message, 'error');
                        }
                    })
                    .catch(error => {
                        loadingElement?.classList.add('hidden');
                        Swal.fire('Error', 'Terjadi kesalahan saat mengirim data.', 'error');
                        console.error('Error:', error);
                    });
                });
            }
        });
        </script>

</body>
</html>
