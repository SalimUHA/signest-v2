document.addEventListener("DOMContentLoaded", () => {
    const animatedElements = document.querySelectorAll('.animate-on-scroll');

    if (animatedElements.length === 0) {
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });

    animatedElements.forEach(element => {
        observer.observe(element);
    });
});
