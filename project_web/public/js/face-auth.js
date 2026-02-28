(function () {
  const config = window.NexaFaceAuthConfig || {};
  const modelPath = config.modelPath || "/models";
  const saveUrl = config.saveUrl || "/api/face/save";
  const deleteUrl = config.deleteUrl || "/api/face/delete";
  const loginUrl = config.loginUrl || "/api/face/login";
  let modelsLoaded = false;

  function setText(el, text) {
    if (el) {
      el.textContent = text;
    }
  }

  async function loadModels() {
    if (modelsLoaded) {
      return true;
    }

    if (typeof faceapi === "undefined") {
      return false;
    }

    try {
      await Promise.all([
        faceapi.nets.tinyFaceDetector.loadFromUri(modelPath),
        faceapi.nets.faceLandmark68Net.loadFromUri(modelPath),
        faceapi.nets.faceRecognitionNet.loadFromUri(modelPath),
      ]);
      modelsLoaded = true;
      return true;
    } catch (error) {
      return false;
    }
  }

  async function startCamera(video) {
    if (!video || !navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
      return false;
    }

    try {
      const stream = await navigator.mediaDevices.getUserMedia({
        video: { facingMode: "user" },
        audio: false,
      });
      video.srcObject = stream;
      return true;
    } catch (error) {
      return false;
    }
  }

  async function detectDescriptor(video) {
    if (!video) {
      return null;
    }

    const detection = await faceapi
      .detectSingleFace(video, new faceapi.TinyFaceDetectorOptions())
      .withFaceLandmarks()
      .withFaceDescriptor();

    if (!detection || !detection.descriptor) {
      return null;
    }

    return Array.from(detection.descriptor);
  }

  async function postJson(url, body) {
    const response = await fetch(url, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(body),
      credentials: "same-origin",
    });

    const data = await response.json().catch(function () {
      return {};
    });

    return { ok: response.ok, data: data };
  }

  async function initLogin() {
    const root = document.querySelector("[data-face-auth-login]");
    if (!root) {
      return;
    }

    const video = document.getElementById("face-login-video");
    const btn = document.getElementById("face-login-btn");
    const status = document.getElementById("face-login-status");

    const cameraOk = await startCamera(video);
    if (!cameraOk) {
      setText(status, "Camera non disponible. Autorisez la camera.");
      if (btn) btn.disabled = true;
      return;
    }

    const modelOk = await loadModels();
    if (!modelOk) {
      setText(status, "Modeles IA introuvables. Ajoutez /public/models.");
      if (btn) btn.disabled = true;
      return;
    }

    setText(status, "Pret pour connexion faciale.");

    if (!btn) {
      return;
    }

    btn.addEventListener("click", async function () {
      btn.disabled = true;
      setText(status, "Analyse du visage...");

      try {
        const descriptor = await detectDescriptor(video);
        if (!descriptor) {
          setText(status, "Aucun visage detecte. Regardez la camera.");
          return;
        }

        const result = await postJson(loginUrl, { descriptor: descriptor });
        if (!result.ok || !result.data.ok) {
          setText(status, result.data.error || "Connexion faciale refusee.");
          return;
        }

        setText(status, "Connexion reussie. Redirection...");
        window.location.href = result.data.redirect_url || "/";
      } catch (error) {
        setText(status, "Erreur face login. Reessayez.");
      } finally {
        btn.disabled = false;
      }
    });
  }

  async function initProfile() {
    const root = document.querySelector("[data-face-auth-profile]");
    if (!root) {
      return;
    }

    const video = document.getElementById("face-register-video");
    const saveBtn = document.getElementById("face-register-btn");
    const deleteBtn = document.getElementById("face-delete-btn");
    const status = document.getElementById("face-register-status");

    const cameraOk = await startCamera(video);
    if (!cameraOk) {
      setText(status, "Camera non disponible. Autorisez la camera.");
      if (saveBtn) saveBtn.disabled = true;
      if (deleteBtn) deleteBtn.disabled = true;
      return;
    }

    const modelOk = await loadModels();
    if (!modelOk) {
      setText(status, "Modeles IA introuvables. Ajoutez /public/models.");
      if (saveBtn) saveBtn.disabled = true;
      if (deleteBtn) deleteBtn.disabled = true;
      return;
    }

    if (saveBtn) {
      saveBtn.addEventListener("click", async function () {
        saveBtn.disabled = true;
        setText(status, "Detection visage...");
        try {
          const descriptor = await detectDescriptor(video);
          if (!descriptor) {
            setText(status, "Aucun visage detecte. Placez-vous face camera.");
            return;
          }

          const result = await postJson(saveUrl, { descriptor: descriptor });
          if (!result.ok || !result.data.ok) {
            setText(status, result.data.error || "Impossible d'enregistrer le visage.");
            return;
          }

          setText(status, "Visage enregistre avec succes.");
        } catch (error) {
          setText(status, "Erreur lors de l'enregistrement du visage.");
        } finally {
          saveBtn.disabled = false;
        }
      });
    }

    if (deleteBtn) {
      deleteBtn.addEventListener("click", async function () {
        deleteBtn.disabled = true;
        try {
          const result = await postJson(deleteUrl, {});
          if (!result.ok || !result.data.ok) {
            setText(status, result.data.error || "Impossible de supprimer le visage.");
            return;
          }

          setText(status, "Reconnaissance faciale supprimee.");
        } catch (error) {
          setText(status, "Erreur lors de la suppression.");
        } finally {
          deleteBtn.disabled = false;
        }
      });
    }
  }

  async function initRegister() {
    const root = document.querySelector("[data-face-auth-register]");
    if (!root) {
      return;
    }

    const video = document.getElementById("face-register-video-signup");
    const saveBtn = document.getElementById("face-register-btn-signup");
    const status = document.getElementById("face-register-status-signup");
    const hiddenInput = document.getElementById("register-face-descriptor");

    const cameraOk = await startCamera(video);
    if (!cameraOk) {
      setText(status, "Camera non disponible. Continuez sans visage.");
      if (saveBtn) saveBtn.disabled = true;
      return;
    }

    const modelOk = await loadModels();
    if (!modelOk) {
      setText(status, "Modeles IA indisponibles. Continuez sans visage.");
      if (saveBtn) saveBtn.disabled = true;
      return;
    }

    setText(status, "Cliquez pour capturer votre visage.");

    if (!saveBtn || !hiddenInput) {
      return;
    }

    saveBtn.addEventListener("click", async function () {
      saveBtn.disabled = true;
      setText(status, "Detection visage...");
      try {
        const descriptor = await detectDescriptor(video);
        if (!descriptor) {
          setText(status, "Aucun visage detecte. Reessayez.");
          return;
        }

        hiddenInput.value = JSON.stringify(descriptor);
        setText(status, "Visage capture. Il sera enregistre avec le compte.");
      } catch (error) {
        setText(status, "Erreur de capture visage.");
      } finally {
        saveBtn.disabled = false;
      }
    });
  }

  document.addEventListener("DOMContentLoaded", async function () {
    await initRegister();
    await initLogin();
    await initProfile();
  });
})();
