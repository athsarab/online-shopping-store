(function () {
    "use strict";

    function initPageTransitions() {
        var overlay = document.querySelector(".page-transition-overlay");
        var banner = document.querySelector(".page-transition-banner");
        var titleEl = document.getElementById("page-transition-title");
        if (!overlay || !banner || !titleEl) return;

        var leaveTimer = null;
        var activeHref = null;

        var pageTitles = {
            "index.php":           "Home",
            "men.php":             "Men",
            "women.php":           "Women",
            "kids.php":            "Kids",
            "sales.php":           "Sales",
            "contactnew.php":      "Contact Us",
            "new.php":             "New Arrivals",
            "login.php":           "Login",
            "signup.php":          "Sign Up",
            "checkout.php":        "Checkout",
            "faq.php":             "FAQs",
            "return.php":          "Return & Exchange",
            "termsofuse.php":      "Terms of Use",
            "privacy & policy.php": "Privacy & Policy",
            "seen.php":            "Contact Sent",
            "conseen.php":         "Contact Sent",
            "end.php":             "Order Complete"
        };

        var pageIcons = {
            "index.php":           "🏠",
            "men.php":             "👔",
            "women.php":           "👗",
            "kids.php":            "🧸",
            "sales.php":           "🏷️",
            "contactnew.php":      "📬",
            "new.php":             "✨",
            "login.php":           "🔑",
            "signup.php":          "📝",
            "checkout.php":        "🛒",
            "faq.php":             "❓",
            "return.php":          "🔄",
            "termsofuse.php":      "📋",
            "privacy & policy.php": "🔒",
            "seen.php":            "✅",
            "conseen.php":         "✅",
            "end.php":             "🎉"
        };

        function normalizeFileName(url) {
            var file = (url.pathname || "").split("/").pop() || "index.php";
            try {
                return decodeURIComponent(file).toLowerCase();
            } catch (err) {
                return file.toLowerCase();
            }
        }

        function resolvePageName(url, link) {
            var fileName = normalizeFileName(url);
            if (pageTitles[fileName]) return { name: pageTitles[fileName], icon: pageIcons[fileName] || "📄" };

            var text = "";
            if (link) {
                text = (link.textContent || "").replace(/\s+/g, " ").trim();
            }
            var name = text || fileName.replace(/\.php$/i, "").replace(/[-_]+/g, " ");
            return { name: name, icon: "📄" };
        }

        var iconEl    = document.getElementById("page-transition-icon");

        function resolvePageIcon(fileName) {
            return pageIcons[fileName] || "📄";
        }

        function resetTransition() {
            document.body.classList.remove("page-leaving");
            document.body.classList.remove("page-transition-ready");
            overlay.classList.remove("is-visible");
            banner.classList.remove("is-visible");
            banner.setAttribute("aria-hidden", "true");
            document.body.removeAttribute("aria-busy");
            activeHref = null;
        }

        function showTransition(pageName, pageIcon) {
            titleEl.textContent = pageName;
            if (iconEl) iconEl.textContent = pageIcon || "📄";
            banner.setAttribute("aria-hidden", "false");
            document.body.setAttribute("aria-busy", "true");
            document.body.classList.add("page-transition-ready");
            document.body.classList.add("page-leaving");
            overlay.classList.add("is-visible");
            banner.classList.add("is-visible");
        }

        function markReady() {
            document.body.classList.add("page-ready");
        }

        window.addEventListener("pageshow", resetTransition);

        window.requestAnimationFrame(function () {
            window.requestAnimationFrame(markReady);
        });

        document.addEventListener(
            "pointerdown",
            function (e) {
                if (e.defaultPrevented) return;
                if (e.pointerType === "mouse" && e.button !== 0) return;
                if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;

                var link = e.target.closest ? e.target.closest("a[href]") : null;
                if (!link) return;

                var href = link.getAttribute("href") || "";
                if (!href || href.charAt(0) === "#") return;
                if (link.hasAttribute("download")) return;
                if (link.getAttribute("target") === "_blank") return;
                if (href.indexOf("javascript:") === 0) return;

                var destination;
                try {
                    destination = new URL(link.href, window.location.href);
                } catch (err) {
                    return;
                }

                if (destination.origin !== window.location.origin) return;
                if (destination.pathname === window.location.pathname && destination.search === window.location.search) return;

                activeHref = destination.href;
                var resolved = resolvePageName(destination, link);
                showTransition(resolved.name, resolved.icon);
            },
            true
        );

        document.addEventListener(
            "click",
            function (e) {
                if (e.defaultPrevented) return;
                if (e.button !== 0 || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;

                var link = e.target.closest ? e.target.closest("a[href]") : null;
                if (!link) return;

                var href = link.getAttribute("href") || "";
                if (!href || href.charAt(0) === "#") return;
                if (link.hasAttribute("download")) return;
                if (link.getAttribute("target") === "_blank") return;
                if (href.indexOf("javascript:") === 0) return;

                var destination;
                try {
                    destination = new URL(link.href, window.location.href);
                } catch (err) {
                    return;
                }

                if (destination.origin !== window.location.origin) return;
                if (destination.pathname === window.location.pathname && destination.search === window.location.search) return;

                e.preventDefault();
                if (activeHref !== destination.href) {
                    activeHref = destination.href;
                    var resolved = resolvePageName(destination, link);
                    showTransition(resolved.name, resolved.icon);
                }

                if (leaveTimer) window.clearTimeout(leaveTimer);
                leaveTimer = window.setTimeout(function () {
                    if (activeHref === destination.href) {
                        window.location.href = destination.href;
                    }
                }, 950);
            },
            true
        );
    }

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
        initPageTransitions();
        setYear();
        initBackToTop();
    });
})();
