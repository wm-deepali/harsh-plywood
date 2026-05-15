console.log("js is ruinng")


const date = new Date()
const year = date.getFullYear()
const yearid = document.getElementById("yearid")
yearid.innerText = year
console.log(year)

// hero js
const heroSwiperEl = document.querySelector(".heroSwiper");
if (heroSwiperEl) {
    var swiper = new Swiper(".heroSwiper", {
        loop: true,
        speed: 1600,
        effect: "fade",
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
}


// category slider
const categorySwiperEl = document.querySelector(".categorySwiper");
if (categorySwiperEl) {
    var categorySwiper = new Swiper(".categorySwiper", {
        slidesPerView: "auto",
        spaceBetween: 15,
        navigation: {
            nextEl: ".category-next",
            prevEl: ".category-prev",
        },
    });
}

// counter

const counters = document.querySelectorAll('.counter');
const boxes = document.querySelectorAll('.counter-box');
const counterSection = document.querySelector('.counter-section');

if (counterSection && counters.length > 0) {
    let started = false;
    window.addEventListener('scroll', () => {
        const sectionTop = counterSection.offsetTop - 400;
        if (window.scrollY > sectionTop && !started) {
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText;
                    const increment = target / 100;
                    if (count < target) {
                        counter.innerText = Math.ceil(count + increment);
                        setTimeout(updateCount, 20);
                    } else {
                        counter.innerText = target;
                    }
                }
                updateCount();
            });
            boxes.forEach((box, index) => {
                setTimeout(() => {
                    box.classList.add('show');
                }, index * 200);
            });
            started = true;
        }
    });
}



// service offer
//   


//    const serviceSection = document.getElementById("serviceSection");

// window.addEventListener("scroll", () => {

//   if (window.scrollY > 1300) {
//     serviceSection.classList.add("scrolled");
//   } else {
//     serviceSection.classList.remove("scrolled");
//   }

// });




/* ========================= */
/* MOBILE SIDEBAR */
/* ========================= */

const mobileToggle = document.querySelector(".navbar-toggler");
const mobileSidebar = document.querySelector(".mobile-sidebar");
const mobileOverlay = document.querySelector(".mobile-overlay");
const sidebarClose = document.querySelector(".sidebar-close");

/* OPEN SIDEBAR */
if (mobileToggle && mobileSidebar && mobileOverlay) {
    mobileToggle.addEventListener("click", () => {
        mobileSidebar.classList.add("active");
        mobileOverlay.classList.add("active");
    });
}

/* CLOSE SIDEBAR */
if (sidebarClose && mobileSidebar && mobileOverlay) {
    sidebarClose.addEventListener("click", () => {
        mobileSidebar.classList.remove("active");
        mobileOverlay.classList.remove("active");
    });
}

/* CLOSE OVERLAY */
if (mobileOverlay && mobileSidebar) {
    mobileOverlay.addEventListener("click", () => {
        mobileSidebar.classList.remove("active");
        mobileOverlay.classList.remove("active");
    });
}

/* ========================= */
/* MOBILE DROPDOWN */
/* ========================= */

const mobileDropdowns = document.querySelectorAll(".mobile-dropdown");

mobileDropdowns.forEach((dropdown) => {
    const head = dropdown.querySelector(".mobile-dropdown-head");
    if (head) {
        head.addEventListener("click", () => {
            dropdown.classList.toggle("active");
        });
    }
});



// gallery card itmes js

// const filterButtons = document.querySelectorAll('.filter-btn');
//       const galleryItems = document.querySelectorAll('.gallery-item');

//       filterButtons.forEach(button => {

//           button.addEventListener('click', () => {

//               // ACTIVE BUTTON

//               filterButtons.forEach(btn => {
//                   btn.classList.remove('activebutton');
//               });

//               button.classList.add('activebutton');



//               // FILTER

//               const filter = button.getAttribute('data-filter');

//               galleryItems.forEach(item => {

//                   if(filter === 'all'){

//                       item.style.display = 'block';

//                       setTimeout(() => {
//                           item.querySelector('.gallery-card').classList.remove('hide');
//                       }, 50);

//                   }else{

//                       if(item.classList.contains(filter)){

//                           item.style.display = 'block';

//                           setTimeout(() => {
//                               item.querySelector('.gallery-card').classList.remove('hide');
//                           }, 50);

//                       }else{

//                           item.querySelector('.gallery-card').classList.add('hide');

//                           setTimeout(() => {
//                               item.style.display = 'none';
//                           }, 400);

//                       }

//                   }

//               });

//           });

