import "../sass/main.scss";
import "../sass/kategorie.scss";

var submenu = document.querySelector("#submenu"),
menu = document.querySelector(".hamburger"),
categoryList = document.querySelectorAll(".categories__item");

function menuFixed() {
   const menu = document.querySelector("#menu"),
   logo = document.querySelector("#logo");
   if (window.pageYOffset > 0) {
       menu.classList.add("menu--sticky");
       logo.classList.add("sticky--logo");

   } else {
       menu.classList.remove("menu--sticky");
       logo.classList.remove("sticky--logo");
   }
}

function mobileMenu() {
    const hamburger = document.querySelector("#hamburger"),
    submenu = document.querySelector("#submenu"),
    li = document.querySelectorAll(".submenu__item");
    if (window.innerWidth<756) {
            if(
                hamburger.classList.contains("hamburger__menu--active")){
                hamburger.classList.remove("hamburger__menu--active");
                submenu.classList.remove("submenu--active");
                hamburger.classList.remove("navy");
                document.body.style.overflowY = "auto";
                li.forEach(el => {
                    el.removeEventListener('click',listener)
                });
            } else {
                hamburger.classList.add("hamburger__menu--active");
                submenu.classList.add("submenu--active");
                hamburger.classList.add("navy");
                document.body.style.overflowY = "hidden";
                li.forEach(el => {
                    el.addEventListener('click', listener);
                    });
                };
    } else return;
}
function showCategoryList (){
    categoryList.forEach(el => {
        el.addEventListener('click', function show(){
                            el.classList.contains("categories__item--active") ? el.classList.remove("categories__item--active") : el.classList.add("categories__item--active");    })
    });
}
function listener() {
    menu.classList.remove("hamburger__menu--active");
    submenu.classList.remove("submenu--active");
    document.body.style.overflowY = "auto";
    let li = document.querySelectorAll(".submenu__item");
    li.forEach(el => {
        el.removeEventListener('click',listener)
    });
}

document.addEventListener("DOMContentLoaded", showCategoryList);
menu.addEventListener("click", mobileMenu);
document.addEventListener("scroll", menuFixed);
window.addEventListener("resize", menuFixed);
submenu.addEventListener("click", listener);