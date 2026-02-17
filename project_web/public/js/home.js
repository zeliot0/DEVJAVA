/* =========================
   THEME DARK / LIGHT
========================= */
(function themeToggle() {
  const toggleBtn = document.getElementById('themeToggle');
  if (!toggleBtn) return;

  const html = document.documentElement;
  const savedTheme = localStorage.getItem('theme') || 'dark';

  html.setAttribute('data-theme', savedTheme);
  toggleBtn.innerHTML = savedTheme === 'dark'
    ? '<i class="fas fa-moon"></i>'
    : '<i class="fas fa-sun"></i>';

  toggleBtn.addEventListener('click', () => {
    const newTheme = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
    html.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);

    toggleBtn.innerHTML = newTheme === 'dark'
      ? '<i class="fas fa-moon"></i>'
      : '<i class="fas fa-sun"></i>';
  });
})();


/* =========================
   FADE-IN ON SCROLL
========================= */
(function fadeOnScroll() {
  const elements = document.querySelectorAll(
    '.hero, .features, .pricing, .flow-section, .cta-final'
  );

  if (!elements.length) return;

  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          obs.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.15 }
  );

  elements.forEach(el => observer.observe(el));
})();


/* =========================
   FLOW SLIDER
========================= */
(function flowSlider() {
  const slider = document.getElementById('flowSlider');
  const wrapper = document.getElementById('flowWrapper');
  const dots = document.querySelectorAll('.slider-dot');
  const prevBtn = document.getElementById('prevSlide');
  const nextBtn = document.getElementById('nextSlide');

  if (!slider || !wrapper || dots.length === 0) return;

  const SLIDE_COUNT = dots.length;
  let currentIndex = 0;
  let interval;

  function goToSlide(index) {
    currentIndex = (index + SLIDE_COUNT) % SLIDE_COUNT;
    slider.style.transform = `translateX(-${currentIndex * (100 / SLIDE_COUNT)}%)`;

    dots.forEach((dot, i) => {
      dot.classList.toggle('active', i === currentIndex);
    });
  }

  function startAutoSlide() {
    interval = setInterval(() => {
      goToSlide(currentIndex + 1);
    }, 6500);
  }

  function stopAutoSlide() {
    clearInterval(interval);
  }

  dots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
      goToSlide(i);
      stopAutoSlide();
      startAutoSlide();
    });
  });

  if (prevBtn) {
    prevBtn.addEventListener('click', () => {
      goToSlide(currentIndex - 1);
      stopAutoSlide();
      startAutoSlide();
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', () => {
      goToSlide(currentIndex + 1);
      stopAutoSlide();
      startAutoSlide();
    });
  }

  wrapper.addEventListener('mouseenter', stopAutoSlide);
  wrapper.addEventListener('mouseleave', startAutoSlide);

  startAutoSlide();
})();
