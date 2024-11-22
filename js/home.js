let currentIndex = 0;
    const slides = document.querySelectorAll('.card-container .card');
    const totalSlides = slides.length;
    let slideWidth = slides[0].clientWidth + 20;
    const cardContainer = document.querySelector('.card-container');
    const leftButton = document.querySelector('.slider-btn.left');
    const rightButton = document.querySelector('.slider-btn.right');
    let intervalId;
    let lastScrollY = 0;
    let slidesPerView = 6; // Number of slides per view
    const navbar = document.querySelector('header');


    window.addEventListener('scroll', reveal);

    function reveal() {
        var reveals = document.querySelectorAll('.reveal');
        for(var i = 0; i < reveals.length; i++){
            var windowheight = window.innerHeight;
            var revealtop = reveals[i].getBoundingClientRect().top;
            var revealpoint = 150;

            if(revealtop < windowheight - revealpoint){
                reveals[i].classList.add('active');
            }else{
                reveals[i].classList.remove('active');
            }
        }
    }
    
    // window.addEventListener('scroll', () => {
    //     const currentScrollY = window.scrollY;
    //     if(currentScrollY > lastScrollY){
    //         console.log('scroll down');
    //         navbar.classList.add('hidden');
    //     }else{
    //         console.log('scroll up');
    //         navbar.classList.remove('hidden');
    //     }
    //     lastScrollY = currentScrollY;
    // });
    
    function updateButtons() {
        leftButton.disabled = currentIndex === 0;
        rightButton.disabled = currentIndex === totalSlides - 1;
    }
    

    function moveSlide(step) {
        currentIndex += step;
        if (currentIndex < 0) {
            currentIndex = totalSlides - slidesPerView; // Move to the end when scrolling backwards from the beginning
        } else if (currentIndex > totalSlides - slidesPerView) {
            currentIndex = 0; // Loop back to the beginning when reaching the end
        }
        cardContainer.style.transform = `translateX(-${currentIndex * (slideWidth)}px)`;
        updateButtons();
    }

    
    function autoplaySlides() {
        intervalId = setInterval(() => {
            moveSlide(1); 
            // Stop autoplay when exactly 4 cards are shown
            if (currentIndex >= totalSlides - slidesPerView) {
                clearInterval(intervalId);
                setTimeout(() => {
                    currentIndex = 0; // Reset to beginning after delay
                    cardContainer.style.transform = `translateX(0)`;
                    autoplaySlides(); // Restart autoplay
                }, 3000); // Delay before resetting to beginning (adjust as needed)
            }
        }, 3000); // Interval between slides (adjust as needed)
    }
    
    
    
    
    autoplaySlides();
    
    
    cardContainer.addEventListener('mouseenter', () => {
        clearInterval(intervalId);
    });
    
    
    cardContainer.addEventListener('mouseleave', () => {
        autoplaySlides();
    });
