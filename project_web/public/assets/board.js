console.log("TASK UI JS LOADED ✅");

(() => {
  // =========================
  // THEME
  // =========================


  // =========================
  // API
  // =========================
  const api = window.NEXA_API;
  if (!api?.list || !api?.create || !api?.updateBase || !api?.deleteBase) {
    console.error("window.NEXA_API missing/invalid ❌", api);
    return;
  }

  // =========================
  // UI refs
  // =========================
  const zones = {
    todo: document.getElementById("zone-todo"),
    doing: document.getElementById("zone-doing"),
    done: document.getElementById("zone-done"),
  };

  const overlay = document.getElementById("overlay");
  const drawer = document.getElementById("drawer");

  const newBtn = document.getElementById("newBtn");
  const closeDrawerBtn = document.getElementById("closeDrawer");
  const cancelBtn = document.getElementById("cancelBtn");
  const saveBtn = document.getElementById("saveBtn");
  const deleteBtn = document.getElementById("deleteBtn");
  const editBtn = document.getElementById("editBtn");

  const fTitle = document.getElementById("fTitle");
  const fDesc = document.getElementById("fDesc");
  const fPrio = document.getElementById("fPrio");
  const fStatus = document.getElementById("fStatus");
  const fDue = document.getElementById("fDue");
  const fCategory = document.getElementById("fCategory");

  // Toolbar filters
  const searchInput = document.getElementById("searchInput");
  const prioFilter = document.getElementById("prioFilter");
  const statusFilter = document.getElementById("statusFilter");
  const clearBtn = document.getElementById("clearBtn");
  const showTodayBtn = document.getElementById("showTodayBtn");
  const showOverdueBtn = document.getElementById("showOverdueBtn");
  const autoPrioritizeBtn = document.getElementById("autoPrioritizeBtn");

  // KPI
  const kpiTotal = document.getElementById("kpiTotal");
  const kpiDoing = document.getElementById("kpiDoing");
  const kpiHigh = document.getElementById("kpiHigh");

  // Column counts
  const countTodo = document.getElementById("countTodo");
  const countDoing = document.getElementById("countDoing");
  const countDone = document.getElementById("countDone");

  // Sidebar
  const sidebar = document.getElementById("sidebar");
  const sbOverlay = document.getElementById("sbOverlay");
  const sbCollapse = document.getElementById("sbCollapse");

  const sbTasksCount = document.getElementById("sbTasksCount");

  // CATEGORY DRAWER refs
  const newCatBtn = document.getElementById("newCatBtn");
  const catOverlay = document.getElementById("catOverlay");
  const catDrawer = document.getElementById("catDrawer");
  const closeCatDrawer = document.getElementById("closeCatDrawer");
  const cancelCatBtn = document.getElementById("cancelCatBtn");
  const saveCatBtn = document.getElementById("saveCatBtn");

  const cat_name = document.getElementById("cat_name");
  const cat_description = document.getElementById("cat_description");
  const cat_color = document.getElementById("cat_color");
  const cat_icon = document.getElementById("cat_icon");
  const cat_isActive = document.getElementById("cat_isActive");
  const cat_position = document.getElementById("cat_position");
  const cat_visibility = document.getElementById("cat_visibility");
  const cat_taskLimit = document.getElementById("cat_taskLimit");
  const cat_createAt = document.getElementById("cat_createAt");
  const cat_updateAt = document.getElementById("cat_updateAt");
  const cat_no = document.getElementById("cat_no");

  const taskFieldMap = {
    title: fTitle,
    description: fDesc,
    priority: fPrio,
    status: fStatus,
    dueAt: fDue,
    due_at: fDue,
    categoryId: fCategory,
    category_id: fCategory,
  };

  const categoryFieldMap = {
    name: cat_name,
    description: cat_description,
    color: cat_color,
    icon: cat_icon,
    isActive: cat_isActive,
    is_active: cat_isActive,
    position: cat_position,
    visibility: cat_visibility,
    taskLimit: cat_taskLimit,
    task_limit: cat_taskLimit,
    createAt: cat_createAt,
    create_at: cat_createAt,
    updateAt: cat_updateAt,
    update_at: cat_updateAt,
    no: cat_no,
  };

  // =========================
  // STATE
  // =========================
  let editingId = null;
  let allTasks = [];
  let categories = [];
  let draggedTaskId = null;

  function escapeHtml(s) {
    return String(s ?? "").replace(/[&<>"']/g, (c) => ({
      "&": "&amp;",
      "<": "&lt;",
      ">": "&gt;",
      '"': "&quot;",
      "'": "&#039;",
    }[c]));
  }

  // =========================
  // ✅ TOAST
  // =========================
  const toastHost = document.getElementById("toastHost");

  function showToast({ type = "info", title = "Info", message = "", ms = 5500 } = {}) {
    if (!toastHost) {
      console.warn("toastHost not found");
      return;
    }

    const icons = {
      success: "fa-circle-check",
      error: "fa-circle-exclamation",
      info: "fa-circle-info",
    };

    const el = document.createElement("div");
    el.className = `toast ${type}`;
    el.innerHTML = `
      <div class="t-icon"><i class="fa-solid ${icons[type] || icons.info}"></i></div>
      <div>
        <p class="t-title">${escapeHtml(title)}</p>
        <p class="t-msg">${escapeHtml(message)}</p>
      </div>
      <button class="t-close" type="button" aria-label="Close">×</button>
    `;

    const close = () => {
      el.style.animation = "toastOut .15s ease-in forwards";
      setTimeout(() => el.remove(), 160);
    };

    el.querySelector(".t-close")?.addEventListener("click", close);
    toastHost.appendChild(el);

    if (ms > 0) setTimeout(close, ms);
  }

  // Expose showToast to window
  window.showToast = showToast;

  function setGlobalState() {
    window.allTasks = allTasks;
    window.allCategories = categories;
  }

  function getFieldWrapper(input) {
    return input?.closest(".field.field-modern") || null;
  }

  function clearMappedFieldErrors(fieldMap) {
    Object.values(fieldMap).forEach((input) => {
      const wrapper = getFieldWrapper(input);
      if (!wrapper) return;
      wrapper.classList.remove("has-error");
      wrapper.removeAttribute("data-error");
    });
  }

  function applyMappedFieldErrors(fieldMap, data) {
    let errs = data?.errors;
    if (!errs || typeof errs !== "object") {
      const raw = String(data?.error || "").trim();
      if (!raw) return false;
      errs = {};
      raw.split(/\r?\n/).forEach((line) => {
        const idx = line.indexOf(":");
        if (idx <= 0) return;
        const k = line.slice(0, idx).trim();
        const v = line.slice(idx + 1).trim();
        if (!k || !v) return;
        errs[k] = v;
      });
      if (!Object.keys(errs).length) return false;
    }

    let applied = false;
    for (const [key, rawMsgs] of Object.entries(errs)) {
      let input = fieldMap[key];
      if (!input) {
        const normalized = String(key).toLowerCase();
        if (normalized.includes("title") || normalized.includes("titre")) input = fieldMap.title;
        else if (normalized.includes("desc")) input = fieldMap.description;
        else if (normalized.includes("prio")) input = fieldMap.priority;
        else if (normalized.includes("status") || normalized.includes("statut")) input = fieldMap.status;
        else if (normalized.includes("due") || normalized.includes("date")) input = fieldMap.dueAt || fieldMap.createAt || fieldMap.updateAt;
        else if (normalized.includes("categor")) input = fieldMap.categoryId || fieldMap.name;
      }
      if (!input) continue;

      const wrapper = getFieldWrapper(input);
      if (!wrapper) continue;

      const msgs = Array.isArray(rawMsgs) ? rawMsgs : [String(rawMsgs)];
      const msg = msgs.filter(Boolean).join(" | ").trim();
      if (!msg) continue;

      wrapper.classList.add("has-error");
      wrapper.setAttribute("data-error", msg);
      applied = true;
    }

    return applied;
  }

  function bindClearErrorOnInput(fieldMap) {
    Object.values(fieldMap).forEach((input) => {
      if (!input) return;
      const clear = () => {
        const wrapper = getFieldWrapper(input);
        if (!wrapper) return;
        wrapper.classList.remove("has-error");
        wrapper.removeAttribute("data-error");
      };
      input.addEventListener("input", clear);
      input.addEventListener("change", clear);
    });
  }

  // =========================
  // HTTP (toast + PHP errors)
  // =========================
  function formatApiErrors(data, fallbackText) {
    if (data?.errors && typeof data.errors === "object") {
      const lines = [];
      for (const [field, msgs] of Object.entries(data.errors)) {
        const arr = Array.isArray(msgs) ? msgs : [String(msgs)];
        lines.push(`${field}: ${arr.join(" | ")}`);
      }
      return lines.join("\n");
    }
    return data?.error ?? fallbackText ?? "Erreur API";
  }

  async function http(url, method, body) {
    const res = await fetch(url, {
      method,
      headers: { "Content-Type": "application/json" },
      body: body ? JSON.stringify(body) : undefined,
    });

    const text = await res.text();
    let data = null;
    try {
      data = text ? JSON.parse(text) : null;
    } catch (_) { }

    if (!res.ok) {
      console.error("API ERROR:", method, url, res.status, data || text);

      if (res.status !== 422) {
        showToast({
          type: "error",
          title: `Erreur API ${res.status}`,
          message: formatApiErrors(data, text),
          ms: 7000,
        });
      }

      const err = new Error(formatApiErrors(data, text));
      err.status = res.status;
      err.apiData = data;
      throw err;
    }

    return data;
  }

  function unwrapTaskData(payload) {
    if (Array.isArray(payload)) return payload;
    if (payload && Array.isArray(payload.data)) return payload.data;
    return [];
  }

  // =========================
  // ✅ VOICE SEARCH
  // =========================
  const voiceBtn = document.getElementById("voiceBtn");

  function initVoiceSearch() {
    const SR = window.SpeechRecognition || window.webkitSpeechRecognition;

    if (!voiceBtn) return null;

    if (!SR) {
      voiceBtn.style.display = "none";
      return null;
    }

    const recog = new SR();
    recog.lang = "fr-FR";
    recog.interimResults = true;
    recog.continuous = false;

    let listening = false;

    const setUI = (on) => {
      listening = on;
      voiceBtn.classList.toggle("listening", on);
      voiceBtn.innerHTML = on
        ? '<i class="fa-solid fa-microphone-lines"></i>'
        : '<i class="fa-solid fa-microphone"></i>';
    };

    recog.onstart = () => setUI(true);

    recog.onresult = (e) => {
      let transcript = "";
      for (let i = e.resultIndex; i < e.results.length; i++) {
        transcript += e.results[i][0].transcript;
      }
      transcript = transcript.trim();
      if (searchInput) {
        searchInput.value = transcript;
        render();
      }
    };

    recog.onerror = (e) => {
      setUI(false);

      if (e.error === "not-allowed" || e.error === "service-not-allowed") {
        showToast({
          type: "error",
          title: "Micro bloqué",
          message: "Autorise le micro (icône 🔒) puis recharge la page.",
          ms: 7000,
        });
      } else {
        showToast({
          type: "error",
          title: "Erreur micro",
          message: e.error || "Erreur SpeechRecognition",
          ms: 6500,
        });
      }
    };

    recog.onend = () => setUI(false);

    return {
      toggle: () => {
        try {
          if (!listening) recog.start();
          else recog.stop();
        } catch (_) {
          setUI(false);
        }
      },
    };
  }

  // =========================
  // SIDEBAR
  // =========================
  function initSidebar() {
    if (!sidebar) return;

    sidebar.style.top = "0";
    sidebar.style.height = "100vh";

    const KEY = "nexa_sidebar_state";
    const getState = () => {
      try { return JSON.parse(localStorage.getItem(KEY) || '{"mode":"open"}'); }
      catch { return { mode: "open" }; }
    };
    const setState = (mode) => {
      localStorage.setItem(KEY, JSON.stringify({ mode }));
      applyState();
    };
    const applyState = () => {
      const st = getState();
      sidebar.classList.remove("is-collapsed", "is-hidden");
      if (st.mode === "collapsed") sidebar.classList.add("is-collapsed");
      if (st.mode === "hidden") sidebar.classList.add("is-hidden");
    };

    sbCollapse?.addEventListener("click", () => {
      const st = getState();
      setState(st.mode === "open" ? "collapsed" : "open");
    });



    const closeMobile = () => {
      sidebar.classList.remove("open");
      sbOverlay?.classList.remove("open");
    };

    sbOverlay?.addEventListener("click", closeMobile);
    applyState();
  }

  function setSidebarCount(n) {
    if (sbTasksCount) sbTasksCount.textContent = String(n ?? 0);
  }

  // =========================
  // DRAWER (Task)
  // =========================
  function openDrawer(task = null) {
    overlay?.classList.add("open");
    drawer?.classList.add("open");
    clearMappedFieldErrors(taskFieldMap);

    if (!task) {
      editingId = null;
      deleteBtn && (deleteBtn.style.display = "none");
      editBtn && (editBtn.style.display = "none");

      fTitle.value = "";
      fDesc.value = "";
      fPrio.value = "med";
      fStatus.value = "todo";
      fDue.value = "";
      fCategory.value = "";
      return;
    }

    editingId = task.id;
    deleteBtn && (deleteBtn.style.display = "inline-flex");
    editBtn && (editBtn.style.display = "inline-flex");

    fTitle.value = task.title || "";
    fDesc.value = task.description || "";
    fPrio.value = task.priority || "med";
    fStatus.value = task.status || "todo";
    fDue.value = task.dueAt || "";
    fCategory.value = task.categoryId ?? "";
  }

  function closeDrawer() {
    overlay?.classList.remove("open");
    drawer?.classList.remove("open");
    clearMappedFieldErrors(taskFieldMap);
  }

  function getPayload() {
    return {
      title: (fTitle.value || "").trim(),
      description: (fDesc.value || "").trim() || null,
      priority: fPrio.value || "med",
      status: fStatus.value || "todo",
      dueAt: fDue.value || null,
      categoryId: fCategory.value ? parseInt(fCategory.value, 10) : null,
    };
  }

  async function saveOrUpdate() {
    clearMappedFieldErrors(taskFieldMap);
    const payload = getPayload();

    try {
      if (!editingId) {
        await http(api.create, "POST", payload);
      } else {
        await http(`${api.updateBase}/${editingId}`, "PATCH", payload);
      }
    } catch (err) {
      if (err?.status === 422) {
        const shown = applyMappedFieldErrors(taskFieldMap, err.apiData);
        if (shown) return;
      }
      throw err;
    }

    showToast({ type: "success", title: "Succès", message: "Tâche enregistrée ✅", ms: 3000 });

    closeDrawer();
    await refreshTasks();
    render();
  }

  async function deleteCurrent() {
    if (!editingId) return;
    const ok = confirm("Supprimer cette tâche ?");
    if (!ok) return;

    await http(`${api.deleteBase}/${editingId}`, "DELETE");

    showToast({ type: "success", title: "Supprimé", message: "Tâche supprimée 🗑️", ms: 3000 });

    closeDrawer();
    await refreshTasks();
    render();
  }

  // =========================
  // RENDER
  // =========================
  function clearZones() {
    Object.values(zones).forEach((z) => z && (z.innerHTML = ""));
  }

  function prioLabel(p) {
    if (p === "high") return "Haute";
    if (p === "med") return "Moyenne";
    return "Basse";
  }

  function categoryPill(cat) {
    if (!cat) return "";
    const color = cat.color || "#7c3aed";
    const icon = cat.icon || "fa-solid fa-folder";
    const name = cat.name || "Catégorie";

    return `
      <span class="cat-pill" style="--cat:${escapeHtml(color)}">
        <i class="${escapeHtml(icon)}"></i>
        <span>${escapeHtml(name)}</span>
      </span>
    `;
  }

  // ✅✅✅ MODIF: ajout bouton exécutions dans task-actions
  function taskCard(task) {
    const el = document.createElement("div");
    el.className = "task";
    el.draggable = true;
    el.dataset.id = String(task.id);

    const cat =
      categories.find((c) => String(c.id) === String(task.categoryId)) ||
      (task.categoryName
        ? { name: task.categoryName, color: task.categoryColor, icon: task.categoryIcon }
        : null);

    el.innerHTML = `
      <div class="task-top">
        <div style="min-width:0;">
          <h4 class="task-title">${escapeHtml(task.title)}</h4>
        </div>
        <div class="task-actions">


          <button class="icon-btn task-journal" type="button" title="Journal d'exécution" 
                  data-open-exec="true" 
                  data-task-id="${task.id}" 
                  data-task-title="${escapeHtml(task.title)}">
            <i class="fa-solid fa-eye"></i>
          </button>
          <button class="icon-btn task-edit" type="button" title="Modifier">
            <i class="fa-regular fa-pen-to-square"></i>
          </button>
          <button class="icon-btn task-del" type="button" title="Supprimer">
            <i class="fa-regular fa-trash-can"></i>
          </button>
        </div>
      </div>

      ${task.description ? `<div class="task-desc">${escapeHtml(task.description)}</div>` : ""}

      <div class="chips">
        <span class="chip prio ${escapeHtml(task.priority || "med")}">
          <i class="fa-solid fa-flag"></i> ${prioLabel(task.priority || "med")}
        </span>

        ${task.dueAt ? `<span class="chip"><i class="fa-regular fa-calendar"></i> ${escapeHtml(task.dueAt)}</span>` : ""}

        ${cat ? categoryPill(cat) : ""}
      </div>
    `;

    el.querySelector(".task-edit")?.addEventListener("click", (e) => {
      e.stopPropagation();
      openDrawer(task);
    });

    el.querySelector(".task-del")?.addEventListener("click", async (e) => {
      e.stopPropagation();
      const ok = confirm(`Supprimer la tâche : "${task.title}" ?`);
      if (!ok) return;

      await http(`${api.deleteBase}/${task.id}`, "DELETE");
      showToast({ type: "success", title: "Supprimé", message: "Tâche supprimée 🗑️", ms: 3000 });

      await refreshTasks();
      render();
    });

    el.addEventListener("dblclick", () => openDrawer(task));
    el.addEventListener("dragstart", (e) => {
      draggedTaskId = String(task.id);
      if (e.dataTransfer) {
        e.dataTransfer.effectAllowed = "move";
        e.dataTransfer.setData("text/plain", draggedTaskId);
        e.dataTransfer.setData("text/task-id", draggedTaskId);
      }
      el.classList.add("is-dragging");
      setTimeout(() => (el.style.opacity = "0.55"), 0);
    });
    el.addEventListener("dragend", () => {
      draggedTaskId = null;
      el.classList.remove("is-dragging");
      el.style.opacity = "1";
      Object.values(zones).forEach((z) => z?.classList.remove("dragover"));
    });

    return el;
  }

  function applyFilters(tasks) {
    const q = (searchInput?.value || "").trim().toLowerCase();
    const pf = prioFilter?.value || "all";
    const sf = statusFilter?.value || "all";

    return tasks.filter((t) => {
      const hay = `${t.title || ""} ${t.description || ""}`.toLowerCase();
      const okSearch = !q || hay.includes(q);
      const okPrio = pf === "all" || (t.priority || "med") === pf;
      const okStatus = sf === "all" || (t.status || "todo") === sf;
      return okSearch && okPrio && okStatus;
    });
  }

  function updateKPIs() {
    const total = allTasks.length;
    const doing = allTasks.filter((t) => t.status === "doing").length;
    const high = allTasks.filter((t) => t.priority === "high").length;

    if (kpiTotal) kpiTotal.textContent = String(total);
    if (kpiDoing) kpiDoing.textContent = String(doing);
    if (kpiHigh) kpiHigh.textContent = String(high);

    if (countTodo) countTodo.textContent = String(allTasks.filter((t) => t.status === "todo").length);
    if (countDoing) countDoing.textContent = String(doing);
    if (countDone) countDone.textContent = String(allTasks.filter((t) => t.status === "done").length);

    setSidebarCount(total);
  }

  function render() {
    updateKPIs();
    clearZones();

    // Expose data to window for PDF/Excel/AI features
    window.allTasks = allTasks;
    window.allCategories = categories;

    const filtered = applyFilters(allTasks);
    filtered.forEach((t) => {
      const st = t.status || "todo";
      (zones[st] || zones.todo).appendChild(taskCard(t));
    });
  }

  // =========================
  // LOAD
  // =========================
  async function loadCategories(selectValue = null) {
    try {
      categories = await http(api.categories, "GET");
    } catch {
      categories = [];
    }

    if (fCategory) {
      const keep = selectValue ?? fCategory.value ?? "";
      fCategory.innerHTML = `<option value="">Aucune catégorie</option>`;
      categories.forEach((c) => {
        const opt = document.createElement("option");
        opt.value = String(c.id);
        opt.textContent = c.name;
        fCategory.appendChild(opt);
      });
      if (keep) fCategory.value = keep;
    }
    setGlobalState();
  }

  async function refreshTasks() {
    const payload = await http(api.list, "GET");
    allTasks = unwrapTaskData(payload);
    setGlobalState();
  }

  async function showTodayTasks() {
    if (!api.today) return;
    const payload = await http(api.today, "GET");
    allTasks = unwrapTaskData(payload);
    setGlobalState();
    render();
    showToast({ type: "info", title: "Vue", message: "Affichage des tâches du jour", ms: 2500 });
  }

  async function showOverdueTasks() {
    if (!api.overdue) return;
    const payload = await http(api.overdue, "GET");
    allTasks = unwrapTaskData(payload);
    setGlobalState();
    render();
    showToast({ type: "warning", title: "Vue", message: "Affichage des tâches en retard", ms: 2500 });
  }

  async function autoPrioritize() {
    if (!api.autoPrioritize) return;
    const payload = await http(api.autoPrioritize, "POST", {});
    await refreshTasks();
    setGlobalState();
    render();
    const updated = payload?.updated ?? 0;
    showToast({ type: "success", title: "Priorisation", message: `${updated} tâches ajustées`, ms: 2800 });
  }

  // =========================
  // DRAG & DROP
  // =========================
  function initDragDrop() {
    Object.entries(zones).forEach(([status, zone]) => {
      if (!zone) return;

      zone.addEventListener("dragenter", (e) => {
        e.preventDefault();
        zone.classList.add("dragover");
      });

      zone.addEventListener("dragover", (e) => {
        e.preventDefault();
        if (e.dataTransfer) e.dataTransfer.dropEffect = "move";
        zone.classList.add("dragover");
      });

      zone.addEventListener("dragleave", (e) => {
        if (!zone.contains(e.relatedTarget)) {
          zone.classList.remove("dragover");
        }
      });

      zone.addEventListener("drop", async (e) => {
        e.preventDefault();
        e.stopPropagation();
        zone.classList.remove("dragover");

        const id = (
          e.dataTransfer?.getData("text/plain") ||
          e.dataTransfer?.getData("text/task-id") ||
          draggedTaskId ||
          ""
        ).trim();
        if (!id) return;

        const existing = allTasks.find((t) => String(t.id) === String(id));
        if (existing && (existing.status || "todo") === status) return;

        await http(`${api.updateBase}/${id}`, "PATCH", { status });
        await refreshTasks();
        render();
      });
    });
  }

  // =========================
  // CATEGORY DRAWER
  // =========================
  function openCatDrawer() {
    clearMappedFieldErrors(categoryFieldMap);
    catOverlay?.classList.add("open");
    catDrawer?.classList.add("open");
  }

  function closeCatDrawerFn() {
    catOverlay?.classList.remove("open");
    catDrawer?.classList.remove("open");
    clearMappedFieldErrors(categoryFieldMap);

    if (cat_name) cat_name.value = "";
    if (cat_description) cat_description.value = "";
    if (cat_color) cat_color.value = "#7c3aed";
    if (cat_icon) cat_icon.value = "";
    if (cat_isActive) cat_isActive.value = "1";
    if (cat_position) cat_position.value = "";
    if (cat_visibility) cat_visibility.value = "";
    if (cat_taskLimit) cat_taskLimit.value = "";
    if (cat_createAt) cat_createAt.value = "";
    if (cat_updateAt) cat_updateAt.value = "";
    if (cat_no) cat_no.value = "";
  }

  function toIsoFromDatetimeLocal(v) {
    if (!v) return null;
    return v.replace("T", " ") + ":00";
  }

  async function createCategory() {
    clearMappedFieldErrors(categoryFieldMap);
    const payload = {
      name: (cat_name?.value || "").trim(),
      description: (cat_description?.value || "").trim() || null,
      color: cat_color?.value || null,
      icon: (cat_icon?.value || "").trim() || null,
      isActive: (cat_isActive?.value || "1") === "1",
      position: cat_position?.value ? parseInt(cat_position.value, 10) : null,
      visibility: (cat_visibility?.value || "").trim() || null,
      taskLimit: cat_taskLimit?.value ? parseInt(cat_taskLimit.value, 10) : null,
      createAt: toIsoFromDatetimeLocal(cat_createAt?.value),
      updateAt: toIsoFromDatetimeLocal(cat_updateAt?.value),
      no: (cat_no?.value || "").trim() || null,
    };

    const url = api.categoriesCreate || "/api/categories";
    let created;
    try {
      created = await http(url, "POST", payload);
    } catch (err) {
      if (err?.status === 422) {
        const shown = applyMappedFieldErrors(categoryFieldMap, err.apiData);
        if (shown) return;
      }
      throw err;
    }

    const newCat = {
      id: created.id,
      name: created.name,
      color: created.color || payload.color || null,
      icon: created.icon || payload.icon || null,
    };

    categories = categories.filter((c) => String(c.id) !== String(newCat.id));
    categories.unshift(newCat);

    await loadCategories(String(newCat.id));
    closeCatDrawerFn();

    showToast({ type: "success", title: "Succès", message: "Catégorie créée ✅", ms: 3000 });
    render();
  }

  // =========================
  // EVENTS
  // =========================
  function bindEvents() {
    bindClearErrorOnInput(taskFieldMap);
    bindClearErrorOnInput(categoryFieldMap);

    newBtn?.addEventListener("click", () => openDrawer(null));
    closeDrawerBtn?.addEventListener("click", closeDrawer);
    cancelBtn?.addEventListener("click", closeDrawer);
    overlay?.addEventListener("click", closeDrawer);

    saveBtn?.addEventListener("click", () => saveOrUpdate().catch(console.error));
    editBtn?.addEventListener("click", () => saveOrUpdate().catch(console.error));
    deleteBtn?.addEventListener("click", deleteCurrent);

    searchInput?.addEventListener("input", render);
    prioFilter?.addEventListener("change", render);
    statusFilter?.addEventListener("change", render);

    const voice = initVoiceSearch();
    voiceBtn?.addEventListener("click", () => voice?.toggle());

    clearBtn?.addEventListener("click", () => {
      if (searchInput) searchInput.value = "";
      if (prioFilter) prioFilter.value = "all";
      if (statusFilter) statusFilter.value = "all";
      refreshTasks().then(render).catch(console.error);
    });

    showTodayBtn?.addEventListener("click", () => showTodayTasks().catch(console.error));
    showOverdueBtn?.addEventListener("click", () => showOverdueTasks().catch(console.error));
    autoPrioritizeBtn?.addEventListener("click", () => autoPrioritize().catch(console.error));

    window.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && drawer?.classList.contains("open")) closeDrawer();
      if (e.key === "Escape" && catDrawer?.classList.contains("open")) closeCatDrawerFn();
    });

    newCatBtn?.addEventListener("click", openCatDrawer);
    catOverlay?.addEventListener("click", closeCatDrawerFn);
    closeCatDrawer?.addEventListener("click", closeCatDrawerFn);
    cancelCatBtn?.addEventListener("click", closeCatDrawerFn);
    saveCatBtn?.addEventListener("click", () => createCategory().catch(console.error));
  }

  // =========================
  // INIT
  // =========================
  async function init() {
    console.log("🚀 Initializing Board Application...");

    try {
      initSidebar();
    } catch (e) {
      console.error("Sidebar Init Error:", e);
    }

    try {
      bindEvents();
    } catch (e) {
      console.error("Events Binding Error:", e);
    }

    try {
      initDragDrop();
    } catch (e) {
      console.error("DragDrop Init Error:", e);
    }

    try {
      await loadCategories();
      await refreshTasks();
      render();
    } catch (e) {
      console.error("Data Load Error:", e);
    }

    console.log("✅ Board Application Ready");
  }

  // Ensure DOM is ready or wait for it
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", init);
  } else {
    init().catch(err => console.error("INIT FATAL ERROR:", err));
  }
})();
