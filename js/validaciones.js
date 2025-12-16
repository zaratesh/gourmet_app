// Validación de login en tiempo real
document.addEventListener("DOMContentLoaded", function () {
  const formLogin = document.getElementById("formLogin");
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  const emailError = document.getElementById("emailError");
  const passwordError = document.getElementById("passwordError");
  const passwordStrength = document.getElementById("passwordStrength");

  if (emailInput) {
    emailInput.addEventListener("input", function () {
      const value = emailInput.value.trim();
      const patron = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (patron.test(value)) {
        emailError.classList.add("d-none");
        emailInput.classList.remove("is-invalid");
        emailInput.classList.add("is-valid");
      } else {
        emailError.classList.remove("d-none");
        emailInput.classList.add("is-invalid");
        emailInput.classList.remove("is-valid");
      }
    });
  }

  function evaluarFortaleza(password) {
    let score = 0;
    if (password.length >= 8) score++;
    if (/[A-Z]/.test(password)) score++;
    if (/[a-z]/.test(password)) score++;
    if (/[0-9]/.test(password)) score++;
    if (/[\W_]/.test(password)) score++;

    if (score <= 2) {
      return { texto: "Contraseña débil", clase: "text-danger" };
    } else if (score === 3 || score === 4) {
      return { texto: "Contraseña aceptable", clase: "text-warning" };
    } else {
      return { texto: "Contraseña fuerte", clase: "text-success" };
    }
  }

  if (passwordInput) {
    passwordInput.addEventListener("input", function () {
      const value = passwordInput.value;
      const tieneMayuscula = /[A-Z]/.test(value);
      const tieneMinuscula = /[a-z]/.test(value);
      const tieneNumero = /[0-9]/.test(value);
      const longitudValida = value.length >= 8;

      const esSegura = tieneMayuscula && tieneMinuscula && tieneNumero && longitudValida;

      const fortaleza = evaluarFortaleza(value);
      passwordStrength.textContent = fortaleza.texto;
      passwordStrength.className = "form-text " + fortaleza.clase;

      if (esSegura) {
        passwordError.classList.add("d-none");
        passwordInput.classList.remove("is-invalid");
        passwordInput.classList.add("is-valid");
      } else {
        passwordError.classList.remove("d-none");
        passwordInput.classList.add("is-invalid");
        passwordInput.classList.remove("is-valid");
      }
    });
  }

  if (formLogin) {
    formLogin.addEventListener("submit", function (e) {
      if (emailInput.classList.contains("is-invalid") || passwordInput.classList.contains("is-invalid")) {
        e.preventDefault();
        alert("Por favor corrige los errores antes de continuar.");
      }
    });
  }
});
