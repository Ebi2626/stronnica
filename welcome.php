<?php
if($_SESSION['udanarejestracja']!=true){
  header('Location: zarejestruj.php');
}
?>
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
    require("nav.php");
    ?>
        <div class="welcome__box" id="welcome__box">
            <?php 
            if (isset($_SESSION['pass'])){
                if ($_SESSION['refreshing'] < 1){
                echo "<p class='slide slide--active'>Zalogowano pomyślnie</p>";
                $_SESSION['refreshing']++;
                };
            };
            ?>
            <h3 class="welcome__title">Gratulacje - Twoja rejestracja przebiegła pomyślnie!</h3>
            <p class="welcome__text">Dzięki posiadaniu konta użytkownika możesz bez problemu zamawiać książki oraz przeglądać historię swoich zamówień w panelu klienta. Pamiętaj jednak, że wszystkie zamówienia realizowane są dopiero po zaksięgowaniu płatności. Mamy nadzieję, że zasoby naszej księgarni przysporzą Ci nie tylko wiedzy, ale także frajdy z odkrywania tego co nieznane!</p>
            <a href="zaloguj.php"><div class="welcome__button"><p class="welcome__buttonText">Przejdź do logowania</p></div></a>
        </div>
    </header>
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
<?php 
unset($_SESSION['udanarejestracja']);
?>