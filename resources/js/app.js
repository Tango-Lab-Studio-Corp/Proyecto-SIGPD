document.addEventListener('DOMContentLoaded', () => {
  const toggleBtn = document.getElementById("modeToggle");
  const body = document.body;
  const mainImage = document.getElementById("mainImage");

  // Obtenemos las rutas desde los data-attributes
  const lightImg = body.dataset.lightImg;
  const darkImg = body.dataset.darkImg;

  toggleBtn.addEventListener("click", () => {
    body.classList.toggle("dark-mode");
    body.classList.toggle("light-mode");

    if (body.classList.contains("dark-mode")) {
      toggleBtn.textContent = "Modo Claro";
      toggleBtn.classList.remove("btn-dark");
      toggleBtn.classList.add("btn-light");
      mainImage.src = darkImg;
    } else {
      toggleBtn.textContent = "Modo Oscuro";
      toggleBtn.classList.remove("btn-light");
      toggleBtn.classList.add("btn-dark");
      mainImage.src = lightImg;
    }
  });
});
