/* public/assets/executions-consult-vue.js */
(() => {
  console.log("VUE EXEC CONSULT BTN LOADED ✅ (view only)");

  function findTaskId(card) {
    return card?.dataset?.id || card?.getAttribute("data-id") || null;
  }

  function findTaskTitle(card) {
    const t = card.querySelector(".task-title")?.textContent?.trim();
    if (t) return t;
    const h = card.querySelector("h4,h3,h2")?.textContent?.trim();
    if (h) return h;
    return "—";
  }

  function ensureMountPoint(card) {
    let mp = card.querySelector(".vue-exec-mount");
    if (mp) return mp;

    mp = document.createElement("span");
    mp.className = "vue-exec-mount";

    const actions = card.querySelector(".task-actions");
    if (actions) actions.appendChild(mp);
    else card.appendChild(mp);

    return mp;
  }

  function injectCSSOnce() {
    if (document.getElementById("vue-exec-btn-css")) return;
    const style = document.createElement("style");
    style.id = "vue-exec-btn-css";
    style.textContent = `
      .vue-exec-mount{ display:inline-flex; align-items: center; }
    `;
    document.head.appendChild(style);
  }

  function mountVueButton(card) {
    const mp = ensureMountPoint(card);
    if (mp.__vue_app__) return;

    const taskId = findTaskId(card);
    if (!taskId) return;

    const taskTitle = findTaskTitle(card);

    const { createApp, h } = window.Vue;

    const App = {
      name: "ExecConsultButton",
      setup() {
        const openExec = () => {
          // ✅ create a temp element that executions.js listens to
          const tmp = document.createElement("button");
          tmp.setAttribute("data-open-exec", "");
          // Remove "view" mode restriction so user can add/edit executions too
          // tmp.setAttribute("data-open-exec-mode", "view"); 
          tmp.setAttribute("data-task-id", String(taskId));
          tmp.setAttribute("data-task-title", taskTitle);
          document.body.appendChild(tmp);
          tmp.click();
          tmp.remove();
        };

        return () =>
          h(
            "button",
            {
              // Use standard app class "icon-btn" + margin helpers if needed
              class: "icon-btn",
              style: { marginLeft: "4px" },
              type: "button",
              title: "Journal d’exécution",
              onClick: (e) => {
                e.stopPropagation();
                openExec();
              },
            },
            [h("i", { class: "fa-solid fa-scroll" })]
          );
      },
    };

    const app = createApp(App);
    mp.__vue_app__ = app;
    app.mount(mp);
  }

  function scan() {
    injectCSSOnce();
    document.querySelectorAll(".task").forEach((card) => mountVueButton(card));
  }

  setTimeout(scan, 500);
  setTimeout(scan, 1200);

  const boardRoot = document.querySelector(".board") || document.body;
  const obs = new MutationObserver(() => scan());
  obs.observe(boardRoot, { childList: true, subtree: true });
})();
