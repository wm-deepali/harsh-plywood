
const date = new Date();

const year = date.getFullYear();

const yearid = document.getElementById("yearid");

if (yearid) {

    yearid.innerText = year;

}

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
// const categorySwiperEl = document.querySelector(".categorySwiper");
// if (categorySwiperEl) {
//     var categorySwiper = new Swiper(".categorySwiper", {
//         slidesPerView: "auto",
//         spaceBetween: 15,
//         navigation: {
//             nextEl: ".category-next",
//             prevEl: ".category-prev",
//         },
//     });
// }


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

        breakpoints: {
            0: {
                enabled: false, // mobile off
            },

            992: {
                enabled: true, // desktop on
            }
        }
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
/* =========================
   LIGHTBOX
========================= */

const galleryCards =
    document.querySelectorAll('.gallery-card');

const lightbox =
    document.querySelector('.lightbox');

const lightboxImage =
    document.querySelector('.lightbox-image');

const closeBtn =
    document.querySelector('.close-btn');

const nextBtn =
    document.querySelector('.next-btn');

const prevBtn =
    document.querySelector('.prev-btn');

const counter =
    document.querySelector('.lightbox-counter');

const thumbnailsContainer =
    document.querySelector('.lightbox-thumbnails');

let currentGalleryImages = [];

let currentIndex = 0;

if (lightbox && galleryCards.length > 0) {

    function renderThumbnails() {

        thumbnailsContainer.innerHTML = '';

        currentGalleryImages.forEach((imgSrc, index) => {

            const thumb = document.createElement('img');

            thumb.src = imgSrc;

            thumb.classList.toggle(
                'active-thumb',
                index === currentIndex
            );

            thumb.addEventListener('click', () => {

                currentIndex = index;

                showImage();

            });

            thumbnailsContainer.appendChild(thumb);

        });

    }

    function showImage() {

        lightboxImage.src =
            currentGalleryImages[currentIndex];

        counter.innerText =
            `${currentIndex + 1} / ${currentGalleryImages.length}`;

        renderThumbnails();

    }

    galleryCards.forEach((card) => {

        const openLightbox = () => {

            currentGalleryImages =
                JSON.parse(card.dataset.images || '[]');

            if (!currentGalleryImages.length) return;

            currentIndex = 0;

            showImage();

            lightbox.classList.add('active');

            document.body.style.overflow = 'hidden';

        };

        const img = card.querySelector('img');

        const overlay = card.querySelector('.gallery-overlay');

        if (img) {
            img.addEventListener('click', openLightbox);
        }

        if (overlay) {
            overlay.addEventListener('click', openLightbox);
        }

    });

    function closeLightbox() {

        lightbox.classList.remove('active');

        document.body.style.overflow = 'auto';

    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeLightbox);
    }

    if (nextBtn) {

        nextBtn.addEventListener('click', () => {

            currentIndex++;

            if (currentIndex >= currentGalleryImages.length) {
                currentIndex = 0;
            }

            showImage();

        });

    }

    if (prevBtn) {

        prevBtn.addEventListener('click', () => {

            currentIndex--;

            if (currentIndex < 0) {
                currentIndex = currentGalleryImages.length - 1;
            }

            showImage();

        });

    }

    lightbox.addEventListener('click', (e) => {

        if (e.target === lightbox) {

            closeLightbox();

        }

    });

    document.addEventListener('keydown', (e) => {

        if (!lightbox.classList.contains('active')) return;

        if (e.key === 'Escape') {
            closeLightbox();
        }

        if (e.key === 'ArrowRight' && nextBtn) {
            nextBtn.click();
        }

        if (e.key === 'ArrowLeft' && prevBtn) {
            prevBtn.click();
        }

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
        320: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        380: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        470: {
            slidesPerView: 3,
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




// const drawer = document.getElementById('filterDrawer');
// const overlay = document.getElementById('filterOverlay');

// function closeDrawer() {
//     drawer.classList.remove('active');
//     overlay.classList.remove('active');
// }

// // Open Drawer
// document.getElementById('openFilterDrawer')
// .addEventListener('click', () => {

//     drawer.classList.add('active');
//     overlay.classList.add('active');

// });

// // Close Button
// document.getElementById('closeFilterDrawer')
// .addEventListener('click', closeDrawer);

// // Overlay Click
// overlay.addEventListener('click', closeDrawer);

// // Filter Button Click
// document.querySelectorAll('.filter-btn').forEach(button => {

//     button.addEventListener('click', closeDrawer);

// });








/* =========================
   HOVER STOP
========================= */

const logoSwiper = document.querySelector(".clientLogoSwiper");

// Check element & swiper exists
if (logoSwiper && swiper) {

    logoSwiper.addEventListener("mouseenter", () => {

        swiper.autoplay.stop();

    });

    logoSwiper.addEventListener("mouseleave", () => {

        swiper.autoplay.start();

    });

}



const quoteDrawerWrapper = document.querySelector(".quoteDrawerWrapper");
const quoteDrawerOpenBtn = document.querySelector(".quoteDrawerBtn");
const quoteDrawerCloseBtn = document.querySelector(".quoteDrawerClose");
const quoteDrawerOverlay = document.querySelector(".quoteDrawerOverlay");

// Open Drawer
if (quoteDrawerOpenBtn) {
    quoteDrawerOpenBtn.addEventListener("click", function () {
        quoteDrawerWrapper.classList.add("active");
    });
}

// Close Drawer Button
if (quoteDrawerCloseBtn) {
    quoteDrawerCloseBtn.addEventListener("click", function () {
        quoteDrawerWrapper.classList.remove("active");
    });
}

// Overlay Click Close
if (quoteDrawerOverlay) {
    quoteDrawerOverlay.addEventListener("click", function () {
        quoteDrawerWrapper.classList.remove("active");
    });
}



const drawer = document.getElementById('filterDrawer');
const overlay = document.getElementById('filterOverlay');
const openDrawerBtn = document.getElementById('openFilterDrawer');
const closeDrawerBtn = document.getElementById('closeFilterDrawer');

function closeDrawer() {

    if (drawer) {
        drawer.classList.remove('active');
    }

    if (overlay) {
        overlay.classList.remove('active');
    }

}

// Open Drawer
if (openDrawerBtn) {

    openDrawerBtn.addEventListener('click', () => {

        drawer.classList.add('active');
        overlay.classList.add('active');

    });

}

// Close Button
if (closeDrawerBtn) {

    closeDrawerBtn.addEventListener('click', closeDrawer);

}

// Overlay Click
if (overlay) {

    overlay.addEventListener('click', closeDrawer);

}

// Filter Button Click
document.querySelectorAll('.filter-btn').forEach(button => {

    button.addEventListener('click', closeDrawer);

});



