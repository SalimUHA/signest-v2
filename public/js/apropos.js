document.addEventListener("DOMContentLoaded", () => {
    const fadeElements = document.querySelectorAll('.fade-in, .zoom-in');

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });

    fadeElements.forEach(el => {
        el.classList.add('invisible');
        observer.observe(el);
    });
});
