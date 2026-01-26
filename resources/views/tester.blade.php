<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعليقات العملاء</title>
    <style>
        body {
            font-family: Tahoma, Arial, sans-serif;
            background: #f6f7fb;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .testimonials {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            min-height: 120px; /* علشان ما ينهار السكشن وقت الاختفاء */
        }

        .t-item {
            opacity: 0;
            transform: translateX(-40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
            background: #fff;
            padding: 15px;
            border-radius: 12px;
            border-right: 5px solid #6c5ce7;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
        }

        .t-item.active {
            opacity: 1;
            transform: translateX(0);
            position: relative; /* العنصر النشط فقط يكون داخل التدفق */
        }
    </style>
</head>
<body>

<h2>آراء عملاؤنا</h2>

<section class="testimonials" id="testimonials">
    <div class="t-item active">الخدمة ممتازة وسريعة.</div>
    <div class="t-item">تصميم احترافي والدعم ممتاز.</div>
    <div class="t-item">تم التسليم بجودة عالية.</div>
    <div class="t-item">اهتمام رائع بالتفاصيل.</div>
</section>

<script>
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
    setInterval(showNext, 3000);
</script>

</body>
</html>
