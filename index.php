<?php
require('head.php');
?>
<link rel="stylesheet" href="./dist/<?php

$filename = basename(__FILE__);
echo substr($filename, 0, -4);

?>.bundle.css" />
<title>Stronnica - Twoja Księgarnia Internetowa</title>
</head>
<body>
<header class="mainHeader">
    <?php
    include("nav.php");
    ?>
        <div class="mainHeader__box" id="mainHeader__box">
            <?php
            if (isset($_SESSION['pass'])){
                if ($_SESSION['refreshing'] < 1){
                echo "<p class='slide slide--active'>Zalogowano pomyślnie</p>";
                $_SESSION['refreshing']++;
                };
            };
            ?>
             <?php
            if (isset($_SESSION['w_koszyku'])){
                if ($_SESSION['w_koszyku'] == 1){
                echo "<p class='slide slide--active'>Dodano do koszyka</p>";
                $_SESSION['w_koszyku']++;
                };
            };
            ?>
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
                <?php
    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0) {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else {
        $polaczenie -> query("SET NAMES 'utf8'");
        $sql = "SELECT * FROM ksiazki WHERE Gatunek='Informatyka'";
        if ($rezultat = @$polaczenie->query($sql)){
            $ile_ksiazek = $rezultat->num_rows;
            if($ile_ksiazek>0) {
                $i=0;
                while ($wiersz = $rezultat->fetch_object()) {
                    echo "<div class='content__items' id='content".$wiersz->idksiazki."' ><a class='sending'><div class='tooltip'>";
                    echo "<span class='tooltip__text'>Dodaj do koszyka</span></div></a>";
                    echo "<h4 class='content__bookAuthor' name='autor'>".$wiersz->imieautora." ".$wiersz->nazwiskoautora."</h4>";
                    echo "<img class='content__img' src='./src/covers/".$wiersz->Okladka."' />";
                    echo "<p class='content__bookTitle' name='tytul'>".$wiersz->tytul."</p>";
                    echo "</div>";
                    $i++;
                    if ($i > 3) {
                    break;
                }
                }
                $rezultat->close();
                    } else {
            echo "nie znaleziono książek";
            $rezultat->close();
        }
            } else {
                echo"<p class='nopass'> Błąd połączenia 2</p>";
                $polaczenie->close();
            }
        }
?>
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
                <?php
            $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0) {
     echo "Error: ".$polaczenie->connect_errno;
}
else {
    $polaczenie -> query("SET NAMES 'utf8'");
    $sql = "SELECT * FROM ksiazki WHERE Gatunek='Matematyka'";
    if ($rezultat = @$polaczenie->query($sql)){
        $ile_ksiazek = $rezultat->num_rows;
        if($ile_ksiazek>0) {
            $i=0;
            while ($wiersz = $rezultat->fetch_object()) {
                echo "<div class='content__items' id='content".$wiersz->idksiazki."' ><a class='sending'><div class='tooltip'>";
                echo "<span class='tooltip__text'>Dodaj do koszyka</span></div></a>";
                echo "<h4 class='content__bookAuthor'>".$wiersz->imieautora." ".$wiersz->nazwiskoautora."</h4>";
                echo "<img class='content__img' src='./src/covers/".$wiersz->Okladka."' />";
                echo "<p class='content__bookTitle'>".$wiersz->tytul."</p>";
                echo "</div>";
                $i++;
                if ($i > 3) {
                    break;
                }
            }
            $rezultat->close();
                } else {
        echo "nie znaleziono książek";
        $rezultat->close();
    }
        } else {
            echo"<p class='nopass'> Błąd połączenia 2</p>";
            $polaczenie->close();
        }
    }
?>
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
                <?php

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if($polaczenie->connect_errno!=0) {
    echo "Error: ".$polaczenie->connect_errno;
}
else {
    $polaczenie -> query("SET NAMES 'utf8'");
    $sql = "SELECT * FROM ksiazki WHERE Gatunek='Fizyka'";
    if ($rezultat = @$polaczenie->query($sql)){
        $ile_ksiazek = $rezultat->num_rows;
        if($ile_ksiazek>0) {
            $i=0;
            while ($wiersz = $rezultat->fetch_object()) {
                echo "<div class='content__items' id='content".$wiersz->idksiazki."' ><a class='sending'><div class='tooltip'>";
                echo "<span class='tooltip__text'>Dodaj do koszyka</span></div></a>";
                echo "<h4 class='content__bookAuthor'>".$wiersz->imieautora." ".$wiersz->nazwiskoautora."</h4>";
                echo "<img class='content__img' src='./src/covers/".$wiersz->Okladka."' />";
                echo "<p class='content__bookTitle'>".$wiersz->tytul."</p>";
                echo "</div>";
                $i++;
                if ($i > 3) {
                break;
            }
            }
            $rezultat->close();
                } else {
        echo "nie znaleziono książek";
        $rezultat->close();
    }
        } else {
            echo"<p class='nopass'> Błąd połączenia 2</p>";
            $polaczenie->close();
        }
    }
?>
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
            <?php

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if($polaczenie->connect_errno!=0) {
    echo "Error: ".$polaczenie->connect_errno;
}
else {
    $polaczenie -> query("SET NAMES 'utf8'");
    $sql = "SELECT * FROM ksiazki WHERE Gatunek='Inzynieria'";
    if ($rezultat = @$polaczenie->query($sql)){
        $ile_ksiazek = $rezultat->num_rows;
        if($ile_ksiazek>0) {
            $i=0;
            while ($wiersz = $rezultat->fetch_object()) {
                echo "<div class='content__items' id='content".$wiersz->idksiazki."' ><a class='sending'><div class='tooltip'>";
                echo "<span class='tooltip__text'>Dodaj do koszyka</span></div></a>";
                echo "<h4 class='content__bookAuthor'>".$wiersz->imieautora." ".$wiersz->nazwiskoautora."</h4>";
                echo "<img class='content__img' src='./src/covers/".$wiersz->Okladka."' />";
                echo "<p class='content__bookTitle'>".$wiersz->tytul."</p>";
                echo "</div>";
                $i++;
                if ($i > 3) {
                break;
            }
            }
            $rezultat->close();
                } else {
        echo "nie znaleziono książek";
        $rezultat->close();
    }
        } else {
            echo"<p class='nopass'> Błąd połączenia 2</p>";
            $polaczenie->close();
        }
    }
?>
        </div>
    </section>
    <div class="banner" id="banner">
        <div class="banner__content">
            <img src="./src/img/ml.jpg" alt="matematyka" class="banner__img">
            <img src="./src/img/el.jpg" alt="inżynieria" class="banner__img">
            <img src="./src/img/il.jpg" alt="informatyka" class="banner__img">
            <img src="./src/img/fl.jpg" alt="fizyka" class="banner__img">
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
        <img src="./src/img/mr.jpg" alt="matematyka" class="banner__img">
            <img src="./src/img/er.jpg" alt="inżynieria" class="banner__img">
            <img src="./src/img/ir.jpg" alt="informatyka" class="banner__img">
            <img src="./src/img/fr.png" alt="fizyka" class="banner__img">
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
    <?php

require("footer.php")

?>
  <script src="./dist/<?php
    $filename = basename(__FILE__);
    echo substr($filename, 0, -4);
    ?>.bundle.js"></script>
</body>