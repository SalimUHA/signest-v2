document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.feature-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationDelay = `${entry.target.dataset.index * 0.1}s`;
                entry.target.classList.add('appear');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15
    });

    cards.forEach((card, index) => {
        card.dataset.index = index;
        observer.observe(card);
    });
});
