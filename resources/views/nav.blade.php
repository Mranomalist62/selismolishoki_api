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
        <a href="{{ route('home') }}" id="logo-container" class="hover:text-gray-900 text-white text-xl font-bold flex items-center md:ml-0 ml-auto order-2 md:order-none">
            Selis Molis Hoki
            <div class="ml-1 p-1 rounded-full border-1 border-black flex-auto items-center justify-center">
                <img src="images/logofix1.jpg" alt="Logo Perusahaan" class="h-10 md:h-10 lg:h-12 w-auto rounded-full">
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

