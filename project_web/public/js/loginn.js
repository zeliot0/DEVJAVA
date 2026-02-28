document.addEventListener("DOMContentLoaded", () => {
  const signUpButton = document.getElementById("signUp");
  const signInButton = document.getElementById("signIn");
  const container = document.getElementById("container");

  const setAuthMode = (isSignup) => {
    if (!container) return;
    container.classList.toggle("right-panel-active", isSignup);
    const signInPane = container.querySelector(".sign-in-container");
    const signUpPane = container.querySelector(".sign-up-container");
    if (signInPane) signInPane.scrollTop = 0;
    if (signUpPane) signUpPane.scrollTop = 0;
  };

  if (signUpButton && signInButton && container) {
    signUpButton.addEventListener("click", () => setAuthMode(true));
    signInButton.addEventListener("click", () => setAuthMode(false));
  }

  const goSignUp = document.getElementById("goSignUp");
  const goSignIn = document.getElementById("goSignIn");
  if (goSignUp && container) {
    goSignUp.addEventListener("click", () => setAuthMode(true));
  }
  if (goSignIn && container) {
    goSignIn.addEventListener("click", () => setAuthMode(false));
  }

  const registerPasswordInput = document.getElementById("register-password");
  const strengthWrap = document.getElementById("register-password-strength");
  const strengthLabel = document.getElementById("register-password-strength-label");

  const evaluatePasswordStrength = (password) => {
    const value = String(password || "");
    if (value.length === 0) {
      return { score: 0, label: "Faible", level: "weak" };
    }

    let score = 0;
    if (value.length >= 8) score += 30;
    if (value.length >= 12) score += 10;
    if (/[a-z]/.test(value)) score += 15;
    if (/[A-Z]/.test(value)) score += 15;
    if (/[0-9]/.test(value)) score += 15;
    if (/[^A-Za-z0-9]/.test(value)) score += 15;

    if (score < 40) return { score, label: "Faible", level: "weak" };
    if (score < 70) return { score, label: "Moyen", level: "medium" };
    if (score < 90) return { score, label: "Fort", level: "strong" };
    return { score, label: "Tres fort", level: "very-strong" };
  };

  const renderPasswordStrength = (password) => {
    if (!strengthWrap || !strengthLabel) return;
    const result = evaluatePasswordStrength(password);
    const hasValue = String(password || "").trim() !== "";

    strengthWrap.classList.remove("weak", "medium", "strong", "very-strong");
    if (!hasValue) {
      strengthWrap.classList.add("is-hidden");
      strengthLabel.textContent = "";
      return;
    }

    strengthWrap.classList.remove("is-hidden");
    strengthWrap.classList.add(result.level);

    strengthLabel.textContent = result.label;
  };

  if (registerPasswordInput) {
    renderPasswordStrength(registerPasswordInput.value);
    registerPasswordInput.addEventListener("input", () => {
      renderPasswordStrength(registerPasswordInput.value);
    });

    registerPasswordInput.addEventListener("focus", () => {
      if (registerPasswordInput.value !== "") return;

      fetch("/api/password/generate")
        .then((res) => res.json())
        .then((data) => {
          registerPasswordInput.value = data.password;
          renderPasswordStrength(registerPasswordInput.value);
        })
        .catch((err) => console.error(err));
    });
  }

  const bindPasswordToggle = (toggleId, inputId) => {
    const toggle = document.getElementById(toggleId);
    const input = document.getElementById(inputId);
    if (!toggle || !input) return;

    const toggleVisibility = () => {
      const showing = input.type === "password";
      input.type = showing ? "text" : "password";
      toggle.setAttribute("aria-label", showing ? "Masquer le mot de passe" : "Afficher le mot de passe");

      const icon = toggle.querySelector("i");
      if (icon) {
        icon.className = showing ? "fa-regular fa-eye-slash" : "fa-regular fa-eye";
      }
    };

    toggle.addEventListener("click", toggleVisibility);
    toggle.addEventListener("keydown", (event) => {
      if (event.key === "Enter" || event.key === " ") {
        event.preventDefault();
        toggleVisibility();
      }
    });
  };

  bindPasswordToggle("toggleRegisterPassword", "register-password");

  const themeToggle = document.getElementById("themeToggle");
  const html = document.documentElement;
  const icon = themeToggle ? themeToggle.querySelector("i") : null;

  const applyTheme = (theme) => {
    html.setAttribute("data-theme", theme);
    localStorage.setItem("theme", theme);
    if (icon) {
      icon.className = theme === "dark" ? "fas fa-sun" : "fas fa-moon";
    }
    if (themeToggle) {
      themeToggle.setAttribute("aria-pressed", theme === "dark" ? "true" : "false");
      themeToggle.setAttribute("aria-label", theme === "dark" ? "Activer le mode clair" : "Activer le mode sombre");
    }
  };

  const savedTheme = localStorage.getItem("theme");
  const initialTheme =
    savedTheme === "dark" || savedTheme === "light"
      ? savedTheme
      : (html.getAttribute("data-theme") === "dark" ? "dark" : "light");
  applyTheme(initialTheme);

  if (themeToggle) {
    themeToggle.addEventListener("click", () => {
      const current = html.getAttribute("data-theme") || "light";
      applyTheme(current === "dark" ? "light" : "dark");
    });
  }

  if (container) {
    const signInPane = container.querySelector(".sign-in-container");
    const signUpPane = container.querySelector(".sign-up-container");
    if (signInPane) signInPane.scrollTop = 0;
    if (signUpPane) signUpPane.scrollTop = 0;
  }
});
