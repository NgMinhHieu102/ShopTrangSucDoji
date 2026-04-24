// Consultation Form JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const consultationForm = document.getElementById('consultationForm');
    
    if (consultationForm) {
        consultationForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const data = {
                name: formData.get('name'),
                phone: formData.get('phone'),
                province: formData.get('province'),
                product: formData.get('product')
            };
            
            // Validate form
            if (!data.name || !data.phone || !data.province || !data.product) {
                alert('Vui lòng điền đầy đủ thông tin!');
                return;
            }
            
            // Validate phone number (basic)
            const phoneRegex = /^[0-9]{10,11}$/;
            if (!phoneRegex.test(data.phone)) {
                alert('Số điện thoại không hợp lệ!');
                return;
            }
            
            // Show loading state
            const submitBtn = this.querySelector('.consultation-btn');
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'ĐANG GỬI...';
            submitBtn.disabled = true;
            
            // Simulate form submission (replace with actual API call)
            setTimeout(() => {
                alert('Cảm ơn bạn đã đăng ký! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.');
                
                // Reset form
                this.reset();
                
                // Reset button
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                
                // Optional: Send data to server
                console.log('Consultation data:', data);
                
            }, 2000);
        });
    }
    
    // Phone number formatting
    const phoneInput = document.querySelector('input[name="phone"]');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            // Remove non-numeric characters
            let value = e.target.value.replace(/\D/g, '');
            
            // Limit to 11 digits
            if (value.length > 11) {
                value = value.slice(0, 11);
            }
            
            e.target.value = value;
        });
    }
});