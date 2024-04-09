document.addEventListener('DOMContentLoaded', () => {
  const hamburger = document.querySelector(".hamburger");
  const navMenu = document.querySelector(".nav-menu");
  const overlay = document.querySelector(".overlay");
  const navSubitems = document.querySelectorAll(".nav-subitem");
  const searchBar = document.querySelector(".search-bar");

  if (hamburger && navMenu && overlay) {
    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("active");
      navMenu.classList.toggle("active");
      overlay.classList.toggle("active");
      searchBar.classList.toggle("active");

      navSubitems.forEach((item) => {
        item.classList.toggle("active");
      });

      document.body.classList.toggle("no-scroll");
    });
  } else {
    console.error("Elementos não encontrados no DOM.");
  }
});
