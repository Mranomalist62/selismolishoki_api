const swiper = new Swiper(".swiper-container", {
    // Konfigurasi Swiper
    loop: true, // Mengaktifkan loop slider
    slidesPerView: 1, // Menampilkan 1 slide per tampilan
    spaceBetween: 30, // Jarak antar slide
    pagination: {
        el: ".swiper-pagination", // Elemen untuk pagination
        clickable: true, // Membuat bullet pagination bisa diklik
    },
    breakpoints: {
        // Konfigurasi responsive breakpoints
        640: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 1,
            spaceBetween: 40,
        },
        1024: {
            slidesPerView: 1,
            spaceBetween: 50,
        },
    },
    autoplay: {
        delay: 5000, // Delay antar slide (dalam milisekon)
        disableOnInteraction: false, // Menghentikan autoplay saat user berinteraksi
    },
});
