<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>AR Overlay</title>
    <style>
        body { margin:0; overflow:hidden; }
        #camera {
            position: fixed;
            top:0; left:0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: 1;
        }
        #overlay {
            position: absolute;
            top: 100px;
            left: 100px;
            width: 150px;
            cursor: move;
            z-index: 2;
            touch-action: none; /* مهم عشان البينش يشتغل */
        }
        #controls {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0,0,0,0.5);
            color: white;
            padding: 10px;
            border-radius: 10px;
            z-index: 3;
        }
        button { margin: 0 5px; padding: 5px 10px; }
    </style>
</head>
<body>
<video id="camera" autoplay playsinline></video>
<img id="overlay" src="{{secure_asset('storage/'.$image->url)}}" alt="overlay">

<div id="controls">
    <button onclick="startCamera('user')">📱 الكاميرا الأمامية</button>
    <button onclick="startCamera('environment')">📷 الكاميرا الخلفية</button>
</div>

<script>
    const video = document.getElementById("camera");
    const overlay = document.getElementById("overlay");

    // تشغيل الكاميرا حسب النوع (أمامية/خلفية)
    async function startCamera(mode="environment") {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({
                video: { facingMode: mode }
            });
            video.srcObject = stream;
        } catch (err) {
            alert("خطأ في تشغيل الكاميرا: " + err);
        }
    }

    // بدء بالكاميرا الخلفية
    startCamera("environment");

    // تحريك الصورة بالماوس/التاتش
    let isDragging = false, offsetX, offsetY;

    overlay.addEventListener("mousedown", e => {
        isDragging = true;
        offsetX = e.offsetX;
        offsetY = e.offsetY;
    });

    document.addEventListener("mousemove", e => {
        if (isDragging) {
            overlay.style.left = (e.pageX - offsetX) + "px";
            overlay.style.top  = (e.pageY - offsetY) + "px";
        }
    });

    document.addEventListener("mouseup", () => isDragging = false);

    // دعم اللمس (موبايل) للتحريك
    overlay.addEventListener("touchstart", e => {
        if (e.touches.length === 1) {
            isDragging = true;
            const touch = e.touches[0];
            offsetX = touch.clientX - overlay.offsetLeft;
            offsetY = touch.clientY - overlay.offsetTop;
        }
    });

    document.addEventListener("touchmove", e => {
        if (isDragging && e.touches.length === 1) {
            const touch = e.touches[0];
            overlay.style.left = (touch.clientX - offsetX) + "px";
            overlay.style.top  = (touch.clientY - offsetY) + "px";
        }
    });

    document.addEventListener("touchend", () => isDragging = false);

    // ✅ تكبير/تصغير بالماوس (wheel)
    overlay.addEventListener("wheel", e => {
        e.preventDefault();
        let currentWidth = overlay.offsetWidth;
        let newWidth = currentWidth + (e.deltaY < 0 ? 20 : -20);
        if (newWidth > 50 && newWidth < 600) {
            overlay.style.width = newWidth + "px";
        }
    });

    // ✅ تكبير/تصغير باللمس (pinch)
    let initialDistance = null;
    overlay.addEventListener("touchmove", e => {
        if (e.touches.length === 2) {
            e.preventDefault();
            const dx = e.touches[0].clientX - e.touches[1].clientX;
            const dy = e.touches[0].clientY - e.touches[1].clientY;
            const distance = Math.sqrt(dx*dx + dy*dy);

            if (!initialDistance) {
                initialDistance = distance;
            } else {
                let scale = distance / initialDistance;
                let newWidth = overlay.offsetWidth * scale;
                if (newWidth > 50 && newWidth < 600) {
                    overlay.style.width = newWidth + "px";
                }
            }
        }
    });

    overlay.addEventListener("touchend", e => {
        if (e.touches.length < 2) {
            initialDistance = null;
        }
    });

</script>
</body>
</html>
