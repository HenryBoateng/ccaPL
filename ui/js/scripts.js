//start of nav
const menuToggle = document.getElementById("menuToggle");
const menuNav = document.getElementById("menuNav");
const toggleMenu = () => {
  console.log("called toggleMenu")
  menuNav.classList.toggle("menuToggle");
}

menuToggle.addEventListener("click", toggleMenu);

//end of nav


let secondbtn = document.querySelector('#secondbtn');
let sidebar = document.querySelector('.sidebar');
let navtext = document.querySelector('.nav_list')

if (document.querySelector('body.tutorialPage')) {

  secondbtn.onclick = function() {
    sidebar.classList.toggle('active');
  }
}