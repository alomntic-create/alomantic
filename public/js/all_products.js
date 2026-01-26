document.addEventListener("DOMContentLoaded", () => {
    const productsGrid = document.getElementById("productsGrid");
    const sortBy = document.getElementById("sortBy");
    const searchInput = document.getElementById("searchInput");
    const categoryLinks = document.querySelectorAll(".category-navbar a");

    function filterAndSort() {
        const searchText = searchInput.value.toLowerCase();
        const sortValue = sortBy.value;
        const activeCategory = document.querySelector(".category-navbar a.active").dataset.category;

        let cards = Array.from(productsGrid.getElementsByClassName("product-card"));

        // 🔸 فلترة
        cards.forEach(card => {
            const name = card.dataset.name.toLowerCase();
            const category = card.dataset.category;

            const matchSearch = name.includes(searchText);
            const matchCategory = (activeCategory === "all" || category === activeCategory);

            card.style.display = (matchSearch && matchCategory) ? "block" : "none";
        });

        // 🔸 فرز
        cards.sort((a, b) => {
            if (sortValue === "name") {
                return a.dataset.name.localeCompare(b.dataset.name, 'ar');
            } else {
                return new Date(b.dataset.date) - new Date(a.dataset.date);
            }
        });

        cards.forEach(card => productsGrid.appendChild(card));
    }

    // أحداث
    sortBy.addEventListener("change", filterAndSort);
    searchInput.addEventListener("input", filterAndSort);

    categoryLinks.forEach(link => {
        link.addEventListener("click", e => {
            e.preventDefault();
            categoryLinks.forEach(l => l.classList.remove("active"));
            link.classList.add("active");
            filterAndSort();
        });
    });

    filterAndSort();
});
