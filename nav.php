<nav class="menu" id="menu"><div class="session"><?php
if(isset($_SESSION['user'])){
    echo "<p class='user'>".$_SESSION['user']."</p>";
    echo "<a class='logout' href='logout.php'>Wyloguj <i style='font-size: 16px;' class='fa fa-sign-out' aria-hidden='true'></i></a>";
    }
    ?></div>
        <ul class="menu__left">
            <li class="hamburger"><div class="hamburger__menu" id="hamburger"></div>
                <ul class="submenu" id="submenu">
                    <li class="submenu__item"><a href="http://localhost/stronnica/ksiazki.php" class="submenu__link">Ksiązki</a></li></li>
                    <li class="submenu__item"><a href="http://localhost/stronnica/autorzy.php" class="submenu__link">Autorzy</a></li>
                    <li class="submenu__item"><a href="http://localhost/stronnica/kategorie.php" class="submenu__link">Kategorie</a></li>
                    <li class="submenu__item"><a href="http://localhost/stronnica/zaloguj.php" class="submenu__link">Zaloguj się</a></li>
                    <li class="submenu__item"><a href="http://localhost/stronnica/zarejestruj.php" class="submenu__link">Zarejestruj się</a></li>
                </ul>
            </li>
            <li class="menu__item"><a href="http://localhost/stronnica/ksiazki.php" class="menu__link">Ksiązki</a></li>
            <li class="menu__item"><a href="http://localhost/stronnica/autorzy.php" class="menu__link">Autorzy</a></li>
            <li class="menu__item"><a href="http://localhost/stronnica/kategorie.php" class="menu__link">Kategorie</a></li>
        </ul>
        <a href="http://localhost/stronnica/index.php"><div class="menu__logo"><p class="logo__text">stronnica</p><img src="./src/img/logo.svg" alt="logo" id="logo" class="logo__img"></div></a>
        <ul class="menu__right">
            <li class="menu__item"><a href="http://localhost/stronnica/zaloguj.php" class="menu__link">Zaloguj się</a></li>
            <li class="menu__item"><a href="http://localhost/stronnica/zarejestruj.php" class="menu__link">Zarejestruj się</a></li>
            <li class="menu__item"><a href="http://localhost/stronnica/koszyk.php" class="menu__link"><i class="fa fa-shopping-basket" style="font-size: 24px;"></i></a></li>
        </ul>
    </nav>

