(function () {
    "use strict";

    function getCurrentPage() {
        var path = window.location.pathname || "";
        var file = path.split("/").pop();
        return file || "index.php";
    }

    function setActiveNavLink() {
        var current = getCurrentPage().toLowerCase();
        var links = document.querySelectorAll(".navbar a[href]");
        for (var i = 0; i < links.length; i++) { 
            var href = (links[i].getAttribute("href") || "").toLowerCase();
            if (!href) continue;

            // Mark Home active on both "" and index.php
            if ((current === "" || current === "index.php") && (href === "index.php" || href === "./index.php")) {
                links[i].classList.add("is-active");
                continue;
            }

            if (href === current) {
                links[i].classList.add("is-active");
            }
        }
    }

    function initMobileMenu() {
        var toggle = document.getElementById("menu-toggle");
        var nav = document.getElementById("primary-nav");
        if (!toggle || !nav) return;

        function closeMenu() {
            nav.classList.remove("open");
            toggle.setAttribute("aria-expanded", "false");
            document.body.classList.remove("nav-open");
        }

        function openMenu() {
            nav.classList.add("open");
            toggle.setAttribute("aria-expanded", "true");
            document.body.classList.add("nav-open");
        }

        toggle.addEventListener("click", function () {
            var isOpen = nav.classList.contains("open");
            if (isOpen) closeMenu();
            else openMenu();
        });

        // Close on link click (mobile)
        nav.addEventListener("click", function (e) {
            var target = e.target;
            if (target && target.tagName === "A") {
                closeMenu();
            }
        });

        // Close on Escape
        document.addEventListener("keydown", function (e) {
            if (e.key === "Escape") closeMenu();
        });

        // Close when switching to desktop
        var mq = window.matchMedia("(min-width: 1071px)");
        if (mq && typeof mq.addEventListener === "function") {
            mq.addEventListener("change", function (evt) {
                if (evt.matches) closeMenu();
            });
        } else if (mq && typeof mq.addListener === "function") {
            mq.addListener(function (evt) {
                if (evt.matches) closeMenu();
            });
        }

        // Click outside to close (mobile)
        document.addEventListener("click", function (e) {
            if (!nav.classList.contains("open")) return;
            if (toggle.contains(e.target)) return;
            if (nav.contains(e.target)) return;
            closeMenu();
        });
    }

    function initStickyHeader() {
        var header = document.querySelector("header");
        if (!header) return;

        var ticking = false;

        function update() {
            ticking = false;
            if (window.scrollY > 10) header.classList.add("is-scrolled");
            else header.classList.remove("is-scrolled");
        }

        window.addEventListener(
            "scroll",
            function () {
                if (ticking) return;
                ticking = true;
                window.requestAnimationFrame(update);
            },
            { passive: true }
        );

        update();
    }

    document.addEventListener("DOMContentLoaded", function () {
        setActiveNavLink();
        initMobileMenu();
        initStickyHeader();
    });
})();
