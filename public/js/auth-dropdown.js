// Toggle auth dropdown
function toggleAuthDropdown(event) {
    event.preventDefault();
    event.stopPropagation();
    
    const dropdown = document.getElementById('authDropdown');
    if (dropdown) {
        dropdown.classList.toggle('active');
    }
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    const dropdown = document.getElementById('authDropdown');
    const authIcon = document.querySelector('.auth-dropdown');
    
    if (dropdown && authIcon) {
        if (!authIcon.contains(event.target)) {
            dropdown.classList.remove('active');
        }
    }
});

// Close dropdown when pressing ESC
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const dropdown = document.getElementById('authDropdown');
        if (dropdown) {
            dropdown.classList.remove('active');
        }
    }
});
