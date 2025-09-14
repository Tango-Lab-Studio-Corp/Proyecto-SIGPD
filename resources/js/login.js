// Espera que el DOM esté completamente cargado antes de ejecutar el script
document.addEventListener("DOMContentLoaded", () => {
  const botonModo = document.getElementById("modoToggle"); // Botón para cambiar modo
  const cuerpo = document.body;                            // Referencia al <body>

  // Aplica el modo oscuro si la preferencia está guardada en localStorage
  if (localStorage.getItem("modo") === "oscuro") {
    cuerpo.classList.add("dark-mode");        // Activa clase dark-mode
    botonModo.textContent = "☀️";  // Cambia texto del botón
  }

  // Al hacer clic en el botón, alterna el modo oscuro
  botonModo.addEventListener("click", () => {
    cuerpo.classList.toggle("dark-mode");              // Agrega o quita clase
    const esOscuro = cuerpo.classList.contains("dark-mode");
    botonModo.textContent = esOscuro ? "☀️" : "🌙"; // Actualiza texto
    localStorage.setItem("modo", esOscuro ? "oscuro" : "claro");           // Guarda preferencia
  });
});
