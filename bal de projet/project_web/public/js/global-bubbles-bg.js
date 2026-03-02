(function () {
  function initGlobalBubbles() {
    var interBubble = document.querySelector('.global-bubbles-bg .interactive');
    if (!interBubble) return;

    var curX = 0;
    var curY = 0;
    var tgX = 0;
    var tgY = 0;

    var move = function () {
      curX += (tgX - curX) / 20;
      curY += (tgY - curY) / 20;
      interBubble.style.transform = 'translate(' + Math.round(curX) + 'px, ' + Math.round(curY) + 'px)';
      window.requestAnimationFrame(move);
    };

    window.addEventListener('mousemove', function (event) {
      tgX = event.clientX;
      tgY = event.clientY;
    }, { passive: true });

    window.addEventListener('touchmove', function (event) {
      if (!event.touches || !event.touches[0]) return;
      tgX = event.touches[0].clientX;
      tgY = event.touches[0].clientY;
    }, { passive: true });

    move();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initGlobalBubbles);
  } else {
    initGlobalBubbles();
  }
})();
