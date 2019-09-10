<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stronnica - księgarnia internetowa</title>
    <meta name="description" content="Stronnica to pierwsza w Polsce księgarnia internetowa z możliwością...">
    <link rel="stylesheet" href="style.bundle.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<header class="mainHeader">
    <nav class="menu" id="menu">
        <ul class="menu__left">
            <li class="hamburger"><div class="hamburger__menu" id="hamburger"></div>
                <ul class="submenu" id="submenu">
                    <li class="submenu__item"><a href="#" class="submenu__link">Ksiązki</a></li></li>
                    <li class="submenu__item"><a href="#" class="submenu__link">Autorzy</a></li>
                    <li class="submenu__item"><a href="#" class="submenu__link">Kategorie</a></li>
                    <li class="submenu__item"><a href="#" class="submenu__link">Zaloguj się</a></li>
                    <li class="submenu__item"><a href="#" class="submenu__link">Zarejestruj się</a></li>
                </ul>
            </li>
            <li class="menu__item"><a href="" class="menu__link">Ksiązki</a></li>
            <li class="menu__item"><a href="" class="menu__link">Autorzy</a></li>
            <li class="menu__item"><a href="" class="menu__link">Kategorie</a></li>
        </ul>
        <a href="#"><div class="menu__logo"><p class="logo__text">stronnica</p><img src="./img/logo.svg" alt="logo" id="logo" class="logo__img"></div></a>
        <ul class="menu__right">
            <li class="menu__item"><a href="" class="menu__link">Zaloguj się</a></li>
            <li class="menu__item"><a href="" class="menu__link">Zarejestruj się</a></li>
            <li class="menu__item"><a href="" class="menu__link"><i class="fa fa-shopping-basket" style="font-size: 24px;"></i></i></a></li>
        </ul>
    </nav>
        <div class="mainHeader__box" id="mainHeader__box">
            <p class="mainHeader__smallText">Cała potęga wiedzy</p>
            <h3 class="mainHeader__title">Tania literatura. <br /> Bezcenna wiedza.</h3>
            <p class="mainHeader__text">Wierzymy, że to właśnie wiedza jest tym, co pozwoliło człowiekowi wyewoluować i przetrwać tyle setek tysięcy lat. Dzisiaj, w cywilizacji wysokich technologii wiedza jest podstawowym fundamentem nie tylko sukcesu życiowego, ale w ogóle skutecznego funkcjonowania. Dzięki wiedzy zawartej w książkach naszej księgarni każdy człowiek może opanować najbardziej skomplikowane mechanizmy i czuć się w naszej cyfrowej rzeczywistości, jak ryba w wodzie.</p>
        </div>
    </header>
    <nav class="category" id="category">
        <ul class="category__list">
            <li class="category__item" id="c1"><a href="#it" class="category__link" >Informatyka</a></li>
            <li class="category__item" id="c2"><a href="#math" class="category__link">Matematyka</a></li>
            <li class="category__item" id="c3"><a href="#physic" class="category__link">Fizyka</a></li>
            <li class="category__item" id="c4"><a href="#enginering" class="category__link">Inżynieria</a></li>
        </ul>
    </nav>
    <section class="it" id="it">
        <div class="header">
            <div class="titleBox">
                <h5 class="title">Informatyka</h5>
                <p class="subtitle">Programowanie. Konfiguracja systemów operacyjnych. Urządzenia.</p>
                <div class="button">
                    <p class="buttonContent">Więcej na temat informatyki</p>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content__header">
                <h5 class="content__title">Informatyka</h5>
                <p class="content__text">Podręczniki od 29,99zł</p>
            </div>
            <div class="content__box">
                <div class="content__items"></div>
                <div class="content__items"></div>
                <div class="content__items"></div>
                <div class="content__items"></div>
            </div>
        </div>
    </section>
    <section class="math" id="math">
        <div class="header">
            <div class="titleBox">
                <h5 class="title">Matematyka</h5>
                <p class="subtitle">Równania. Całki. Macierze. Repozytoria. Algorytmika.</p>
                <div class="button">
                    <p class="buttonContent">Więcej na temat matematyki</p>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content__header">
                <h5 class="content__title">Matematyka</h5>
                <p class="content__text">Podręczniki od 19,99zł</p>
            </div>
            <div class="content__box">
            <div class="content__items"></div>
                <div class="content__items"></div>
                <div class="content__items"></div>
                <div class="content__items"></div>
            </div>
        </div>
    </section>
      <section class="physics" id="physic">
        <div class="header">
            <div class="titleBox">
                <h5 class="title">Fizyka</h5>
                <p class="subtitle">Newtonowska i kwantowa. Repozytoria. Zbiory zadań.</p>
                <div class="button">
                    <p class="buttonContent">Więcej na temat fizyki</p>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content__header">
                <h5 class="content__title">Fizyka</h5>
                <p class="content__text">Podręczniki od 25,99zł</p>
            </div>
            <div class="content__box">
            <div class="content__items"></div>
