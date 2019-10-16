import "../sass/main.scss";
import "../sass/index.scss";
import "../sass/koszyk.scss";

var submenu = document.querySelector("#submenu"),
menu = document.querySelector(".hamburger");
function countingValue(){
    const tableRows = document.querySelectorAll('tbody tr');
    const result = document.querySelector("#result");
    const deliver = document.querySelector("#deliver");
    const deliver2 = document.querySelector("#deliver2");
    const rows = tableRows.length;
    let sum = 0;
    let books = 0;
    for (let i=1; i<rows+1; i++){
        let rowValue = (table.rows[i].cells[1].innerHTML) * (table.rows[i].cells[2].innerHTML);
        table.rows[i].cells[3].innerHTML = rowValue;
        books += table.rows[i].cells[2].innerHTML*1;
        sum += rowValue;
    }
    result.innerHTML = sum;
    console.log(books);
    let deliveryCost = (books/3)*15;
    deliveryCost = Math.round(deliveryCost);
    deliver.innerHTML = deliveryCost+" zł";
    deliver2.innerHTM = deliveryCost+" zł";


}

function countingItems(){
    let tytuly = document.querySelectorAll(".fullBucket__row");
        for (let i=0; i<tytuly.length; i++) {
            let item = tytuly[i];
            let itemContent = item.innerHTML;
            let itemRepeat = 1;
            for (let j=i+1; j<tytuly.length; j++) {
                let item2 = tytuly[j];
                let itemContent2 = item2.innerHTML;
                    if (j===i){
                        continue;
                    } else {
                    if (itemContent==itemContent2){
                        itemRepeat++;
                        item.setAttribute("data-ilość", itemRepeat);
                        item2.remove();
                    }
                }
            };
           tytuly.forEach(el => {
               if(el.getAttribute("data-ilość")==null){
                   el.setAttribute("data-ilość", 1);
               }
           }) 
        }
        tytuly = document.querySelectorAll(".fullBucket__row");
        for (let i=1; i<tytuly.length; i++){
            let item = tytuly[i];
            let ilość = item.getAttribute("data-ilość");
            table.rows[i].cells[2].innerHTML = ilość;
        }
        countingValue();
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
    };
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
submenu.addEventListener("click", listener);
window.addEventListener("DOMContentLoaded", countingItems);
