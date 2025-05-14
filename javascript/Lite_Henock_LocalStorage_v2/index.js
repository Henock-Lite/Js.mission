const body = document.getElementById("maPage");
const boutonJour = document.querySelector(".jour");
const boutonNuit = document.querySelector(".nuit");

const textinsert = document.getElementById("textinsert");
const btninsert = document.getElementById("insert");
const displayP = document.querySelector(".display > p");


function activerModeNuit() {
  body.classList.add("nuit");
  localStorage.setItem("N", "Nuit");
  localStorage.removeItem("D");
}


function activerModeJour() {
  body.classList.remove("nuit");
  localStorage.setItem("D", "Jour");
  localStorage.removeItem("N");
}


function insererTexte() {
  if (textinsert.value) {
    displayP.textContent = textinsert.value;
    localStorage.setItem("localTxt", textinsert.value);
    textinsert.value = "";
  }
}


boutonNuit.addEventListener("click", activerModeNuit);
boutonJour.addEventListener("click", activerModeJour);
btninsert.addEventListener("click", (e) => {
  e.preventDefault();
  insererTexte();
});


window.addEventListener("load", () => {
  if (localStorage.getItem("N")) {
    activerModeNuit();
  } else if (localStorage.getItem("D")) {
    activerModeJour();
  }

  const texteSauvegardé = localStorage.getItem("localTxt");
  if (texteSauvegardé) {
    displayP.textContent = texteSauvegardé;
  }
});
