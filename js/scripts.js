//start of nav
const menuToggle = document.getElementById("menuToggle");
const menuNav = document.getElementById("menuNav");

const toggleMenu = () => {
  console.log("called toggleMenu")
  menuNav.classList.toggle("menuToggle");
}

menuToggle.addEventListener("click", toggleMenu);

//end of nav
