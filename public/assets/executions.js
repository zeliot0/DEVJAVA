console.log("EXECUTIONS UI LOADED ✅");

async function safeJson(res) {
  const txt = await res.text();
  try { return JSON.parse(txt); }
  catch { return { ok: false, message: txt || "Réponse non JSON" }; }
}

(() => {
  const api = window.NEXA_API;
  if (!api?.exeList || !api?.exeCreate || !api?.exeUpdateBase || !api?.exeDeleteBase) {
    console.error("NEXA_API executions not configured");
    return;
  }

  // Drawer elements
  const overlay = document.getElementById("exeOverlay");
  const drawer = document.getElementById("exeDrawer");
  const closeBtn = document.getElementById("closeExeDrawer");
  const closeBtn2 = document.getElementById("exeCloseBtn");

  const taskTitleEl = document.getElementById("exeTaskTitle");
  const listEl = document.getElementById("exeList");

  const kTotal = document.getElementById("exeKpiTotal");
  const kDoing = document.getElementById("exeKpiDoing");
  const kDone = document.getElementById("exeKpiDone");

  const searchInput = document.getElementById("exeSearch");
  const statusFilter = document.getElementById("exeStatusFilter");

  // Create form (hidden in view-only mode)
  const title = document.getElementById("exeTitle");
  const desc = document.getElementById("exeDesc");
  const status = document.getElementById("exeStatus");
  const save = document.getElementById("exeSaveBtn");
  const editId = document.getElementById("exeEditId");

  const toastHost = document.getElementById("toastHost");

  let currentTaskId = null;
  let currentMode = "full"; // "full" | "view"
  let cache = [];

  function escapeHtml(str) {
    return String(str ?? "").replace(/[&<>"']/g, s => ({
      "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#039;"
    }[s]));
  }

  function extractPlainText(content) {
    if (!content) return "";
    try {
      const data = typeof content === "string" ? JSON.parse(content) : content;
      if (data && data.blocks) {
        return data.blocks
          .map((b) => b.data?.text || b.data?.items?.join(" ") || "")
          .join(" ")
          .replace(/<[^>]+>/g, "");
      }
    } catch (e) { }
    return String(content);
  }

  function toast(msg, type = "info") {
    if (!toastHost) return alert(msg);
    const el = document.createElement("div");
    el.className = "toast";
    el.innerHTML = `
      <div>${type === "success" ? "✅" : type === "error" ? "⛔" : "ℹ️"}</div>
      <div>${escapeHtml(msg)}</div>
      <button class="icon-btn" style="background:transparent;border:none;color:#fff;cursor:pointer;">✕</button>
    `;
    toastHost.appendChild(el);
    el.querySelector("button")?.addEventListener("click", () => el.remove());
    setTimeout(() => el.remove(), 3200);
  }

  function badgeLabel(st) {
    if (st === "done") return "✅ done";
    if (st === "doing") return "🟠 doing";
    return "🔵 todo";
  }

  function nextStatus(st) {
    if (st === "todo") return "doing";
    if (st === "doing") return "done";
    return "todo";
  }

  async function resetForm() {
    if (title) title.value = "";
    if (window.NEXA_EDITOR) await window.NEXA_EDITOR.setEditorData("exeDescEditor", "");
    if (status) status.value = "todo";
    if (editId) editId.value = "";
    if (save) save.innerHTML = `<i class="fa-solid fa-check"></i> Ajouter`;
  }

  function setMode(mode) {
    currentMode = mode === "view" ? "view" : "full";
    if (!drawer) return;
    drawer.classList.toggle("view-only", currentMode === "view");
  }

  async function openDrawer(taskId, taskTitle, mode = "full") {
    currentTaskId = String(taskId);
    setMode(mode);

    if (taskTitleEl) taskTitleEl.textContent = taskTitle || "—";

    overlay?.classList.add("show");
    drawer?.classList.add("open");
    drawer?.setAttribute("aria-hidden", "false");

    await resetForm();
    loadExecutions();
  }

  function closeDrawer() {
    overlay?.classList.remove("show");
    drawer?.classList.remove("open");
    drawer?.setAttribute("aria-hidden", "true");

    currentTaskId = null;
    cache = [];
    if (listEl) listEl.innerHTML = "";
    setMode("full");
  }

  overlay?.addEventListener("click", closeDrawer);
  closeBtn?.addEventListener("click", closeDrawer);
  closeBtn2?.addEventListener("click", closeDrawer);

  async function loadExecutions() {
    if (!currentTaskId) return;
    const url = `${api.exeList}?task_id=${encodeURIComponent(currentTaskId)}`;

    const res = await fetch(url);
    const json = await safeJson(res);

    cache = json?.data || [];
    render();
  }

  function getFiltered() {
    const q = (searchInput?.value || "").toLowerCase().trim();
    const st = statusFilter?.value || "all";

    return cache.filter(e => {
      const okQ = !q
        || (e.title || "").toLowerCase().includes(q)
        || (e.desc || "").toLowerCase().includes(q);
      const okS = (st === "all") || (e.status === st);
      return okQ && okS;
    });
  }

  function render() {
    if (kTotal) kTotal.textContent = String(cache.length);
    if (kDoing) kDoing.textContent = String(cache.filter(x => x.status === "doing").length);
    if (kDone) kDone.textContent = String(cache.filter(x => x.status === "done").length);

    const filtered = getFiltered();
    if (!listEl) return;

    listEl.innerHTML = "";

    if (!filtered.length) {
      listEl.innerHTML = `<div style="opacity:.7;padding:10px;">Aucune exécution pour cette task.</div>`;
      return;
    }

    filtered.forEach(e => {
      const item = document.createElement("div");
      item.className = "exe-item";

      const plainDesc = extractPlainText(e.desc);

      // ✅ In view mode: no actions
      const actionsHtml = (currentMode === "view")
        ? ``
        : `
          <div class="exe-actions">
            <button class="mini-btn" data-act="toggle" data-id="${e.id}" title="Changer statut">
              <i class="fa-solid fa-rotate"></i>
            </button>
            <button class="mini-btn" data-act="edit" data-id="${e.id}" title="Modifier">
              <i class="fa-regular fa-pen-to-square"></i>
            </button>
            <button class="mini-btn" data-act="del" data-id="${e.id}" title="Supprimer">
              <i class="fa-solid fa-trash"></i>
            </button>
          </div>
        `;

      item.innerHTML = `
        <div class="exe-left">
          <span class="exe-badge">${badgeLabel(e.status)}</span>
          <div>
            <div style="font-weight:800;">${escapeHtml(e.title || "")}</div>
            <div style="opacity:.75;margin-top:4px;white-space:pre-wrap;">${escapeHtml(plainDesc || "")}</div>
          </div>
        </div>
        ${actionsHtml}
      `;
      listEl.appendChild(item);
    });
  }

  searchInput?.addEventListener("input", render);
  statusFilter?.addEventListener("change", render);

  // Create/Update (disabled automatically because create card hidden in view mode)
  save?.addEventListener("click", async () => {
    if (!currentTaskId) return;

    const descData = window.NEXA_EDITOR ? await window.NEXA_EDITOR.getEditorData("exeDescEditor") : "";

    const payload = {
      task_id: currentTaskId,
      title: (title?.value || "").trim(),
      desc: descData,
      status: status?.value || "todo"
    };

    if (!payload.title || !payload.desc) {
      toast("Titre et description sont obligatoires.", "error");
      return;
    }

    const isEdit = !!(editId?.value);

    try {
      if (isEdit) {
        const res = await fetch(`${api.exeUpdateBase}/${encodeURIComponent(editId.value)}`, {
          method: "PUT",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ title: payload.title, desc: payload.desc, status: payload.status })
        });
        const j = await safeJson(res);
        if (!j.ok) throw new Error(j.message || "Erreur update");
        toast("Exécution modifiée ✅", "success");
      } else {
        const res = await fetch(api.exeCreate, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(payload)
        });
        const j = await safeJson(res);
        if (!j.ok) throw new Error(j.message || "Erreur create");
        toast("Exécution ajoutée ✅", "success");
      }

      resetForm();
      await loadExecutions();
    } catch (err) {
      console.error(err);
      toast("Erreur: impossible d'enregistrer.", "error");
    }
  });

  // Actions list (ignored in view mode)
  listEl?.addEventListener("click", async (ev) => {
    if (currentMode === "view") return;

    const btn = ev.target.closest("button[data-act]");
    if (!btn) return;

    const id = btn.getAttribute("data-id");
    const act = btn.getAttribute("data-act");
    const e = cache.find(x => String(x.id) === String(id));
    if (!e) return;

    if (act === "edit") {
      if (editId) editId.value = e.id;
      if (title) title.value = e.title || "";
      if (window.NEXA_EDITOR) await window.NEXA_EDITOR.setEditorData("exeDescEditor", e.desc || "");
      if (status) status.value = e.status || "todo";
      if (save) save.innerHTML = `<i class="fa-solid fa-check"></i> Mettre à jour`;
      toast("Mode modification ✏️");
      return;
    }

    if (act === "toggle") {
      const newStatus = nextStatus(e.status);
      try {
        const res = await fetch(`${api.exeUpdateBase}/${encodeURIComponent(id)}`, {
          method: "PUT",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ status: newStatus })
        });
        const j = await safeJson(res);
        if (!j.ok) throw new Error(j.message || "Erreur statut");
        toast(`Statut → ${newStatus}`, "success");
        await loadExecutions();
      } catch (err) {
        console.error(err);
        toast("Erreur statut.", "error");
      }
      return;
    }

    if (act === "del") {
      if (!confirm("Supprimer cette exécution ?")) return;
      try {
        const res = await fetch(`${api.exeDeleteBase}/${encodeURIComponent(id)}`, { method: "DELETE" });
        const j = await safeJson(res);
        if (!j.ok) throw new Error(j.message || "Erreur delete");
        toast("Exécution supprimée 🗑️", "success");
        await loadExecutions();
      } catch (err) {
        console.error(err);
        toast("Erreur suppression.", "error");
      }
    }
  });

  // ✅ SINGLE global click handler
  document.addEventListener("click", (ev) => {
    const el = ev.target.closest("[data-open-exec]");
    if (!el) return;

    const taskId = el.getAttribute("data-task-id") || el.dataset.taskId;
    const taskTitle = el.getAttribute("data-task-title") || el.dataset.taskTitle || "—";
    const mode = el.getAttribute("data-open-exec-mode") || el.dataset.mode || "full";

    if (!taskId) return;
    ev.stopPropagation();

    openDrawer(taskId, taskTitle, mode);
  });

})();
