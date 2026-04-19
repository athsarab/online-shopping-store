(function () {
    "use strict";

    function setYear() {
        var yearEl = document.getElementById("footer-year");
        if (!yearEl) return;
        yearEl.textContent = String(new Date().getFullYear());
    }

    function initBackToTop() {
        var btn = document.getElementById("back-to-top");
        if (!btn) return;

        function update() {
            if (window.scrollY > 400) btn.classList.add("is-visible");
            else btn.classList.remove("is-visible");
        }

        btn.addEventListener("click", function (e) {
            e.preventDefault();
            window.scrollTo(0, 0);
        });

        window.addEventListener("scroll", update, { passive: true });
        update();
    }

    document.addEventListener("DOMContentLoaded", function () {
        setYear();
        initBackToTop();
    });
})();
