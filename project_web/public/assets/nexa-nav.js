/**
 * NEXA Navigation & Language Engine
 * Optimized for performance and professional standards.
 */

window.NEXA_NAV = (() => {
    const translations = {
        fr: {
            menu: "Menu",
            nav1: "TASKS", nav2: "CONSCIENCE", nav3: "GOALS", nav4: "PRODUIT", nav5: "CONNEXION",
            cta: "Commencer gratuitement",
            searchPH: "Rechercher...",
            toastEmpty: "Écris quelque chose pour rechercher 🙂",
            toastResult: (q) => `Recherche : "${q}" (démo UI)`,
            banner: '<strong>Stand for Freedom</strong> &bull; Justice &bull; Dignity &bull; Humanity'
        },
        en: {
            menu: "Menu",
            nav1: "TASKS", nav2: "CONSCIENCE", nav3: "GOALS", nav4: "PRODUIT", nav5: "CONNEXION",
            cta: "Start for free",
            searchPH: "Search...",
            toastEmpty: "Type something to search 🙂",
            toastResult: (q) => `Search: "${q}" (UI demo)`,
            banner: '<strong>Stand for Freedom</strong> &bull; Justice &bull; Dignity &bull; Humanity'
        },
        ar: {
            menu: "القائمة",
            nav1: "المهام", nav2: "الوعي", nav3: "الأهداف", nav4: "المنتج", nav5: "تسجيل الدخول",
            cta: "ابدأ مجاناً",
            searchPH: "ابحث...",
            toastEmpty: "اكتب شيئاً للبحث 🙂",
            toastResult: (q) => `بحث: "${q}" (واجهة تجريبية)`,
            banner: '<strong>Stand for Freedom</strong> &bull; Justice &bull; Dignity &bull; Humanity'
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
        userMenuTrigger: document.getElementById("userMenuTriggerNav"),
        userMenuDropdown: document.getElementById("userMenuDropdownNav"),
        goalsNavLink: document.getElementById("nav_3"),
        goalsPopover: document.getElementById("goalsPopoverNav"),
        searchForms: [document.getElementById("searchFormNav"), document.getElementById("searchFormMobileNav")],
        searchInputs: [document.getElementById("searchInputNav"), document.getElementById("searchInputMobileNav")],
        toast: document.getElementById("toastNav"),
        bannerTexts: [document.getElementById("bannerTextNav"), document.getElementById("bannerTextCloneNav")]
    };

    function mountGoalsPopoverToBody() {
        if (!refs.goalsPopover) return;
        if (refs.goalsPopover.parentElement !== document.body) {
            document.body.appendChild(refs.goalsPopover);
        }
    }

    function setTheme(theme) {
        refs.html.setAttribute("data-theme", theme);
        localStorage.setItem("theme", theme);
        if (refs.themeBtn) {
            refs.themeBtn.innerHTML = theme === "dark"
                ? '<i class="fa-solid fa-moon"></i>'
                : '<i class="fa-solid fa-sun"></i>';
        }
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

        const ctas = [document.getElementById("headerCTANav"), document.getElementById("drawerCTANav")];
        ctas.forEach((cta) => { if (cta) cta.textContent = t.cta; });

        const drawerTitle = document.getElementById("drawerTitleNav");
        if (drawerTitle) drawerTitle.textContent = t.menu;

        refs.searchInputs.forEach((input) => { if (input) input.placeholder = t.searchPH; });
        refs.bannerTexts.forEach((txt) => { if (txt) txt.innerHTML = t.banner; });
    }

    function showToast(msg) {
        if (!refs.toast) return;
        refs.toast.textContent = msg;
        refs.toast.classList.add("show");
        clearTimeout(window._nexaToastTimer);
        window._nexaToastTimer = setTimeout(() => refs.toast.classList.remove("show"), 2500);
    }

    function hideGoalsPopover() {
        refs.goalsPopover?.setAttribute("hidden", "");
    }

    function positionGoalsPopover() {
        if (!refs.goalsNavLink || !refs.goalsPopover) return;
        const rect = refs.goalsNavLink.getBoundingClientRect();
        refs.goalsPopover.style.top = `${Math.round(rect.bottom + 6)}px`;
        refs.goalsPopover.style.left = `${Math.round(rect.left + rect.width / 2)}px`;
        refs.goalsPopover.style.transform = "translateX(-50%)";
    }

    function init() {
        mountGoalsPopoverToBody();

        const savedTheme = localStorage.getItem("theme") || "dark";
        setTheme(savedTheme);
        refs.themeBtn?.addEventListener("click", () => {
            const current = refs.html.getAttribute("data-theme") || "dark";
            setTheme(current === "dark" ? "light" : "dark");
        });

        const savedLang = localStorage.getItem("lang") || "fr";
        applyLanguage(savedLang);

        refs.langBtn?.addEventListener("click", (e) => {
            e.stopPropagation();
            refs.langMenu?.classList.toggle("active");
        });

        refs.userMenuTrigger?.addEventListener("click", (e) => {
            e.stopPropagation();
            const isOpen = refs.userMenuDropdown?.hasAttribute("hidden") ?? false;
            if (isOpen) {
                refs.userMenuDropdown?.removeAttribute("hidden");
                refs.userMenuTrigger?.setAttribute("aria-expanded", "true");
            } else {
                refs.userMenuDropdown?.setAttribute("hidden", "");
                refs.userMenuTrigger?.setAttribute("aria-expanded", "false");
            }
        });

        refs.goalsNavLink?.addEventListener("click", (e) => {
            if (!refs.goalsPopover) return;
            e.preventDefault();
            e.stopPropagation();
            const isHidden = refs.goalsPopover.hasAttribute("hidden");
            if (isHidden) {
                positionGoalsPopover();
                refs.goalsPopover.removeAttribute("hidden");
            } else {
                hideGoalsPopover();
            }
        });

        refs.langMenu?.querySelectorAll("[data-lang]").forEach((item) => {
            item.addEventListener("click", () => {
                applyLanguage(item.dataset.lang);
                refs.langMenu.classList.remove("active");
            });
        });

        document.addEventListener("click", (e) => {
            const clickedLang = refs.langBtn?.contains(e.target) || refs.langMenu?.contains(e.target);
            if (!clickedLang) refs.langMenu?.classList.remove("active");

            const clickedUser = refs.userMenuTrigger?.contains(e.target) || refs.userMenuDropdown?.contains(e.target);
            if (!clickedUser) {
                refs.userMenuDropdown?.setAttribute("hidden", "");
                refs.userMenuTrigger?.setAttribute("aria-expanded", "false");
            }

            const clickedGoals = refs.goalsNavLink?.contains(e.target) || refs.goalsPopover?.contains(e.target);
            if (!clickedGoals) hideGoalsPopover();
        });

        refs.menuBtn?.addEventListener("click", () => refs.body.classList.add("menu-open-new"));
        refs.closeDrawer?.addEventListener("click", () => refs.body.classList.remove("menu-open-new"));
        refs.backdrop?.addEventListener("click", () => refs.body.classList.remove("menu-open-new"));

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

        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape") {
                refs.langMenu?.classList.remove("active");
                refs.userMenuDropdown?.setAttribute("hidden", "");
                refs.userMenuTrigger?.setAttribute("aria-expanded", "false");
                hideGoalsPopover();
            }
        });

        window.addEventListener("resize", () => {
            if (refs.goalsPopover && !refs.goalsPopover.hasAttribute("hidden")) {
                positionGoalsPopover();
            }
        });

        window.addEventListener("nexaSyncTheme", (e) => setTheme(e.detail.theme));
    }

    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", init);
    } else {
        init();
    }

    return { setTheme, applyLanguage, showToast };
})();
