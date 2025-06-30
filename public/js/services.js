
    document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.animate-card');

    const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
    if (entry.isIntersecting) {
    entry.target.classList.add('appear');
    observer.unobserve(entry.target);
}
});
}, {
    threshold: 0.1
});

    cards.forEach((card, index) => {
    card.style.transitionDelay = `${index * 100}ms`;
    observer.observe(card);
});
});
