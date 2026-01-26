const items = document.querySelectorAll(".t-item");
let index = 0;

function showNext() {
    // اخفاء الكل
    items.forEach(item => item.classList.remove("active"));

    // اظهار العنصر الحالي
    items[index].classList.add("active");

    // تحريك للمؤشر
    index = (index + 1) % items.length;
}

// أول تشغيل
showNext();

// تكرار كل 3 ثواني
setInterval(showNext, 5000);