<div class="content__items"><h2>ksiazka</h2><div style="background-color:black; width: 100px; height: 150px;"></div></div>
                <div class="content__items"></div>
                <div class="content__items"></div>
            </div>
        </div>
    </section>
    <section class="enginering" id="enginering">
        <div class="header">
            <div class="titleBox">
                <h5 class="title">Inżynieria</h5>
                <p class="subtitle">Inżynieria oprogramowania. Inżynieria materiałowa. Robotyka. Teleinformatyka.</p>
                <div class="button">
                    <p class="buttonContent">Więcej na tematy techniczne</p>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="content__header">
                <h5 class="content__title">Inżynieria</h5>
                <p class="content__text">Podręczniki od 49,99zł</p>
            </div>
            <div class="content__box">
            <div class="content__items"></div>
                <div class="content__items"></div>
                <div class="content__items"></div>
                <div class="content__items"></div>
            </div>
        </div>
    </section>
    <div class="banner" id="banner">
        <div class="banner__content">
            <img src="./img/ml.jpg" alt="matematyka" class="banner__img">
            <img src="./img/el.jpg" alt="inżynieria" class="banner__img">
            <img src="./img/il.jpg" alt="informatyka" class="banner__img">
            <img src="./img/fl.jpg" alt="fizyka" class="banner__img">
        </div>
        <div class="banner__content">
            <div class="banner__header">
            <p class="banner__subtitle">#Stronnica</p>
            <h5 class="banner__title">Dzielimy się wiedzą.</h5>
                <div class="banner__button">
                 <a href="http://www.twitter.com"><p class="banner__buttonContent">Śledź nas na twitterze</p></a>
                </div>
            </div>
         </div>
        <div class="banner__content">
        <img src="./img/mr.jpg" alt="matematyka" class="banner__img">
            <img src="./img/er.jpg" alt="inżynieria" class="banner__img">
            <img src="./img/ir.jpg" alt="informatyka" class="banner__img">
            <img src="./img/fr.png" alt="fizyka" class="banner__img">
        </div>
    </div>
    <div class="newsletter">
        <div class="newsletter__header">
            <h6 class="newsletter__title">Zapisz się na nasz newsletter.</h6>
            <p class="newsletter__subtitle">Bądź na bieżąco z najnowszymi dokonaniami naukowymi i promocjami.</p>
        </div>
        <form class="newsletter__saver">
            <input type="text" name="mail" class="newsletter__input" placeholder="Twój email">
            <input type="submit" class="newsletter__submit">
        </form>
    </div>
    <footer class="footer">
        <div class="footer__logo"><img src="./img/logo.svg" alt="" class="footer__img"></div>
        <div class="footer__content">
            <ul class="footer__list">
                <li class="footer__listHeader">Książki</li>
                <li class="footer__link"><a href="#it">Informatyka</a></li>
                <li class="footer__link"><a href="#math">Matematyka</a></li>
                <li class="footer__link"><a href="#physic">Fizyka</a></li>
                <li class="footer__link"><a href="#enginering">Inżynieria</a></li>
            </ul>
            <ul class="footer__list">
                <li class="footer__listHeader">O nas</li>
                <li class="footer__text"><p class="footer__paragraph">Naszą misją jest szerzenie nowoczensej wiedzy w świecie zaawansowanych technologii w sposób przystępny dla każdego. Chcemy umożliwić ludziom zrozumienie urządzeń użytku codziennego, które ułatwiają nam życie na każdym kroku.</p>
                </li>
            </ul>
            <ul class="footer__list">
                <li class="footer__listHeader">Kontakt</li>
                <li class="footer__link">E-mail: <a href="mailto:biuro@stronnica.pl">biuro@stronnica.pl</a></li>
                <li class="footer__link">Tel: <a href="tel:+48999999999">999 999 999</a></li>
                <li class="footer__link">Kraków, <a href="https://goo.gl/maps/qFjVQHsFRgXbaQNs8"> ul. Głowackiego</a></li>
            </ul>
        </div>
    </footer>
    <div class="contact">
        <ul class="contact__list">
            <li class="contact__item">2019, Stronnica.</li>
            <li class="contact__item">Polityka prywatności</li>
        </ul>
    </div>
<script src="main.bundle.js"></script>
</body>
</html>