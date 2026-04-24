// Banner Slider JavaScript
let slideIndex = 1;
let slideInterval;

// Khởi tạo slider khi trang load
document.addEventListener('DOMContentLoaded', function() {
    showSlide(slideIndex);
    startAutoSlide();
});

// Hiển thị slide theo index
function showSlide(n) {
    let slides = document.getElementsByClassName("slide");
    let dots = document.getElementsByClassName("dot");
    
    if (n > slides.length) { slideIndex = 1; }
    if (n < 1) { slideIndex = slides.length; }
    
    // Ẩn tất cả slides
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active");
    }
    
    // Bỏ active cho tất cả dots
    for (let i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active");
    }
    
    // Hiển thị slide hiện tại và dot tương ứng
    if (slides[slideIndex - 1]) {
        slides[slideIndex - 1].classList.add("active");
    }
    if (dots[slideIndex - 1]) {
        dots[slideIndex - 1].classList.add("active");
    }
}

// Chuyển đến slide cụ thể khi click dot
function currentSlide(n) {
    slideIndex = n;
    showSlide(slideIndex);
    
    // Reset auto slide
    clearInterval(slideInterval);
    startAutoSlide();
}

// Chuyển slide tiếp theo
function nextSlide() {
    slideIndex++;
    showSlide(slideIndex);
}

// Chuyển slide trước
function prevSlide() {
    slideIndex--;
    showSlide(slideIndex);
}

// Tự động chuyển slide
function startAutoSlide() {
    slideInterval = setInterval(function() {
        slideIndex++;
        showSlide(slideIndex);
    }, 4000); // Chuyển slide mỗi 4 giây
}

// Dừng auto slide khi hover
document.addEventListener('DOMContentLoaded', function() {
    const sliderContainer = document.querySelector('.promotion-banner-slider');
    
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', function() {
            clearInterval(slideInterval);
        });
        
        sliderContainer.addEventListener('mouseleave', function() {
            startAutoSlide();
        });
    }
});