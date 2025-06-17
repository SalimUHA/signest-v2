document.addEventListener('DOMContentLoaded', () => {
    // --- Logique pour les cartes qui apparaissent au scroll ---
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

    // --- Logique du Carrousel ---
    const carouselContainer = document.querySelector('.carousel-container');
    const slider = document.querySelector('.slider');
    const nav = document.querySelector('.nav');
    let autoScrollInterval;

    if (slider && carouselContainer && nav) {

        // NOUVELLE FONCTION : Met à jour l'arrière-plan du conteneur
        const updateContainerBackground = () => {
            const mainCard = slider.querySelector('.item:nth-child(2)');
            if (mainCard) {
                // Récupère l'URL de l'image de fond de la carte principale
                const newBackgroundImage = mainCard.style.backgroundImage;
                // Applique cette image au conteneur du carrousel
                carouselContainer.style.backgroundImage = newBackgroundImage;
            }
        };

        const nextSlide = () => {
            const items = slider.querySelectorAll('.item');
            if (items.length > 1) {
                slider.append(items[0]);
                updateContainerBackground(); // MISE A JOUR du fond
            }
        };

        const prevSlide = () => {
            const items = slider.querySelectorAll('.item');
            if (items.length > 1) {
                slider.prepend(items[items.length - 1]);
                updateContainerBackground(); // MISE A JOUR du fond
            }
        };

        const startAutoScroll = () => {
            clearInterval(autoScrollInterval);
            autoScrollInterval = setInterval(nextSlide, 5000);
        };

        const stopAutoScroll = () => {
            clearInterval(autoScrollInterval);
        };

        nav.addEventListener('click', (e) => {
            const button = e.target.closest('.btn');
            if (!button) {
                return;
            }

            // On stoppe puis relance l'autoscroll lors d'un clic manuel
            stopAutoScroll();
            if (button.classList.contains('next')) {
                nextSlide();
            } else if (button.classList.contains('prev')) {
                prevSlide();
            }
            startAutoScroll();
        });

        carouselContainer.addEventListener('mouseenter', stopAutoScroll);
        carouselContainer.addEventListener('mouseleave', startAutoScroll);

        const observerOptions = {
            root: null,
            threshold: 0.5
        };

        const observerCallback = (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startAutoScroll();
                } else {
                    stopAutoScroll();
                }
            });
        };

        const carouselObserver = new IntersectionObserver(observerCallback, observerOptions);
        carouselObserver.observe(carouselContainer);

        updateContainerBackground();
    }
});
