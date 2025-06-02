<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SELISMOLIS HOKI</title>
        <link rel="icon" type="image/png" href="images/logofix2.png">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
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
            <li class="w-full md:w-auto"><a href="#services" class="block py-2 px-4 bg-orange-500 hover:bg-yellow-700 rounded transition-colors duration-300 ease-in-out text-center">Servis</a></li>
            <li class="w-full md:w-auto"><a href="#cek-status" class="block py-2 px-4 bg-orange-500 hover:bg-yellow-700 rounded transition-colors duration-300 ease-in-out text-center">Cek Status</a></li>
            <li class="w-full md:w-auto"><a href="#testimoni" class="block py-2 px-4 bg-orange-500 hover:bg-yellow-700 rounded transition-colors duration-300 ease-in-out text-center">Testimoni</a></li>
            <li class="w-full md:w-auto"><a href="#faq" class="block py-2 px-4 bg-orange-500 hover:bg-yellow-700 rounded transition-colors duration-300 ease-in-out text-center">FAQ</a></li>
            <li class="w-full md:w-auto"><a href="#aboutus" class="block py-2 px-4 bg-orange-500 hover:bg-yellow-700 rounded transition-colors duration-300 ease-in-out text-center">Tentang Kami</a></li>
            <li class="w-full md:w-auto"><a href="#contact" class="block py-2 px-4 bg-orange-500 hover:bg-yellow-700 rounded transition-colors duration-300 ease-in-out text-center">Kontak</a></li>
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

                <!-- Hero Section -->
                <section class="relative w-full h-screen pt-10" style="z-index: 0;">
                    <div id="carouselExample" class="relative w-full h-screen overflow-hidden">
                        <!-- Slide 1 -->
                        <div class="carousel-item absolute inset-0 bg-cover bg-center transition-all duration-700" style="background-image: url('images/carousel1.jpg');">
                            <div class="absolute inset-0 bg-black bg-opacity-80 flex items-center justify-center">
                                <div class="container mx-auto text-center text-white">
                                    <h1 class="text-3xl font-bold mb-2">Selis Molis Hoki</h1>
                                    <h2 class="text-xl font-bold mb-2">Servis Kendaraan Listrik dan Sepeda Listrik Purwokerto.</h2>
                                    <p class="text-base mb-4">Perbaikan Sepeda Listrik Terpercaya, Cepat, dan Profesional.</p>
                                    <a href="#services" class="slide-button bg-yellow-500 drop-shadow-lg text-white px-6 py-3 rounded-full text-sm hover:bg-yellow-600">Reservasi Jadwal Servis Anda Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="carousel-item absolute inset-0 bg-cover bg-center transition-all duration-700" style="background-image: url('images/carousel2.jpg');">
                            <div class="absolute inset-0 bg-black bg-opacity-80 flex items-center justify-center">
                                <div class="container mx-auto text-center text-white">
                                    <h1 class="text-3xl font-bold mb-2">Selis Molis Hoki</h1>
                                    <h1 class="text-xl font-bold mb-2">Home Service dan Servis di Bengkel</h1>
                                    <p class="text-base mb-4">Siap Melayani Dimana Saja, Kapan Saja!</p>
                                    <a href="#services" class="slide-button bg-yellow-500 drop-shadow-2xl text-white px-6 py-3 rounded-full text-sm hover:bg-yellow-600">Servis Sekarang</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="carousel-item absolute inset-0 bg-cover bg-center transition-all duration-700" style="background-image: url('images/carousel3.jpg');">
                            <div class="absolute inset-0 bg-black bg-opacity-80 flex items-center justify-center">
                                <div class="container mx-auto text-center text-white">
                                    <h1 class="text-3xl font-bold mb-2">Selis Molis Hoki</h1>
                                    <h1 class="text-xl font-bold mb-2">Cek Status Perbaikan Anda</h1>
                                    <p class="text-base mb-4">Ingin tahu status perbaikan kendaraan anda? klik tombol di bawah ini</p>
                                    <a href="#cek-status" class="slide-button bg-yellow-500 drop-shadow-2xl text-white px-6 py-3 rounded-full text-sm hover:bg-yellow-600 ">Cek Status</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel Controls -->
                    <div class="absolute inset-y-1/2 left-4 transform -translate-y-1/2 text-3xl text-white cursor-pointer z-20 bg-black bg-opacity-50 rounded-full w-12 h-12 flex items-center justify-center hover:bg-opacity-80" id="prev">
                        &lt;
                    </div>
                    <div class="absolute inset-y-1/2 right-4 transform -translate-y-1/2 text-3xl text-white cursor-pointer z-20 bg-black bg-opacity-50 rounded-full w-12 h-12 flex items-center justify-center hover:bg-opacity-80" id="next">
                        &gt;
                    </div>
                </section>


                {{-- portofolio section --}}
                <section id="portofolio" class="mt-16">
                  <div
                    class="px-6 lg:px-40 py-20 border-t border-b bg-opacity-10"
                    style="background-image: url('https://www.toptal.com/designers/subtlepatterns/uploads/dot-grid.png'); background-size: cover; background-attachment: fixed;">

                    <h1 class="text-2xl md:text-3xl font-bold text-center">Selis Molis Hoki</h1>

                    <div class="flex justify-center mt-6">
                      <ul class="flex flex-wrap justify-center gap-6 text-lg font-bold">
                        <li><h2>Kendaraan Listrik</h2></li>
                        <li><h2>Sepeda Listrik</h2></li>
                        <li><h2>Motor Listrik</h2></li>
                        <li><h2>Skuter</h2></li>
                      </ul>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10 bg-white shadow-xl shadow-neutral-100 border">

                      <!-- Card 1 -->
                      <div class="p-8 flex flex-col items-center text-center transition-transform transform hover:scale-105 group hover:bg-slate-50 cursor-pointer">
                        <span class="text-4xl text-yellow-600"><i class="fas fa-home"></i></span>
                        <p class="text-lg mt-3 group-hover:text-yellow-600">Home Service</p>
                        <p class="mt-2 text-sm">Layanan servis di lokasi atau rumah Anda.</p>
                      </div>

                      <!-- Card 2 -->
                      <div class="p-8 flex flex-col items-center text-center transition-transform transform hover:scale-105 group hover:bg-slate-50 cursor-pointer">
                        <span class="text-4xl text-yellow-600"><i class="fas fa-wrench"></i></span>
                        <p class="text-xl mt-3 group-hover:text-yellow-600">Servis di Bengkel</p>
                        <p class="mt-2 text-sm">Servis lebih mendalam di bengkel kami.</p>
                      </div>

                      <!-- Card 3 -->
                      <div class="p-8 flex flex-col items-center text-center transition-transform transform hover:scale-105 group hover:bg-slate-50 cursor-pointer">
                        <span class="text-4xl text-yellow-600"><i class="fas fa-bicycle"></i></span>
                        <p class="text-xl mt-3 group-hover:text-yellow-600">Modifikasi</p>
                        <p class="mt-2 text-sm">Sesuaikan kendaraan dengan kebutuhan Anda.</p>
                      </div>

                      <!-- Card 4 -->
                      <div class="p-8 flex flex-col items-center text-center transition-transform transform hover:scale-105 group hover:bg-slate-50 cursor-pointer">
                        <span class="text-4xl text-yellow-600"><i class="fas fa-box"></i></span>
                        <p class="text-xl mt-3 group-hover:text-yellow-600">Sparepart</p>
                        <p class="mt-2 text-sm">Menyediakan suku cadang kendaraan listrik.</p>
                      </div>

                      <!-- Card 5 -->
                      <div class="p-8 flex flex-col items-center text-center transition-transform transform hover:scale-105 group hover:bg-slate-50 cursor-pointer">
                        <span class="text-4xl text-yellow-600"><i class="fas fa-money-bill-wave"></i></span>
                        <p class="text-xl mt-3 group-hover:text-yellow-600">Jual-Beli Sepeda Listrik</p>
                        <p class="mt-2 text-sm">Beli dan jual kendaraan listrik.</p>
                      </div>

                      <!-- Card 6 -->
                      <div class="p-8 flex flex-col items-center text-center transition-transform transform hover:scale-105 group hover:bg-slate-50 cursor-pointer">
                        <span class="text-4xl text-yellow-600"><i class="fas fa-battery-full"></i></span>
                        <p class="text-xl mt-3 group-hover:text-yellow-600">Custom Baterai</p>
                        <p class="mt-2 text-sm">Custom baterai sesuai kebutuhan Anda.</p>
                      </div>
                    </div>
                  </div>
                </section>


                <!-- Services Section -->
                <section id="services" style="background-color: #f8f8f8" class="py-16">
                    <div class="container mx-auto text-center">
                        <h2 class="text-2xl font-bold mt-8 mb-12 pt-8 text-gray-900">Layanan Servis Kami</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <!-- Home Service -->
                            <article>
                                <div class="bg-white p-8 rounded-lg drop-shadow-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                                    <a href="{{ route('services.servis') }}" class="block">
                                        <div class="overflow-hidden rounded-lg mb-6">
                                            <img src="images/homeservice.jpg" alt="Servis Sepeda Listrik" class="w-full h-48 object-cover transition-transform duration-300 ease-in-out transform hover:scale-105">
                                        </div>
                                    </a>
                                    <a href="{{ route('services.servis') }}" class="block">
                                        <h3 class="text-2xl font-semibold mb-4 text-gray-800 hover:text-gray-600">Home Service</h3>
                                    </a>
                                        <p class="text-black mb-6">
                                            Layanan servis kendaraan listrik langsung di rumah Anda oleh teknisi profesional kami <span class="font-bold">dengan biaya tambahan hanya 5rb/km</span>.
                                        </p>

                                    <a href="{{ route('services.servis') }}"
                                    style="background-color: #d97706"
                                    class="inline-block text-white px-5 py-3 min-w-[200px] rounded-full text-lg transition-colors duration-300 text-center"
                                    onmouseover="this.style.backgroundColor='#eab308'"
                                    onmouseout="this.style.backgroundColor='#d97706'">
                                    Reservasi sekarang
                                    </a>
                                </div>
                            </article>
                            <!-- Servis di Bengkel  -->
                            <article>
                                <div class="bg-white p-8 rounded-lg drop-shadow-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                                    <a href="{{ route('services.servisGarage') }}">
                                        <div class="overflow-hidden rounded-lg mb-6">
                                            <img src="images/garageservice.jpg" alt="Sparepart Sepeda Listrik" class="w-full h-48 object-cover transition-transform duration-300 ease-in-out transform hover:scale-105">
                                        </div>
                                    </a>
                                    <a href="{{ route('services.servisGarage') }}" class="block">
                                        <h3 class="text-2xl font-semibold mb-4 text-gray-800 hover:text-gray-800">Servis di Bengkel</h3>
                                    </a>
                                    <p class="text-black mb-6">Servis secara mendalam kendaraan listrik Anda di bengkel kami dengan peralatan yang lebih lengkap.</p>
                                    <a href="{{ route('services.servisGarage') }}"
                                    style="background-color: #d97706"
                                    class="inline-block text-white px-5 py-3 min-w-[200px] rounded-full text-lg transition-colors duration-300 text-center"
                                    onmouseover="this.style.backgroundColor='#eab308'"
                                    onmouseout="this.style.backgroundColor='#d97706'">
                                    Reservasi sekarang
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>

                {{-- cek status --}}
                <section id="cek-status" style="background-color: white" class="py-24 px-6">
                    <div class="container mx-auto text-center">
                        <!-- Judul Section -->
                        <h2 class="text-2xl font-bold mt-8 mb-8 text-gray-900">Cek Status Perbaikan</h2>

                        <!-- Paragraph Section -->
                        <p class="text-xl text-gray-700 mb-10">
                            Masukkan nomor resi perbaikan Anda untuk melihat status terkini dari unit yang sedang diperbaiki.
                        </p>

                        <!-- Form untuk Mengecek Status -->
                        <form id="status-form" class="w-full max-w-lg mx-auto">
                            <div class="flex flex-col md:flex-row items-center justify-center mb-8">
                                <input
                                    type="text"
                                    name="noResi"
                                    id="noResi"
                                    placeholder="Masukkan Nomor Resi"
                                    class="w-full px-5 py-4 text-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500 mb-4 md:mb-0 md:mr-4"
                                    required>
                                <button
                                    type="submit"
                                    class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none transition duration-300">
                                    Cek Status
                                </button>
                            </div>
                        </form>

                        <!-- Accordion for Results -->
                        <div id="status-result" class="w-full max-w-lg mx-auto mt-8 p-4 bg-white rounded-lg shadow-md hidden">
                            <button
                                class="toggle-button flex justify-between items-center w-full py-4 px-6 text-left bg-blue-500 text-white font-bold rounded-lg focus:outline-none focus:bg-blue-600"
                                type="button">
                                Hasil Pengecekan
                                <span id="chevron" class="ml-4 transition-transform duration-300">&#x25BC;</span>
                            </button>

                            <div id="status-details" class="max-h-0 overflow-hidden transition-all duration-300">
                                <!-- Status Summary -->
                                <div id="status-summary" class="text-left p-4 text-gray-800">
                                    <p><strong>Status:</strong> <span id="current-status"></span></p>
                                    <p><strong>Nama:</strong> <span id="nama-lengkap"></span></p>
                                    <p><strong>No. Telp:</strong> <span id="nomor-telp"></span></p>
                                </div>

                                <!-- Riwayat Status Table -->
                                <table class="table-auto w-full mt-4 text-left">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="p-2 text-gray-800">Tanggal</th>
                                            <th class="p-2 text-gray-800">Jam</th>
                                            <th class="p-2 text-gray-800">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="status-riwayat" class="text-gray-800">
                                        <!-- Dynamic rows will be inserted here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>



                {{-- testimoni section --}}
                <section id="testimoni" class="py-16 px-4 bg-gray-50 text-gray-900 overflow-hidden">
                    <div class="container mx-auto text-center h-full flex flex-col justify-center">
                        <h2 class="text-2xl font-bold mt-8 mb-6 lg:mb-12 pt-10 text-gray-900">Testimoni Pelanggan</h2>
                        <p class="text-lg md:text-xl mb-6 mx-4 lg:mx-0 text-gray-700">
                            Lihat apa yang pelanggan kami katakan tentang layanan kami. Kami berkomitmen untuk memberikan pelayanan terbaik untuk Anda.
                        </p>

                        <!-- Swiper Container -->
                        <div class="swiper-container w-full">
                            <div class="swiper-wrapper">
                                @foreach($ulasans as $index => $ulasan)
                                    <article class="swiper-slide py-12 p-6 lg:p-12 bg-white rounded-lg shadow-lg lg:text-xl" aria-labelledby="testimonial-{{ $index }}">
                                        <div class="testimoni-content">
                                            <!-- Star Rating -->
                                            <div class="flex justify-center mb-4">
                                                @for ($i = 0; $i < min($ulasan->rating, 5); $i++)
                                                    <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 15.27L16.18 19l-1.64-7.03L20 8.24l-7.19-.61L10 1 7.19 7.63 0 8.24l5.46 3.73L3.82 19z"/>
                                                    </svg>
                                                @endfor
                                            </div>

                                            <!-- Testimonial Text -->
                                            <p class="text-lg lg:text-2xl italic mb-4 text-gray-800">"{{ $ulasan->ulasan }}"</p>
                                            <p class="text-sm lg:text-lg text-gray-500" id="testimonial-{{ $index }}">- {{ strtoupper($ulasan->nama) }}</p>
                                        </div>
                                    </article>
                                @endforeach
                            </div>

                            <!-- Pagination Bullets -->
                            <div class="swiper-pagination mt-6"></div>
                        </div>
                    </div>
                </section>



                <!-- Link external CSS file -->
                <link rel="stylesheet" href="css/styles.css">
                <script src="{{ asset('swiper-init.js') }}"></script>


                {{-- faq section--}}
                <section id="faq" class="p-4 px-4 mt-0 mb-8 bg-gray-50 text-gray-900">
                    <div class="h-full max-w-6xl px-2 py-2 mx-auto mt-4 mb-4 tracking-wide md:px-4 md:mt-10">
                        <!-- Title -->
                        <div class="text-2xl font-bold mt-8 mb-4 lg:mb-8 pt-4 text-gray-900 text-center">Frequently Asked Questions</div>
                        <!-- End Title -->
                        <div class="text-lg font-normal mb-2 lg:mb-4 text-gray-900 text-center">Lihat apa yang sering pelanggan tanyakan pada kami</div>

                        <!-- Grid for FAQs -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Left Column (4 FAQs) -->
                            <div class="space-y-3">
                                <!-- 1 -->
                                <div x-data="accordion(1)" class="relative transition-all duration-700 border rounded-xl hover:shadow-2xl">
                                    <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                                        <div class="flex items-center justify-between">
                                            <span class="tracking-wide font-bold">Bagaimana cara merawat sepeda listrik agar awet?</span>
                                            <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0">
                                        <div class="px-6 pb-4 text-gray-600">Merawat sepeda listrik dengan baik dapat memperpanjang masa pakainya. Tips perawatan meliputi pengecekan rutin baterai, tekanan ban, dan pelumas rantai. Pastikan juga untuk mengisi daya baterai secara berkala dan tidak membiarkannya habis total.
                                        </div>
                                    </div>
                                </div>

                                <!-- 2 -->
                                <div x-data="accordion(2)" class="relative transition-all duration-700 border rounded-xl hover:shadow-2xl">
                                    <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                                        <div class="flex items-center justify-between">
                                            <span class="tracking-wide font-bold">Berapa lama umur baterai sepeda listrik?</span>
                                            <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0">
                                        <div class="px-6 pb-4 text-gray-600">Umur baterai sepeda listrik bergantung pada jenis dan kualitasnya, biasanya berkisar antara 2 hingga 5 tahun. Faktor lain seperti frekuensi penggunaan, cara pengisian daya, dan kondisi penyimpanan juga memengaruhi masa pakai baterai.</div>
                                    </div>
                                </div>

                                <!-- 3 -->
                                <div x-data="accordion(3)" class="relative transition-all duration-700 border rounded-xl hover:shadow-2xl">
                                    <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                                        <div class="flex items-center justify-between">
                                            <span class="tracking-wide font-bold">Apakah sepeda listrik memerlukan perawatan khusus?</span>
                                            <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0">
                                        <div class="px-6 pb-4 text-gray-600">Ya, sepeda listrik memerlukan perawatan tambahan seperti pengecekan sistem kelistrikan, terutama baterai dan motor. Selain itu, komponen mekanis seperti rantai, rem, dan ban juga perlu perawatan seperti pada sepeda biasa.</div>
                                    </div>
                                </div>

                                <!-- 4 -->
                                <div x-data="accordion(4)" class="relative transition-all duration-700 border rounded-xl hover:shadow-2xl">
                                    <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                                        <div class="flex items-center justify-between">
                                            <span class="tracking-wide font-bold">Apa saja komponen utama yang harus diganti secara berkala?</span>
                                            <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0">
                                        <div class="px-6 pb-4 text-gray-600">   Komponen yang perlu diganti secara berkala meliputi baterai, ban, rantai, dan rem. Baterai biasanya perlu diganti setelah beberapa tahun, sementara komponen mekanis seperti rantai dan ban tergantung pada frekuensi penggunaan.</div>
                                    </div>
                                </div>
                            </div>
                            {{-- Right Column(4Faq) --}}
                            <div class="space-y-3">
                                <!-- 8 -->
                                <div x-data="accordion(8)" class="relative transition-all duration-700 border rounded-xl hover:shadow-2xl">
                                    <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                                        <div class="flex items-center justify-between">
                                            <span class="tracking-wide font-bold">Bagaimana cara membersihkan sepeda listrik tanpa merusak komponen elektroniknya?</span>
                                            <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0">
                                        <div class="px-6 pb-4 text-gray-600">Bersihkan sepeda listrik dengan menggunakan kain lembap dan hindari menyemprotkan air langsung pada komponen elektronik seperti baterai dan motor. Pastikan juga area pengisian daya tetap kering selama pembersihan.</div>
                                    </div>
                                </div>

                                <!-- 5 -->
                                <div x-data="accordion(5)" class="relative transition-all duration-700 border rounded-xl hover:shadow-2xl">
                                    <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                                        <div class="flex items-center justify-between">
                                            <span class="tracking-wide font-bold">Bagaimana cara memilih baterai yang tepat untuk sepeda listrik?</span>
                                            <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0">
                                        <div class="px-6 pb-4 text-gray-600">Pemilihan baterai yang tepat tergantung pada kapasitas (Wh) dan tegangan (V) yang sesuai dengan sepeda Anda. Sebaiknya konsultasikan dengan teknisi atau baca spesifikasi sepeda listrik Anda sebelum membeli baterai baru.</div>
                                    </div>
                                </div>

                                <!-- 6 -->
                                <div x-data="accordion(6)" class="relative transition-all duration-700 border rounded-xl hover:shadow-2xl">
                                    <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                                        <div class="flex items-center justify-between">
                                            <span class="tracking-wide font-bold">Apakah suku cadang sepeda listrik mudah ditemukan?</span>
                                            <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0">
                                        <div class="px-6 pb-4 text-gray-600">   Sebagian besar suku cadang sepeda listrik seperti baterai, motor, dan komponen mekanis dapat ditemukan di bengkel resmi atau toko suku cadang. Pastikan untuk menggunakan suku cadang asli agar performa sepeda tetap optimal.</div>
                                    </div>
                                </div>

                                <!-- 7 -->
                                <div x-data="accordion(7)" class="relative transition-all duration-700 border rounded-xl hover:shadow-2xl">
                                    <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                                        <div class="flex items-center justify-between">
                                            <span class="tracking-wide font-bold">Berapa biaya penggantian baterai sepeda listrik?</span>
                                            <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                    <div x-ref="tab" :style="handleToggle()" class="relative overflow-hidden transition-all duration-700 max-h-0">
                                        <div class="px-6 pb-4 text-gray-600">Biaya penggantian baterai bervariasi tergantung pada jenis dan mereknya. Secara umum, harga baterai berkisar antara Rp 1.000.000 hingga Rp 3.000.000, tergantung kapasitas dan teknologinya.
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- About Us Section -->
                <section id="aboutus" style="background-color: #F3F4F6" class="py-12 bg-gray-100 text-gray-900">
                    <div class="container mx-auto text-center">
                        <!-- Heading Section -->
                        <h2 class="text-2xl font-bold mt-8 mb-8 pt-8 text-gray-900">Tentang Kami</h2>
                        <!-- Paragraph Section -->
                        <p class="text-lg md:text-xl mb-6 mx-4 lg:mx-0">
                            Baik di rumah Anda maupun di bengkel kami, kami siap memastikan sepeda listrik Anda kembali berfungsi dengan optimal dan aman.
                        </p>
                        <!-- Google Maps iframe -->
                        <div class="w-full h-64 md:h-80 lg:h-96 mb-8">
                            <iframe class="w-full h-full rounded-lg shadow-lg"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.978965102293!2d109.2619913!3d-7.4374857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655c1e12755a2f%3A0x469c4dabeb58e272!2sSelis%20Molis%20Hoki%20Store!5e0!3m2!1sen!2sid!4v1692968239512!5m2!1sen!2sid"
                            allowfullscreen=""
                            loading="lazy">
                            </iframe>
                        </div>
                        <!-- Button Section -->
                        <!--<a href="{{ route('aboutus') }}" -->
                        <!--style="background-color: #d97706" -->
                        <!--class="inline-block text-white px-5 py-3 min-w-[200px] rounded-full text-lg transition-colors duration-300 text-center"-->
                        <!--onmouseover="this.style.backgroundColor='#eab308'"-->
                        <!--onmouseout="this.style.backgroundColor='#d97706'">-->
                        <!--Selengkapnya-->
                        <!--</a>-->
                    </div>
                </section>

                <!-- Contact Section -->
                <section id="contact" style="background-color: #f5f5f5" class="text-gray-900 py-16">
                    <div class="container mx-auto text-center px-4 py-4 md:px-0">
                        <a href="{{ route('contact') }}">
                            <h2 class="text-2xl md:text-3xl font-bold mt-8 mb-8 text-gray-900 hover:text-white hover:bg-yellow-600 transition duration-300 inline-block px-4 py-2 rounded">
                                Hubungi Kami
                            </h2>
                        </a>
                        <p class="text-lg md:text-xl mb-8 text-gray-700">Siap membantu Anda dengan semua kebutuhan sepeda listrik Anda.</p>
                        <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-6 items-center">
                            <!-- Tombol WhatsApp -->
                            <a href="https://wa.link/mx2893" class="text-white px-6 py-3 rounded-full text-lg transition duration-300 inline-flex items-center justify-center w-full md:w-auto drop-shadow-lg shadow-lg hover:shadow-xxl" style="background-color: #25D366;" onmouseover="this.style.backgroundColor='#1EBB5D'" onmouseout="this.style.backgroundColor='#25D366'">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp Logo" class="mr-2 w-6 h-6"> WhatsApp
                            </a>
                            <!-- Tombol Instagram -->
                            <a href="https://www.instagram.com/selismolishokiofficial/" class="text-white px-6 py-3 rounded-full text-lg transition duration-300 inline-flex items-center justify-center w-full md:w-auto drop-shadow-lg shadow-lg hover:shadow-xl" style="background-color: #405DE6;" onmouseover="this.style.backgroundColor='#3A4DCB'" onmouseout="this.style.backgroundColor='#405DE6'">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram Logo" class="mr-2 w-6 h-6"> Instagram
                            </a>
                            <!-- Tombol Email -->
                            <a href="mailto:info@selismolishoki.com" class="text-white px-6 py-3 rounded-full text-lg transition duration-300 inline-flex items-center justify-center w-full md:w-auto drop-shadow-lg shadow-lg hover:shadow-xl" style="background-color: #D14836;" onmouseover="this.style.backgroundColor='#C0392B'" onmouseout="this.style.backgroundColor='#D14836'">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/7/7e/Gmail_icon_%282020%29.svg" alt="Email Logo" class="mr-2 w-6 h-6"> Email Kami
                            </a>
                        </div>
                    </div>
                </section>
            </main>

        <footer>
            @include('layouts.foot')
        </footer>

        <script src="js/carousel.js"></script>
        <script src="js/check.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
        <script src="js/swiper-init.js"></script>
        <script src="js/faq.js"></script>
    </body>
</html>
