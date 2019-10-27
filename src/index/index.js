import "../sass/index.scss";
import "../sass/main.scss";

var categoryPos = document.querySelector("#category").offsetTop,
itPos = document.querySelector("#it").offsetTop,
mathPos = document.querySelector("#math").offsetTop,
physicPos = document.querySelector("#physic").offsetTop,
engineringPos = document.querySelector("#enginering").offsetTop,
bannerPos = document.querySelector("#banner").offsetTop,
submenu = document.querySelector("#submenu"),
menu = document.querySelector(".hamburger"),
ksiazki = document.querySelectorAll(".sending>.tooltip");



function addToBucketReady(){
    let login = document.querySelector(".loginText");
    let click = 0;

    function addToBucket(){
        click++;
        let autorKsiazki = this.parentNode.parentNode.children[1].innerHTML;
        let tytulKsiazki = this.parentNode.parentNode.children[3].innerHTML;
        let pozycja = {
            autor: autorKsiazki,
            tytul: tytulKsiazki
        }
        console.log(autorKsiazki);
        console.log(tytulKsiazki);
        this.parentNode.setAttribute("href", "http://localhost/stronnica/basketItem.php?autor="+pozycja.autor+"&tytul="+pozycja.tytul);
        let pozycjaJSON = JSON.stringify(pozycja);
        let nowy = JSON.parse(pozycjaJSON);
    }
    function loginAlert() {
        alert ("Musisz byc zalogowany, by dodac ksiazke do koszyka.");
    }
    ksiazki.forEach(function(ksiozka){
        if (login != null){
            ksiozka.addEventListener("click", addToBucket);
            if (window.innerWidth < 768){
                ksiozka.parentNode.parentNode.addEventListener("click", function() {
                    if(this.children[0].children[0].classList.contains("tooltip--active")){
                        this.children[0].children[0].classList.remove("tooltip--active");
                    } else {
                        this.children[0].children[0].classList.add("tooltip--active");
                }
            });
            }
        } else {
            ksiozka.addEventListener("click", loginAlert);
            if (window.innerWidth < 768){
                ksiozka.parentNode.parentNode.addEventListener("click", function() {
                    if(this.children[0].children[0].classList.contains("tooltip--active")){
                        this.children[0].children[0].classList.remove("tooltip--active");
                    } else {
                        this.children[0].children[0].classList.add("tooltip--active");
                }
            });
        }
    }
});
}

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
function categoryFixed() {
    const category = document.querySelector("#category"),
    menu = document.querySelector("#menu"),
    logoText = document.querySelector(".logo__text"),
    logo = document.querySelector("#logo");
    let menuHeight = menu.clientHeight;
    if (window.innerWidth > 767) {
        if (categoryPos <= (window.pageYOffset +  menuHeight)) {
            category.classList.add("category--fixed");
            logo.classList.add("logo--smaller");
            logoText.classList.add("invisible");

            if(window.pageYOffset >= (bannerPos-250)) {
                category.classList.add("invisible")
            } else if (category.classList.contains("invisible")){
                category.classList.remove("invisible");
            } else return;

        } else {
            if (category.classList.contains("category--fixed")) {
            category.classList.remove("category--fixed");
            logo.classList.remove("logo--smaller");
            logoText.classList.remove("invisible");

            } else return
        }

     } else {
            if (category.classList.contains("category--fixed")) {
            category.classList.remove("category--fixed");
            logo.classList.remove("logo--smaller");
            logoText.classList.remove("invisible");
        } else return
    }
}
function calculateX() {
    if (window.innerWidth < 800) {
        let x = 300;
        return x;
    } else {
        let x = 350;
       return x;
    }
};
function categoryActive() {
    const it = document.querySelector("#c1"),
    math = document.querySelector("#c2"),
    physic = document.querySelector("#c3"),
    eng = document.querySelector("#c4");
    let screenPos = window.pageYOffset;
    calculateX();
    if (screenPos >= (itPos - calculateX()) && screenPos < (mathPos - calculateX())) {
        it.classList.add("category--active");
    } else {
        it.classList.remove("category--active");
    };
    if (screenPos >= (mathPos - calculateX()) && screenPos < (physicPos - calculateX())) {
        math.classList.add("category--active");
    } else {
        math.classList.remove("category--active");
    };
    if (screenPos >= (physicPos - calculateX()) && screenPos < (engineringPos - calculateX())) {
        physic.classList.add("category--active");
    } else {
        physic.classList.remove("category--active");
    };
    if (screenPos >= (engineringPos - calculateX()) && screenPos < (bannerPos - calculateX())) {
        eng.classList.add("category--active");
    } else {
        eng.classList.remove("category--active");
    };
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
                document.body.style.overflowY = "auto";
                li.forEach(el => {
                    el.removeEventListener('click',listener)
                });
            } else {
                hamburger.classList.add("hamburger__menu--active");
                submenu.classList.add("submenu--active");
                document.body.style.overflowY = "hidden";
                li.forEach(el => {
                    el.addEventListener('click', listener);
                    });
                };
    } else return;
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

menu.addEventListener("click", mobileMenu);
document.addEventListener("scroll", menuFixed);
window.addEventListener("resize", menuFixed);
document.addEventListener("scroll", categoryFixed);
window.addEventListener("resize", categoryFixed);
document.addEventListener("scroll", categoryActive);
submenu.addEventListener("click", listener);
window.addEventListener("DOMContentLoaded", addToBucketReady)
window.addEventListener("resize", addToBucketReady);
