// Products Slider Navigation
function scrollProducts(direction) {
    const slider = document.getElementById('productsSlider');
    const scrollAmount = 320; // width of product card + gap
    
    if (direction === 'left') {
        slider.scrollBy({
            left: -scrollAmount,
            behavior: 'smooth'
        });
    } else {
        slider.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
        });
    }
}