//       });
/* =========================
FILTER
========================= */

const filterBtns =
    document.querySelectorAll('.filter-btn');

const galleryItems =
    document.querySelectorAll('.gallery-item');

filterBtns.forEach(btn => {

    btn.addEventListener('click', () => {

        filterBtns.forEach(button => {

            button.classList.remove('activebutton');

        });

        btn.classList.add('activebutton');

        const filter = btn.dataset.filter;

        galleryItems.forEach(item => {

            if (filter === 'all') {

                item.classList.remove('hide');

            } else {

                item.classList.toggle(
                    'hide',
                    !item.classList.contains(filter)
                );

            }

        });

    });

});


/* =========================
   LIGHTBOX
========================= */

const images = document.querySelectorAll('.gallery-card img');
const lightbox = document.querySelector('.lightbox');
const lightboxImage = document.querySelector('.lightbox-image');
const closeBtn = document.querySelector('.close-btn');
const nextBtn = document.querySelector('.next-btn');
const prevBtn = document.querySelector('.prev-btn');
const counter = document.querySelector('.lightbox-counter');
const thumbnailsContainer = document.querySelector('.lightbox-thumbnails');

let currentIndex = 0;

if (lightbox && images.length > 0) {
    /* CREATE THUMBNAILS */
    images.forEach((img, index) => {
        const thumb = document.createElement('img');
        thumb.src = img.src;
        thumb.addEventListener('click', () => {
            currentIndex = index;
            showImage();
        });
        if (thumbnailsContainer) thumbnailsContainer.appendChild(thumb);
    });

    /* SHOW IMAGE */
    function showImage() {
        const img = images[currentIndex];
        if (lightboxImage) lightboxImage.src = img.src;
        if (counter) counter.innerText = `${currentIndex + 1} / ${images.length}`;

        document.querySelectorAll('.lightbox-thumbnails img').forEach((thumb, index) => {
            thumb.classList.toggle('active-thumb', index === currentIndex);
        });
    }

    /* OPEN */
    document.querySelectorAll('.gallery-card').forEach((card, index) => {
        const img = card.querySelector('img');
        const overlay = card.querySelector('.gallery-overlay');

        const openLightbox = () => {
            currentIndex = index;
            showImage();
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        };

        if (img) img.addEventListener('click', openLightbox);
        if (overlay) overlay.addEventListener('click', openLightbox);
    });

    /* CLOSE */
    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    if (closeBtn) closeBtn.addEventListener('click', closeLightbox);

    /* NEXT */
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            currentIndex++;
            if (currentIndex >= images.length) currentIndex = 0;
            showImage();
        });
    }

    /* PREV */
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            currentIndex--;
            if (currentIndex < 0) currentIndex = images.length - 1;
            showImage();
        });
    }

    /* OUTSIDE CLICK */
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) closeLightbox();
    });

    /* KEYBOARD */
    document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('active')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowRight' && nextBtn) nextBtn.click();
        if (e.key === 'ArrowLeft' && prevBtn) prevBtn.click();
    });
}



// testimonials js
var swiper = new Swiper(".testimonialsSwiper", {

    loop: true,

    speed: 1000,

    spaceBetween: 30,

    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

    breakpoints: {

        0: {
            slidesPerView: 1,
        },

        576: {
            slidesPerView: 1,
        },

        768: {
            slidesPerView: 2,
        },

        992: {
            slidesPerView: 3,
        },

        1400: {
            slidesPerView: 3,
        }

    }

});


// CLIENT LOGO SWIPER

var swiper = new Swiper(".clientLogoSwiper", {

    loop: true,

    speed: 2000,

    freeMode: true,

    freeModeMomentum: false,

    grabCursor: true,

    allowTouchMove: true,

    slidesPerView: 'auto',

    spaceBetween: 50,

    autoplay: {
        delay: 0,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },

    breakpoints: {

        0: {
            slidesPerView: 2,
            spaceBetween: 20,
        },

        576: {
            slidesPerView: 3,
            spaceBetween: 25,
        },

        768: {
            slidesPerView: 4,
            spaceBetween: 30,
        },

        992: {
            slidesPerView: 5,
            spaceBetween: 40,
        },

        1400: {
            slidesPerView: 6,
            spaceBetween: 50,
        }

    }

});



/* =========================
   HOVER STOP
========================= */

const logoSwiper =
    document.querySelector(".clientLogoSwiper");

logoSwiper.addEventListener("mouseenter", () => {

    swiper.autoplay.stop();

});

logoSwiper.addEventListener("mouseleave", () => {

    swiper.autoplay.start();

});