// قراءة الصور من العناصر داخل #slides
const slidesEl = document.getElementById('slides');
const IMAGES = Array.from(slidesEl.querySelectorAll('img')).map(img => ({
    src: img.getAttribute('src'),
    alt: img.getAttribute('alt') || 'صورة المنتج'
}));

// عناصر DOM الأخرى
const dotsEl   = document.getElementById('dots');
const thumbsEl = document.getElementById('thumbs');
const prev     = document.getElementById('prev');
const next     = document.getElementById('next');
const gallery  = document.getElementById('gallery');

// إنشاء النقاط والمصغرات فقط (الصور موجودة مسبقًا في الـ HTML)
IMAGES.forEach((img, i) => {
    const dot = document.createElement('button');
    dot.className = 'dot';
    dot.type = 'button';
    dot.setAttribute('role','tab');
    dot.setAttribute('aria-label', `الصورة ${i+1}`);
    dot.addEventListener('click', ()=> goTo(i));
    dotsEl.appendChild(dot);

    const th = document.createElement('button');
    th.className = 'thumb';
    th.type = 'button';
    th.innerHTML = `<img src="${img.src}" alt="${img.alt}">`;
    th.addEventListener('click', ()=> goTo(i));
    thumbsEl.appendChild(th);
});

// إعدادات السلايدر
let index = 0;
let autoTimer = null;
const DURATION = 4500; // مدة الانتقال التلقائي

function updateUI(){

    slidesEl.style.transform = `translateX(${index * 100}%)`;
    [...dotsEl.children].forEach((d,i)=> d.setAttribute('aria-current', i===index));
    [...thumbsEl.children].forEach((t,i)=> t.setAttribute('aria-current', i===index));
}

function goTo(i){
    index = (i + IMAGES.length) % IMAGES.length;
    updateUI();
    restartAuto();
}

function nextSlide(){ goTo(index + 1); }
function prevSlide(){ goTo(index - 1); }

function startAuto(){ stopAuto(); autoTimer = setInterval(nextSlide, DURATION); }
function stopAuto(){ if(autoTimer) clearInterval(autoTimer); autoTimer = null; }
function restartAuto(){ stopAuto(); startAuto(); }

// أحداث الأزرار
next.addEventListener('click', nextSlide);
prev.addEventListener('click', prevSlide);

// إيقاف التشغيل التلقائي عند المرور/التركيز
gallery.addEventListener('mouseenter', stopAuto);
gallery.addEventListener('mouseleave', startAuto);
gallery.addEventListener('focusin', stopAuto);
gallery.addEventListener('focusout', startAuto);

// دعم السحب باللمس
let startX = 0, dx = 0;
slidesEl.addEventListener('touchstart', (e)=>{ startX = e.touches[0].clientX; dx=0; stopAuto(); }, {passive:true});
slidesEl.addEventListener('touchmove', (e)=>{ dx = e.touches[0].clientX - startX; }, {passive:true});
slidesEl.addEventListener('touchend', ()=>{ if(Math.abs(dx) > 40){ dx<0 ? nextSlide() : prevSlide(); } startAuto(); });

// دعم لوحة المفاتيح
window.addEventListener('keydown', (e)=>{
    if(e.key === 'ArrowLeft') nextSlide();
    if(e.key === 'ArrowRight') prevSlide();
});

// تهيئة أولية
updateUI();
startAuto();

// أزرار التحكم بالكمية
document.getElementById('addToCart').addEventListener('click', ()=>{
    const qty = parseInt(document.getElementById('qty').value || '1', 10);
    alert(`تمت إضافة ${qty} إلى السلة ✅`);
});

document.getElementById('minus').addEventListener('click', ()=>{
    const input = document.getElementById('qty');
    input.value = Math.max(1, (parseInt(input.value||'1',10) - 1));
});
document.getElementById('plus').addEventListener('click', ()=>{
    const input = document.getElementById('qty');
    input.value = Math.max(1, (parseInt(input.value||'1',10) + 1));
});





document.addEventListener('DOMContentLoaded', () => {
    const qtyInput = document.getElementById('qty');
    const minusBtn = document.getElementById('minus');
    const plusBtn = document.getElementById('plus');
    const unitSelect = document.getElementById('unitSelect');
    const priceDisplay = document.querySelector('.product-price');
    const dimensions = document.querySelector('.dimensions');
    const lengthInput = document.getElementById('length');
    const widthInput = document.getElementById('width');
    const qtyContainer = document.querySelector('.qty');

    function updatePrice() {
        const option = unitSelect.selectedOptions[0];
        const unitPrice = parseFloat(option.value) || 0;
        const isMeasurable = option.dataset.is_measurable === '1';

        let total = 0;

        if (isMeasurable) {
            const length = parseFloat(lengthInput.value) || 0;
            const width = parseFloat(widthInput.value) || 0;
            total = length * width * unitPrice;
        } else {
            const qty = parseFloat(qtyInput.value) || 0;
            total = qty * unitPrice;
        }

        priceDisplay.textContent = total.toLocaleString('ar-EG', {minimumFractionDigits:2, maximumFractionDigits:2}) + ' ر.س';
    }

    function handleUnitChange() {
        const isMeasurable = unitSelect.selectedOptions[0].dataset.is_measurable === '1';
        if (isMeasurable) {
            dimensions.style.display = 'block';
            qtyContainer.style.display = 'none';
        } else {
            dimensions.style.display = 'none';
            qtyContainer.style.display = 'flex';
        }
        updatePrice();
    }

    // أحداث الزرار
    minusBtn.addEventListener('click', () => {
        if (qtyInput.value > 1) qtyInput.value--;
        updatePrice();
    });
    plusBtn.addEventListener('click', () => {
        qtyInput.value++;
        updatePrice();
    });

    // أحداث تغيير المدخلات
    qtyInput.addEventListener('input', updatePrice);
    lengthInput.addEventListener('input', updatePrice);
    widthInput.addEventListener('input', updatePrice);
    unitSelect.addEventListener('change', handleUnitChange);

    // حساب مبدئي
    handleUnitChange();
});


