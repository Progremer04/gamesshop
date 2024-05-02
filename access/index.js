let menu = document.querySelector('.menu-icon');
//  for showing and hide the nave bar
let navbar = document.querySelector('.menu');
menu.onclick = () => {
    navbar.classList.toggle('active');
    menu.classList.toggle('move');
}