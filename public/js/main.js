var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
    },
    pagination: {
        el: ".swiper-pagination",
    },
});


var swiper1 = new Swiper(".panelSwiper", {
    speed: 600,
    parallax: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiper2 = new Swiper(".spatialSwiper", {
    effect: "cards",
    grabCursor: true,
});


var swiper3 = new Swiper(".brSwiper", {
    slidesPerView: 3,
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        // لما الشاشة تصغر (جوال)
        0: {
            slidesPerView: 1, // كرت واحد فقط
        },
        768: {
            slidesPerView: 2, // تقدر تخليها 2 في التابلت
        },
        1024: {
            slidesPerView: 3, // ديسكتوب
        },
    },
});

var swiper4 = new Swiper(".partSwiper", {
    slidesPerView: 3,
    centeredSlides: true,
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        type: "fraction",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".swiper-slide");

    cards.forEach(card => {
        const image = card.querySelector(".branch-image");
        const content = card.querySelector(".branch-content");

        // نتأكد إنه لقى العنصرين قبل ما نحط event
        if (image && content) {
            image.addEventListener("click", function () {
                content.classList.add("show");

            });

            content.addEventListener("click", function () {
                content.classList.remove("show");
                image.style.display = "block";
            });
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    if (window.location.hash) {
        let target = document.querySelector(window.location.hash);
        if (target) {
            const header = document.querySelector('header'); // لو عندك هيدر ثابت
            const offset = header ? header.offsetHeight : 0;

            setTimeout(() => {
                const y = target.getBoundingClientRect().top + window.pageYOffset - offset - 10;
                window.scrollTo({top: y, behavior: "smooth"});
            }, 400);
        }
    }
});


const deviceImg = document.querySelector('.device');

document.querySelectorAll('.sub').forEach(sub => {
    const title = sub.querySelector('.title');
    const para = sub.querySelector('.content-service');

    title.addEventListener('click', () => {
        // اخفاء كل الاخوان أولاً
        document.querySelectorAll('.sub').forEach(other => {
            if (other !== sub) {
                other.classList.remove('active');
                const otherPara = other.querySelector('.content-service');
                if (otherPara) {
                    otherPara.classList.remove('show');
                }
            }
        });

        // إظهار/إخفاء الحالي
        para.classList.toggle('show');
        sub.classList.toggle('active');

        // تغيير الصورة مع ترانزيشن
        const newImg = sub.getAttribute('data-img');
        deviceImg.classList.add('fade-out');
        setTimeout(() => {
            deviceImg.setAttribute('src', newImg);
            deviceImg.classList.remove('fade-out');
        }, 500);
    });
});


