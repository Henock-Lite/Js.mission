
document.addEventListener("DOMContentLoaded", () => {
  const exploreBtn = document.querySelector(".btn[href='#catalogue']");
  const searchInput = document.getElementById("search");

  if (exploreBtn) {
    exploreBtn.addEventListener("click", (e) => {
      e.preventDefault();
      const target = document.querySelector("#catalogue");
      if (target) {
        target.scrollIntoView({ behavior: "smooth" });
      }
    });
  }

  if (searchInput) {
    searchInput.addEventListener("focus", () => {
      searchInput.style.borderColor = "#3498db";
      searchInput.style.outline = "none";
    });
    searchInput.addEventListener("blur", () => {
      searchInput.style.borderColor = "#ccc";
    });
  }


  const guideCards = document.querySelectorAll(".grid-cards > div");
  guideCards.forEach((card) => {
    card.style.transition = "transform 0.3s ease";
    card.addEventListener("mouseenter", () => {
      card.style.transform = "scale(1.02)";
    });
    card.addEventListener("mouseleave", () => {
      card.style.transform = "scale(1)";
    });
  });
});