document.addEventListener("DOMContentLoaded", () => {
    // ضع رقم واتساب هنا


    // عناصر الصفحة
    const titleEl   = document.querySelector(".title");
    const qtyInput  = document.getElementById("qty");
    const plusBtn   = document.getElementById("plus");
    const minusBtn  = document.getElementById("minus");
    const unitSel   = document.getElementById("unitSelect");
    const priceBox  = document.querySelector(".product-price");
    const dimsWrap  = document.querySelector(".dimensions");
    const lengthEl  = document.getElementById("length");
    const widthEl   = document.getElementById("width");
    const orderBtn  = document.getElementById("detailsBtn");
    const WHATSAPP_NUMBER = orderBtn.dataset.whatsnum;

    const formatSAR = (n) => {
        try {
            return new Intl.NumberFormat('ar-SA', { style: 'currency', currency: 'SAR' }).format(n);
        } catch {
            return n.toFixed(2) + " ر.س";
        }
    };

    function getSelectedUnit() {
        const opt = unitSel.options[unitSel.selectedIndex];
        const unitName = opt.textContent.trim();
        const unitPrice = parseFloat(opt.value || "0") || 0;
        const isMeasurable = String(opt.dataset.is_measurable || "0") === "1";
        return { unitName, unitPrice, isMeasurable };
    }

    function calcTotal() {
        const { unitPrice, isMeasurable } = getSelectedUnit();
        const qty = Math.max(1, parseInt(qtyInput.value || "1", 10));
        const length = parseFloat(lengthEl?.value || "0") || 0;
        const width  = parseFloat(widthEl?.value || "0") || 0;

        if (isMeasurable) {
            const area = Math.max(0, length) * Math.max(0, width);
            return { total: unitPrice * area, qty, length, width, area };
        } else {
            return { total: unitPrice * qty, qty, length: 0, width: 0, area: 0 };
        }
    }

    function updateUI() {
        const { isMeasurable, unitPrice } = getSelectedUnit();
        if (dimsWrap) dimsWrap.style.display = isMeasurable ? "block" : "none";
        const { total } = calcTotal();
        if (priceBox) priceBox.textContent = formatSAR(total);
    }

    plusBtn?.addEventListener("click", () => {
        qtyInput.value = Math.max(1, (parseInt(qtyInput.value || "1", 10) + 1));
        updateUI();
    });

    minusBtn?.addEventListener("click", () => {
        qtyInput.value = Math.max(1, (parseInt(qtyInput.value || "1", 10) - 1));
        updateUI();
    });

    qtyInput.addEventListener("input", updateUI);
    unitSel.addEventListener("change", updateUI);
    lengthEl?.addEventListener("input", updateUI);
    widthEl?.addEventListener("input", updateUI);

    function buildWhatsAppMessage() {
        const productName = (titleEl?.textContent || "").trim();
        const { unitName, unitPrice, isMeasurable } = getSelectedUnit();
        const { total, qty, length, width, area } = calcTotal();

        let lines = [];
        lines.push("مرحباً، أود طلب المنتج التالي:");
        lines.push(`• المنتج: ${productName}`);
        lines.push(`• الوحدة: ${unitName}`);
        if (isMeasurable) {
            lines.push(`• الأبعاد: الطول ${length} م × العرض ${width} م`);
            lines.push(`• المساحة: ${area.toFixed(2)} م²`);
            lines.push(`• سعر الوحدة: ${formatSAR(unitPrice)} لكل م²`);
        } else {
            lines.push(`• الكمية: ${qty}`);
            lines.push(`• سعر الوحدة: ${formatSAR(unitPrice)}`);
        }
        lines.push(`• الإجمالي: ${formatSAR(total)}`);
        lines.push("");
        lines.push("الرجاء تأكيد الطلب وطريقة الدفع والتوصيل.");
        return lines.join("\n");
    }

    function sendToWhatsApp() {
        const message = buildWhatsAppMessage();
        const url = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodeURIComponent(message)}`;
        window.open(url, "_blank");
    }

    orderBtn.addEventListener("click", (e) => {
        e.preventDefault();
        const { isMeasurable } = getSelectedUnit();
        if (isMeasurable) {
            if ((+lengthEl.value || 0) <= 0 || (+widthEl.value || 0) <= 0) {
                alert("فضلاً أدخل الطول والعرض بشكل صحيح.");
                return;
            }
        }
        sendToWhatsApp();
    });

    // تشغيل أولي
    updateUI();
});


const btn = document.querySelector(".moreInfo");
const detail = document.querySelector(".moreDetail");

btn.addEventListener("click", () => {
    detail.classList.toggle("show");
});
detail.addEventListener('click',()=>{

    detail.classList.remove("show");
})


document.addEventListener('DOMContentLoaded', function() {
    const vrHolder = document.querySelector('.vr-holder');
    const vrButton = vrHolder.querySelector('.vr');
    const vrOptions = vrHolder.querySelector('.message');

    vrButton.addEventListener('click', function() {
        vrOptions.classList.toggle('show');
    });

    // إذا حاب يغلق لما تضغط برا
    document.addEventListener('click', function(e) {
        if (!vrHolder.contains(e.target)) {
            vrOptions.classList.remove('show');
        }
    });
});
