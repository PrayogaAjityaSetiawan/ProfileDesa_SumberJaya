// resources/js/app.js
import './bootstrap';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import SplitType from 'split-type';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle'; // Import CSS-nya juga
import { Navigation, Pagination } from 'swiper/modules';
Swiper.use([Navigation, Pagination]);

gsap.registerPlugin(ScrollTrigger);

function runRevealText() {
    const elements = document.querySelectorAll('.reveal-text');

    elements.forEach((el, index) => {
        // Skip if already processed
        if (el.dataset.splitProcessed) return;
        
        const split = new SplitType(el, { types: 'words,chars' });
        
        // Mark as processed
        el.dataset.splitProcessed = 'true';

        // Set initial state
        gsap.set(split.chars, {
            y: 100,
            opacity: 0,
            rotationX: -90,
            transformOrigin: '0% 50% -50',
        });

        gsap.to(split.chars, {
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
                end: 'bottom 15%',
                toggleActions: 'play none none none',
                id: `reveal-${index}`,
                // markers: true, // Uncomment for debugging
            },
            y: 0,
            opacity: 1,
            rotationX: 0,
            stagger: {
                amount: 1.2,
                from: 'start',
                ease: 'power2.inOut'
            },
            duration: 1.5,
            ease: 'power3.out',
        });
    });

   
}

// Function to clean up animations before re-running
function cleanupAnimations() {
    // Remove split-type classes and data attributes
    document.querySelectorAll('[data-split-processed]').forEach(el => {
        delete el.dataset.splitProcessed;
        // Remove split-type generated elements
        el.innerHTML = el.textContent;
    });
}

// Run on initial load
document.addEventListener('DOMContentLoaded', runRevealText);

// Handle Livewire updates
document.addEventListener('livewire:load', () => {
    Livewire.hook('message.processed', () => {
        // Clean up previous animations
        cleanupAnimations();
        
        // Wait a bit for DOM to settle, then re-run animations
        setTimeout(() => {
            runRevealText();
        }, 100);
    });
});

window.refreshAnimations = function() {
    cleanupAnimations();
    setTimeout(() => {
        runRevealText();
    }, 100);
};



function initAllSwipers() {
    const swipers = document.querySelectorAll('.swiper');
    swipers.forEach((el) => {
        if (!el.swiper) {
            const slidesPerView = parseInt(el.getAttribute('data-slides-per-view') || 1);
            new Swiper(el, {
                loop: false,
                spaceBetween: 16,
                slidesPerView: slidesPerView,
                navigation : {
                    nextEl: el.closest('[data-swiper-container]')?.querySelector('.button-next'),
                    prevEl: el.closest('[data-swiper-container]')?.querySelector('.button-prev'),
                }
            });
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initAllSwipers();
});

document.addEventListener('livewire:navigated', () => {
    initAllSwipers();
});

