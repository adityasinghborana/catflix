document.addEventListener('DOMContentLoaded', function () {
    // Get all Embla carousel containers
    const emblaContainers = document.querySelectorAll('.embla');

    emblaContainers.forEach((emblaContainer, index) => {
        // Initialize each carousel dynamically
        const emblaInstance = EmblaCarousel(emblaContainer.querySelector('.embla__viewport'), {
            loop: true,
            autoplay: true,
        });

        // Add event listeners for the left and right arrows
        const prevButton = emblaContainer.querySelector('.embla__prev');
        const nextButton = emblaContainer.querySelector('.embla__next');

        if (prevButton) {
            prevButton.addEventListener('click', () => emblaInstance.scrollPrev());
        }

        if (nextButton) {
            nextButton.addEventListener('click', () => emblaInstance.scrollNext());
        }
    });
});
