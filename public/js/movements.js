const holders = document.querySelectorAll('.holder');

const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show'); // نضيف الكلاس للعنصر اللي ظهر
            obs.unobserve(entry.target); // نوقف المراقبة لهذا العنصر
        }
    });
}, {
    threshold: 0.2
});

// نراقب كل عنصر على حدة
holders.forEach(holder => observer.observe(holder));
