document.addEventListener('DOMContentLoaded', () => {
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

    const carouselContainer = document.querySelector('.carousel-container');
    const slider = document.querySelector('.slider');
    const nav = document.querySelector('.nav');
    let autoScrollInterval;

    if (slider && carouselContainer && nav) {

        // MODIFIÉ : On revient à la lecture du style en ligne
        const updateContainerBackground = () => {
            const mainCard = slider.querySelector('.item:nth-child(2)');
            if (mainCard) {
                const newBackgroundImage = mainCard.style.backgroundImage;
                if (newBackgroundImage) {
                    carouselContainer.style.backgroundImage = newBackgroundImage;
                }
            }
        };

        const nextSlide = () => {
            const items = slider.querySelectorAll('.item');
            if (items.length > 1) {
                slider.append(items[0]);
                updateContainerBackground();
            }
        };

        const prevSlide = () => {
            const items = slider.querySelectorAll('.item');
            if (items.length > 1) {
                slider.prepend(items[items.length - 1]);
                updateContainerBackground();
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
