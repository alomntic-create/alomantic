const items = document.querySelectorAll(".t-item");
const nextBtn = document.querySelector(".next");
const prevBtn = document.querySelector(".prev");

let index = 0;
let autoSlide; // نخزن المؤقت هنا

function showItem(i) {
    items.forEach(item => item.classList.remove("active"));
    items[i].classList.add("active");
}

function showNext() {
    index = (index + 1) % items.length;
    showItem(index);
    resetTimer();
}

function showPrev() {
    index = (index - 1 + items.length) % items.length;
    showItem(index);
    resetTimer();
}

function startAutoSlide() {
    autoSlide = setInterval(showNext, 10000);
}

function resetTimer() {
    clearInterval(autoSlide);
    startAutoSlide();
}

// أول تشغيل
showItem(index);
startAutoSlide();

// الأزرار
nextBtn.addEventListener("click", showNext);
prevBtn.addEventListener("click", showPrev);
