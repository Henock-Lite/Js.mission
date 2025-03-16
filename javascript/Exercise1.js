let inputTxt = document.querySelector(".txt");
let paragraphe = document.querySelector(".longeur");
let displaytxt = document.querySelector(".affichage");


inputTxt.addEventListener("input", (e) => {
  let Malongeur = inputTxt.value;
  let display = Malongeur.substring(0, 3);
  displaytxt.value = display;

  let longeurtxt = Malongeur.length;
  paragraphe.textContent = longeurtxt;
});

