
// toggle menu 
let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');
menu.onclick = () => {
  menu.classList.toggle('bx-x');
  navbar.classList.toggle('open');
}

// show color on menu when there is a active page
const activePage = window.location.pathname;
const navLinks = document.querySelectorAll('header ul.navbar li a').forEach(link => {
  if(link.href.includes(`${header}`)){
    link.classList.add('actived');
    console.log(link);
  }
})