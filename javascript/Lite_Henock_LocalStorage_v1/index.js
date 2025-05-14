const body = document.getElementById("maPage");
const boutonJour = document.querySelector(".jour");
const boutonNuit = document.querySelector(".nuit");

function appliquerTheme(mode) {
  if (mode === "nuit") {
    body.classList.add("nuit");
    localStorage.setItem("N", "Nuit");
    localStorage.removeItem("D");
  } else if (mode === "jour") {
    body.classList.remove("nuit");
    localStorage.setItem("D", "Jour");
    localStorage.removeItem("N");
  }
}

boutonNuit.addEventListener("click", () => appliquerTheme("nuit"));
boutonJour.addEventListener("click", () => appliquerTheme("jour"));

window.addEventListener("DOMContentLoaded", () => {
  const themeNuit = localStorage.getItem("N");
  const themeJour = localStorage.getItem("D");

  if (themeNuit) {
    appliquerTheme("nuit");
  } else if (themeJour) {
    appliquerTheme("jour");
  }
});
