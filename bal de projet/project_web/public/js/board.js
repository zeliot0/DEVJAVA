// =========================
// THEME TOGGLE (dark / light)
// =========================
const themeBtn = document.getElementById("themeToggle");
const html = document.documentElement;

function setTheme(theme){
  html.setAttribute("data-theme", theme);
  localStorage.setItem("theme", theme);
  if (themeBtn) {
    themeBtn.innerHTML = (theme === "dark")
      ? '<i class="fa-solid fa-moon"></i>'
      : '<i class="fa-solid fa-sun"></i>';
  }
}

setTheme(localStorage.getItem("theme") || "dark");

if (themeBtn) {
  themeBtn.addEventListener("click", () => {
    const cur = html.getAttribute("data-theme") || "dark";
    setTheme(cur === "dark" ? "light" : "dark");
  });
}

// =========================
// LANGUAGE (FR / EN / AR)
// =========================
const translations = {
  fr: {
    menu:"Menu",
    nav1:"Fonctionnalités", nav2:"Tarifs", nav3:"Flux", nav4:"Blog", nav5:"Connexion",
    cta:"Commencer gratuitement",
    searchPH:"Rechercher...",
    toastEmpty:"Écris quelque chose pour rechercher 🙂",
    toastResult:(q)=>`Recherche : "${q}"`,
    banner:'<strong>Stand for Freedom</strong> • Justice • Dignité • Humanité'
  },
  en: {
    menu:"Menu",
    nav1:"Features", nav2:"Pricing", nav3:"Flow", nav4:"Blog", nav5:"Login",
    cta:"Start for free",
    searchPH:"Search...",
    toastEmpty:"Type something to search 🙂",
    toastResult:(q)=>`Search: "${q}"`,
    banner:'<strong>Stand for Freedom</strong> • Justice • Dignity • Humanity'
  },
  ar: {
    menu:"القائمة",
    nav1:"الميزات", nav2:"الأسعار", nav3:"التدفق", nav4:"مدونة", nav5:"تسجيل الدخول",
    cta:"ابدأ مجاناً",
    searchPH:"ابحث...",
    toastEmpty:"اكتب شيئاً للبحث 🙂",
    toastResult:(q)=>`بحث: "${q}"`,
    banner:'<strong>قف مع الحرية</strong> • عدالة • كرامة • إنسانية'
  }
};

const langBtn = document.getElementById("langBtn");
const langMenu = document.getElementById("langMenu");
const currentLang = document.getElementById("currentLang");

function applyLanguage(lang){
  const t = translations[lang] || translations.fr;
  localStorage.setItem("lang", lang);

  if (currentLang) currentLang.textContent = lang.toUpperCase();

  document.documentElement.dir = (lang === "ar") ? "rtl" : "ltr";
  document.documentElement.lang = lang;

  const map = ["nav1","nav2","nav3","nav4","nav5"];
  map.forEach(id => {
    const el = document.getElementById(id);
    const mel = document.getElementById("m"+id);
    if (el) el.textContent = t[id];
    if (mel) mel.textContent = t[id];
  });

  const headerCTA = document.getElementById("headerCTA");
  const drawerCTA = document.getElementById("drawerCTA");
  if (headerCTA) headerCTA.textContent = t.cta;
  if (drawerCTA) drawerCTA.textContent = t.cta;

  const drawerTitle = document.getElementById("drawerTitle");
  if (drawerTitle) drawerTitle.textContent = t.menu;

  const searchInput = document.getElementById("searchInput");
  const searchInputMobile = document.getElementById("searchInputMobile");
  if (searchInput) searchInput.placeholder = t.searchPH;
  if (searchInputMobile) searchInputMobile.placeholder = t.searchPH;

  const bannerText = document.getElementById("bannerText");
  const bannerTextClone = document.getElementById("bannerTextClone");
  if (bannerText) bannerText.innerHTML = t.banner;
  if (bannerTextClone) bannerTextClone.innerHTML = t.banner;
}

if (langBtn && langMenu) {
  langBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    langMenu.classList.toggle("active");
  });

  langMenu.querySelectorAll("[data-lang]").forEach(item => {
    item.addEventListener("click", () => {
      applyLanguage(item.dataset.lang);
      langMenu.classList.remove("active");
    });
  });

  document.addEventListener("click", () => langMenu.classList.remove("active"));
}

applyLanguage(localStorage.getItem("lang") || "fr");

// =========================
// MOBILE DRAWER
// =========================
const menuBtn = document.getElementById("menuBtn");
const closeDrawer = document.getElementById("closeDrawer");
const backdrop = document.getElementById("backdrop");

function openMenu(){ document.body.classList.add("menu-open"); }
function closeMenu(){ document.body.classList.remove("menu-open"); }

if (menuBtn) menuBtn.addEventListener("click", openMenu);
if (closeDrawer) closeDrawer.addEventListener("click", closeMenu);
if (backdrop) backdrop.addEventListener("click", closeMenu);

document.querySelectorAll(".drawer-nav a").forEach(a =>
  a.addEventListener("click", closeMenu)
);

// =========================
// SEARCH (UI DEMO)
// =========================
const toast = document.getElementById("toast");

function showToast(msg){
  if (!toast) return;
  toast.textContent = msg;
  toast.classList.add("show");
  clearTimeout(showToast._t);
  showToast._t = setTimeout(() => toast.classList.remove("show"), 2200);
}

function getLang(){
  return localStorage.getItem("lang") || "fr";
}

function handleSearch(query){
  const t = translations[getLang()];
  const q = (query || "").trim();
  if (!q) return showToast(t.toastEmpty);
  showToast(t.toastResult(q));
}

const searchForm = document.getElementById("searchForm");
const searchFormMobile = document.getElementById("searchFormMobile");

if (searchForm) {
  searchForm.addEventListener("submit", (e) => {
    e.preventDefault();
    handleSearch(document.getElementById("searchInput")?.value);
  });
}

if (searchFormMobile) {
  searchFormMobile.addEventListener("submit", (e) => {
    e.preventDefault();
    handleSearch(document.getElementById("searchInputMobile")?.value);
  });
}
