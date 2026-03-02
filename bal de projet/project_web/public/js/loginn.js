document.addEventListener('DOMContentLoaded', () => {

  /* ==========================
     ANIMATION SIGN IN / SIGN UP
  ========================== */
  const signUpButton = document.getElementById("signUp");
  const signInButton = document.getElementById("signIn");
  const container = document.getElementById("container");

  if (signUpButton && signInButton && container) {
    signUpButton.addEventListener("click", () => {
      container.classList.add("right-panel-active");
    });

    signInButton.addEventListener("click", () => {
      container.classList.remove("right-panel-active");
    });
  }

  const goSignUp = document.getElementById("goSignUp");
  const goSignIn = document.getElementById("goSignIn");
  if (goSignUp && container) {
    goSignUp.addEventListener("click", () => {
      container.classList.add("right-panel-active");
    });
  }
  if (goSignIn && container) {
    goSignIn.addEventListener("click", () => {
      container.classList.remove("right-panel-active");
    });
  }

  /* ==========================
     PASSWORD AUTO-GENERATE
  ========================== */
  const passwordInput = document.getElementById('register-password');
  let alreadyGenerated = false;

  if (passwordInput) {
    passwordInput.addEventListener('focus', () => {
      if (passwordInput.value !== '') return;


      fetch('/api/password/generate')
        .then(res => res.json())
        .then(data => {
          passwordInput.value = data.password;
          alreadyGenerated = true;
        })
        .catch(err => console.error(err));
    });
  }

  /* ==========================
     👁️ TOGGLE PASSWORD
  ========================== */
  const eye = document.getElementById("toggleRegisterPassword");

  if (eye && passwordInput) {
    eye.addEventListener("click", () => {
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eye.textContent = "🙈";
      } else {
        passwordInput.type = "password";
        eye.textContent = "👁️";
      }
    });
  }

  const themeToggle = document.getElementById("themeToggle");
  const html = document.documentElement;
  const icon = themeToggle ? themeToggle.querySelector("i") : null;

  const applyTheme = (theme) => {
    html.setAttribute("data-theme", theme);
    localStorage.setItem("theme", theme);
    if (icon) {
      icon.className = theme === "dark" ? "fas fa-sun" : "fas fa-moon";
    }
  };

  const savedTheme = localStorage.getItem("theme");
  applyTheme(savedTheme === "dark" || savedTheme === "light" ? savedTheme : "light");

  if (themeToggle) {
    themeToggle.addEventListener("click", () => {
      const current = html.getAttribute("data-theme") || "light";
      applyTheme(current === "dark" ? "light" : "dark");
    });
  }

});
