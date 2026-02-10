const items = document.querySelectorAll(".t-item");
const nextBtn = document.querySelector(".next");
const prevBtn = document.querySelector(".prev");

let index = 0;

function showItem(i) {
    items.forEach(item => item.classList.remove("active"));
    items[i].classList.add("active");
}

function showNext() {
    index = (index + 1) % items.length;
    showItem(index);
}

function showPrev() {
    index = (index - 1 + items.length) % items.length;
    showItem(index);
}

// أول تشغيل
showItem(index);

// التكرار التلقائي
setInterval(showNext, 9000);

// الأزرار
nextBtn.addEventListener("click", showNext);
prevBtn.addEventListener("click", showPrev);
