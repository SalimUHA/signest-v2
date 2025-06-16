document.addEventListener('DOMContentLoaded', () => {

    // Logique pour l'animation des "feature-card" (si elles existent sur d'autres pages)
    const cards = document.querySelectorAll('.feature-card');
    if (cards.length > 0) {
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('appear');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });
        cards.forEach(card => observer.observe(card));
    }

    // --- Logique pour le carrousel ---
    const carouselContainer = document.querySelector('.carousel-container');
    const slider = document.querySelector('.slider');
    const nav = document.querySelector('.nav');
    let autoScrollInterval;

    if (slider && carouselContainer && nav) {

        // --- Fonctions de base du carrousel (INCHANGÉES) ---
        const nextSlide = () => {
            const items = slider.querySelectorAll('.item');
            if (items.length > 1) slider.append(items[0]);
        };

        const prevSlide = () => {
            const items = slider.querySelectorAll('.item');
            if (items.length > 1) slider.prepend(items[items.length - 1]);
        };

        const startAutoScroll = () => {
            clearInterval(autoScrollInterval);
            autoScrollInterval = setInterval(nextSlide, 5000);
        };

        const stopAutoScroll = () => {
            clearInterval(autoScrollInterval);
        };


        // --- Gestion des clics sur les flèches (INCHANGÉ) ---
        nav.addEventListener('click', (e) => {
            const button = e.target.closest('.btn');
            if (!button) return;

            if (button.classList.contains('next')) {
                nextSlide();
                startAutoScroll();
            } else if (button.classList.contains('prev')) {
                prevSlide();
                startAutoScroll();
            }
        });


        // --- GESTION DE LA VISIBILITÉ (NOUVELLE LOGIQUE) ---

        // 1. On conserve la pause/reprise avec la souris
        carouselContainer.addEventListener('mouseenter', stopAutoScroll);
        carouselContainer.addEventListener('mouseleave', startAutoScroll);

        // 2. On utilise un IntersectionObserver pour démarrer/arrêter le défilement
        const observerOptions = {
            root: null, // observation par rapport au viewport
            threshold: 0.5 // Se déclenche quand 50% de l'élément est visible
        };

        const observerCallback = (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // L'élément est visible à l'écran, on démarre le défilement
                    startAutoScroll();
                } else {
                    // L'élément n'est plus visible, on arrête pour la performance
                    stopAutoScroll();
                }
            });
        };

        const carouselObserver = new IntersectionObserver(observerCallback, observerOptions);

        // On dit à l'observateur de surveiller notre carrousel
        carouselObserver.observe(carouselContainer);
    }
});
