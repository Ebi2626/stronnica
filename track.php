<?php
require('head.php');
?>
<?php
if(!isset($_SESSION['user'])){
    echo "<script type='text/javascript'>window.alert('By korzystać ze śledzenia zamówień musisz być zalogowany');
    location.href='zaloguj.php';</script>";
};
?>
<link rel="stylesheet" href="./dist/<?php

$filename = basename(__FILE__);
$filename = substr($filename, 0, -4);
echo $filename;

?>.bundle.css" />
<title>Stronnica - Śledź zamówienie</title>
</head>
<body>
<header class="mainHeader"><?php
require("nav.php");
?>
<h1 class="title">Śledź zamówienie</h1>
<div class="track">
<?php 
    require("trackOrders.php");
    ?>
    <?php
    if(isset($_SESSION['orders'])){
        if ($_SESSION['orders'] == 0){
            echo "<p class='no__orders'>Nie ma żadnych zrealizowanych zamówień</p>";
        }
    }
?>
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