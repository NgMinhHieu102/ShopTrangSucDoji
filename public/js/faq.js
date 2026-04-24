// FAQ Accordion JavaScript
function toggleFAQ(element) {
    const faqItem = element.parentElement;
    const answer = faqItem.querySelector('.faq-answer');
    const question = faqItem.querySelector('.faq-question');
    
    // Close all other FAQ items
    const allFaqItems = document.querySelectorAll('.faq-item');
    allFaqItems.forEach(item => {
        if (item !== faqItem) {
            const otherAnswer = item.querySelector('.faq-answer');
            const otherQuestion = item.querySelector('.faq-question');
            otherAnswer.classList.remove('show');
            otherQuestion.classList.remove('active');
        }
    });
    
    // Toggle current FAQ item
    if (answer.classList.contains('show')) {
        answer.classList.remove('show');
        question.classList.remove('active');
    } else {
        answer.classList.add('show');
        question.classList.add('active');
    }
}

// Make function available globally
window.toggleFAQ = toggleFAQ;