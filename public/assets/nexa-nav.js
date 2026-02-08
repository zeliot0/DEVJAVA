/**
 * NEXA Navigation & Language Engine
 * Optimized for performance and professional standards.
 */

window.NEXA_NAV = (() => {
    const translations = {
        fr: {
            menu: "Menu",
            nav1: "Fonctionnalités", nav2: "Tarifs", nav3: "Flux", nav4: "Blog", nav5: "Connexion",
            cta: "Commencer gratuitement",
            searchPH: "Rechercher...",
            toastEmpty: "Écris quelque chose pour rechercher 🙂",
            toastResult: (q) => `Recherche : "${q}" (démo UI)`,
            banner: '<strong>Stand for Freedom</strong> • Justice • Dignité • Humanité'
        },
        en: {
            menu: "Menu",
            nav1: "Features", nav2: "Pricing", nav3: "Flow", nav4: "Blog", nav5: "Login",
            cta: "Start for free",
            searchPH: "Search...",
            toastEmpty: "Type something to search 🙂",
            toastResult: (q) => `Search: "${q}" (UI demo)`,
            banner: '<strong>Stand for Freedom</strong> • Justice • Dignity • Humanity'
        },
        ar: {
            menu: "القائمة",
            nav1: "الميزات", nav2: "الأسعار", nav3: "التدفق", nav4: "مدونة", nav5: "تسجيل الدخول",
            cta: "ابدأ مجاناً",
            searchPH: "ابحث...",
            toastEmpty: "اكتب شيئاً للبحث 🙂",
            toastResult: (q) => `بحث: "${q}" (واجهة تجريبية)`,
            banner: '<strong>قف مع الحرية</strong> • عدالة • كرامة • إنسانية'
        }
    };

    const refs = {
        html: document.documentElement,
        body: document.body,
        themeBtn: document.getElementById("themeToggleNav"),
        langBtn: document.getElementById("langBtnNav"),
        langMenu: document.getElementById("langMenuNav"),
        currentLang: document.getElementById("currentLangNav"),
        menuBtn: document.getElementById("menuBtnNav"),
        closeDrawer: document.getElementById("closeDrawerNav"),
        backdrop: document.getElementById("backdropNav"),
        searchForms: [document.getElementById("searchFormNav"), document.getElementById("searchFormMobileNav")],
        searchInputs: [document.getElementById("searchInputNav"), document.getElementById("searchInputMobileNav")],
        toast: document.getElementById("toastNav"),
        bannerTexts: [document.getElementById("bannerTextNav"), document.getElementById("bannerTextCloneNav")]
    };

    function setTheme(theme) {
        refs.html.setAttribute("data-theme", theme);
        localStorage.setItem("theme", theme);
        if (refs.themeBtn) {
            refs.themeBtn.innerHTML = theme === "dark"
                ? '<i class="fa-solid fa-moon"></i>'
                : '<i class="fa-solid fa-sun"></i>';
        }
        // Sync with other theme buttons if they exist
        const syncBtn = document.getElementById("themeToggle");
        if (syncBtn) {
            syncBtn.innerHTML = theme === "dark" ? '<i class="fas fa-moon"></i>' : '<i class="fas fa-sun"></i>';
        }
    }

    function applyLanguage(lang) {
        const t = translations[lang] || translations.fr;
        localStorage.setItem("lang", lang);
        if (refs.currentLang) refs.currentLang.textContent = lang.toUpperCase();

        refs.html.dir = (lang === "ar") ? "rtl" : "ltr";
        refs.html.lang = lang;

        // Update Nav items
        const navIds = ["nav_1", "nav_2", "nav_3", "nav_4", "nav_5"];
        const mobileNavIds = ["mnav_1", "mnav_2", "mnav_3", "mnav_4", "mnav_5"];

        navIds.forEach((id, i) => {
            const el = document.getElementById(id);
            if (el) el.textContent = t[`nav${i + 1}`];
        });

        mobileNavIds.forEach((id, i) => {
            const el = document.getElementById(id);
            if (el) el.textContent = t[`nav${i + 1}`];
        });

        // Update text elements
        const ctas = [document.getElementById("headerCTANav"), document.getElementById("drawerCTANav")];
        ctas.forEach(cta => { if (cta) cta.textContent = t.cta; });

        const drawerTitle = document.getElementById("drawerTitleNav");
        if (drawerTitle) drawerTitle.textContent = t.menu;

        refs.searchInputs.forEach(input => { if (input) input.placeholder = t.searchPH; });
        refs.bannerTexts.forEach(txt => { if (txt) txt.innerHTML = t.banner; });
    }

    function showToast(msg) {
        if (!refs.toast) return;
        refs.toast.textContent = msg;
        refs.toast.classList.add("show");
        clearTimeout(window._nexaToastTimer);
        window._nexaToastTimer = setTimeout(() => refs.toast.classList.remove("show"), 2500);
    }

    function init() {
        // Theme setup
        const savedTheme = localStorage.getItem("theme") || "dark";
        setTheme(savedTheme);
        refs.themeBtn?.addEventListener("click", () => {
            const current = refs.html.getAttribute("data-theme") || "dark";
            setTheme(current === "dark" ? "light" : "dark");
        });

        // Language setup
        const savedLang = localStorage.getItem("lang") || "fr";
        applyLanguage(savedLang);

        refs.langBtn?.addEventListener("click", (e) => {
            e.stopPropagation();
            refs.langMenu?.classList.toggle("active");
        });

        refs.langMenu?.querySelectorAll("[data-lang]").forEach(item => {
            item.addEventListener("click", () => {
                applyLanguage(item.dataset.lang);
                refs.langMenu.classList.remove("active");
            });
        });

        document.addEventListener("click", () => refs.langMenu?.classList.remove("active"));

        // Mobile Menu setup
        refs.menuBtn?.addEventListener("click", () => refs.body.classList.add("menu-open-new"));
        refs.closeDrawer?.addEventListener("click", () => refs.body.classList.remove("menu-open-new"));
        refs.backdrop?.addEventListener("click", () => refs.body.classList.remove("menu-open-new"));

        // Search setup
        refs.searchForms.forEach((form, i) => {
            form?.addEventListener("submit", (e) => {
                e.preventDefault();
                const query = refs.searchInputs[i]?.value;
                const lang = localStorage.getItem("lang") || "fr";
                const t = translations[lang] || translations.fr;
                if (!query || !query.trim()) return showToast(t.toastEmpty);
                showToast(t.toastResult(query));
            });
        });

        // External sync hook
        window.addEventListener("nexaSyncTheme", (e) => setTheme(e.detail.theme));
    }

    // Auto-init if DOM ready
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", init);
    } else {
        init();
    }

    return { setTheme, applyLanguage, showToast };
})();
