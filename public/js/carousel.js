// carousel.js

document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".carousel-item");
    const prevBtn = document.getElementById("prev");
    const nextBtn = document.getElementById("next");
    let currentSlide = 0;
    let slideInterval;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.opacity = i === index ? "1" : "0";
            slide.style.zIndex = i === index ? "1" : "0";
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    function startAutoSlide() {
        slideInterval = setInterval(nextSlide, 5000); // Ganti slide setiap 5 detik
    }

    function stopAutoSlide() {
        clearInterval(slideInterval);
    }

    prevBtn.addEventListener("click", () => {
        stopAutoSlide();
        prevSlide();
        startAutoSlide();
    });

    nextBtn.addEventListener("click", () => {
        stopAutoSlide();
        nextSlide();
        startAutoSlide();
    });

    showSlide(currentSlide);
    startAutoSlide();
});
