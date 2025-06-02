<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Selis Molis Hoki</title>
    <link rel="icon" type="image/png" href="images/logofix2.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-gray-100">

    <header>
        @include('layouts.nav')
    </header>

        <main>
            <div class="text-left py-8 ml-8">
                <button onclick="window.history.back()" class="bg-white-500 text-black px-6 py-2 rounded-lg shadow-md hover:bg-yellow-100 transition duration-300 mt-24">
                    <- Kembali
                </button>
            </div>
        
            <!-- About Us Section -->
            <section class="pt-4 pb-16"> <!-- Menambahkan padding top (pt-32) untuk memberikan lebih banyak ruang -->
                <div class="container mx-auto text-center">
                    <h2 class="text-xl font-bold mb-8 text-gray-900">Siapa Kami?</h2>
                    <p class="text-lg text-black mb-8">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit vitae repellat deserunt iste, doloribus esse unde possimus aliquam ut! Esse.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                        <!-- Misi Kami -->
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-xl font-bold mb-4 text-black">Misi Kami</h3>
                            <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptates dolore nesciunt. Ab, culpa? Fuga voluptatibus officiis totam earum. Aperiam soluta quibusdam minima consequatur. Quaerat minima eaque est unde deleniti!</p>
                        </div>
        
                        <!-- Visi Kami -->
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-xl font-bold mb-4 text-black">Visi Kami</h3>
                            <p class="text-gray-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias quasi vero culpa, quaerat quod voluptate modi corporis dolorum odio doloribus aut provident sapiente! Expedita, voluptates.</p>
                        </div>
                    </div>
                </div>
            </section>
        
            <!-- Our Team Section -->
            <section style="background-color: white" class="text-black py-16">
                <div class="container mx-auto text-center">
                    <h2 class="text-xl font-bold mb-8">Tim Kami</h2>
                    <p class="text-lg mb-8">Kami memiliki tim teknisi berpengalaman yang siap memberikan layanan terbaik.</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Anggota Tim 1 -->
                        <div class="bg-white text-black p-6 rounded-lg shadow-lg">
                            <img src="images/team1.jpg" alt="Anggota Tim 1" class="w-32 h-32 rounded-full mx-auto mb-4">
                            <h3 class="text-xl font-bold mb-2">Ahmad Hidayat</h3>
                            <p class="text-gray-600">Teknisi Senior</p>
                        </div>
        
                        <!-- Anggota Tim 2 -->
                        <div class="bg-white text-black p-6 rounded-lg shadow-lg">
                            <img src="images/team2.jpg" alt="Anggota Tim 2" class="w-32 h-32 rounded-full mx-auto mb-4">
                            <h3 class="text-xl font-bold mb-2">Siti Rahmawati</h3>
                            <p class="text-gray-600">Teknisi dan Konsultan</p>
                        </div>
        
                        <!-- Anggota Tim 3 -->
                        <div class="bg-white text-black p-6 rounded-lg shadow-lg">
                            <img src="images/team3.jpg" alt="Anggota Tim 3" class="w-32 h-32 rounded-full mx-auto mb-4">
                            <h3 class="text-xl font-bold mb-2">Budi Santoso</h3>
                            <p class="text-gray-600">Spesialis Kelistrikan</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>

    <footer>
        @include('layouts.footer')
    </footer>

</body>
</html>
