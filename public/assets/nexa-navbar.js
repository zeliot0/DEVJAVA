/* =========================
   NEXA NAVBAR (Theme + Lang + Mobile + Search toast)
   ========================= */
(() => {
  // ===== THEME =====
  const themeBtn = document.getElementById("themeToggle");
  const html = document.documentElement;

  function setTheme(theme){
    html.setAttribute("data-theme", theme);
    localStorage.setItem("theme", theme);
    if (themeBtn){
      themeBtn.innerHTML = (theme === "dark")
        ? '<i class="fa-solid fa-moon"></i>'
        : '<i class="fa-solid fa-sun"></i>';
    }
  }

  setTheme(localStorage.getItem("theme") || "dark");
  themeBtn?.addEventListener("click", () => {
    const cur = html.getAttribute("data-theme") || "dark";
    setTheme(cur === "dark" ? "light" : "dark");
  });

  // ===== LANGUAGE =====
  const translations = {
    fr: {
      menu:"Menu",
      nav1:"Fonctionnalités", nav2:"Tarifs", nav3:"Flux", nav4:"Blog", nav5:"Connexion",
      cta:"Commencer gratuitement",
      searchPH:"Rechercher...",
      toastEmpty:"Écris quelque chose pour rechercher 🙂",
      toastResult:(q)=>`Recherche : "${q}" (demo UI)`,
      banner:'<strong>Stand for Freedom</strong> • Justice • Dignité • Humanité'
    },
    en: {
      menu:"Menu",
      nav1:"Features", nav2:"Pricing", nav3:"Flow", nav4:"Blog", nav5:"Login",
      cta:"Start for free",
      searchPH:"Search...",
      toastEmpty:"Type something to search 🙂",
      toastResult:(q)=>`Search: "${q}" (UI demo)`,
      banner:'<strong>Stand for Freedom</strong> • Justice • Dignity • Humanity'
    },
    ar: {
      menu:"القائمة",
      nav1:"الميزات", nav2:"الأسعار", nav3:"التدفق", nav4:"مدونة", nav5:"تسجيل الدخول",
      cta:"ابدأ مجاناً",
      searchPH:"ابحث...",
      toastEmpty:"اكتب شيئاً للبحث 🙂",
      toastResult:(q)=>`بحث: "${q}" (واجهة تجريبية)`,
      banner:'<strong>قف مع الحرية</strong> • عدالة • كرامة • إنسانية'
    }
  };

  const langBtn = document.getElementById("nxLangBtn");
  const langMenu = document.getElementById("nxLangMenu");
  const currentLang = document.getElementById("nxCurrentLang");

  function applyLanguage(lang){
    const t = translations[lang] || translations.fr;
    localStorage.setItem("lang", lang);
    currentLang.textContent = lang.toUpperCase();

    document.documentElement.dir = (lang === "ar") ? "rtl" : "ltr";
    document.documentElement.lang = lang;

    // Desktop nav
    document.getElementById("nxNav1").textContent = t.nav1;
    document.getElementById("nxNav2").textContent = t.nav2;
    document.getElementById("nxNav3").textContent = t.nav3;
    document.getElementById("nxNav4").textContent = t.nav4;
    document.getElementById("nxNav5").textContent = t.nav5;

    // Mobile nav
    document.getElementById("nxMnav1").textContent = t.nav1;
    document.getElementById("nxMnav2").textContent = t.nav2;
    document.getElementById("nxMnav3").textContent = t.nav3;
    document.getElementById("nxMnav4").textContent = t.nav4;
    document.getElementById("nxMnav5").textContent = t.nav5;

    // CTA
    document.getElementById("nxHeaderCTA").textContent = t.cta;
    document.getElementById("nxDrawerCTA").textContent = t.cta;

    // Drawer title
    document.getElementById("nxDrawerTitle").textContent = t.menu;

    // Search placeholders (navbar only)
    const s1 = document.getElementById("nxSearchInput");
    const s2 = document.getElementById("nxSearchInputMobile");
    if (s1) s1.placeholder = t.searchPH;
    if (s2) s2.placeholder = t.searchPH;

    // Banner
    document.getElementById("nxBannerText").innerHTML = t.banner;
    document.getElementById("nxBannerTextClone").innerHTML = t.banner;
  }

  function closeLangMenu(){
    langMenu?.classList.remove("active");
    langBtn?.setAttribute("aria-expanded","false");
  }

  langBtn?.addEventListener("click", (e) => {
    e.stopPropagation();
    langMenu?.classList.toggle("active");
    langBtn.setAttribute("aria-expanded", langMenu.classList.contains("active") ? "true" : "false");
  });

  langMenu?.querySelectorAll("[data-lang]").forEach(item => {
    item.addEventListener("click", () => {
      applyLanguage(item.dataset.lang);
      closeLangMenu();
    });
  });

  document.addEventListener("click", closeLangMenu);
  document.addEventListener("keydown", (e) => { if(e.key === "Escape") closeLangMenu(); });

  applyLanguage(localStorage.getItem("lang") || "fr");

  // ===== MOBILE DRAWER =====
  const menuBtn = document.getElementById("nxMenuBtn");
  const closeDrawer = document.getElementById("nxCloseDrawer");
  const backdrop = document.getElementById("nxBackdrop");

  function openMenu(){ document.body.classList.add("nx-menu-open"); }
  function closeMenu(){ document.body.classList.remove("nx-menu-open"); }

  menuBtn?.addEventListener("click", openMenu);
  closeDrawer?.addEventListener("click", closeMenu);
  backdrop?.addEventListener("click", closeMenu);

  document.querySelectorAll(".nx-drawer-nav a").forEach(a => a.addEventListener("click", closeMenu));
  document.addEventListener("keydown", (e) => { if(e.key === "Escape") closeMenu(); });

  // ===== SEARCH TOAST (UI DEMO) =====
  const toast = document.getElementById("nxToast");
  function showToast(msg){
    if(!toast) return;
    toast.textContent = msg;
    toast.classList.add("show");
    clearTimeout(showToast._t);
    showToast._t = setTimeout(()=> toast.classList.remove("show"), 2200);
  }
  function getLang(){ return localStorage.getItem("lang") || "fr"; }
  function handleSearch(query){
    const lang = getLang();
    const t = translations[lang] || translations.fr;
    const q = (query || "").trim();
    if(!q) return showToast(t.toastEmpty);
    showToast(t.toastResult(q));
  }

  document.getElementById("nxSearchForm")?.addEventListener("submit", (e)=>{
    e.preventDefault();
    handleSearch(document.getElementById("nxSearchInput")?.value);
  });

  document.getElementById("nxSearchFormMobile")?.addEventListener("submit", (e)=>{
    e.preventDefault();
    handleSearch(document.getElementById("nxSearchInputMobile")?.value);
  });
})();
