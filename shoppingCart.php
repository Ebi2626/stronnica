<?php
require('head.php');
?>
<?php
if(!isset($_SESSION['user'])){
    echo "<script type='text/javascript'>window.alert('By korzystać z koszyka musisz być zalogowany');
    location.href='zaloguj.php';</script>";
};
if(!isset($_SESSION['step'])){
    $_SESSION['step'] = 1;
    $step = $_SESSION['step'];
}
?>

<link rel="stylesheet" href="./dist/<?php

$filename = basename(__FILE__);
echo substr($filename, 0, -4);

?>.bundle.css" />
<title>Stronnica - Koszyk</title>
<?php
   $userMail = $_SESSION['user'];
   $prawieUser = explode("@",$userMail);
   $user = $prawieUser[0];
   $userFile = "orders/".$user.".json";
?>
</head>
<body><?php

?>
<header class="mainHeader"><?php
require("nav.php");
?>
    <div class="shoppingCart">

        <aside class="shoppingCart__instruction">
        <?php if(isset($_SESSION['shoppingCart_response'])){
            echo $_SESSION['shoppingCart_response']."<br/>";
            echo $_SESSION['step']."<br/>";
        }?>
            <ul class="shoppingCart__list">
                <li class="shoppingCart__step <?php if($_SESSION['step'] === 1){echo "step--active";}?>">
                    <h4 class="shoppingCart__stepTitle">Krok 1/4</h4>
                    <p class="shoppingCart__stepDescription">Wybór produktów</p>
                </li>
                <li class="shoppingCart__step <?php if((file_exists($userFile)) && ($_SESSION['step'] === 2)){echo "step--active";}?>">
                    <h4 class="shoppingCart__stepTitle">Krok 2/4</h4>
                    <p class="shoppingCart__stepDescription">Wybór metody płatności i dostawy</p>
                </li>
                <li class="shoppingCart__step <?php if((isset($_SESSION['payment'])) && ($_SESSION['step'] === 3)){echo "step--active";}?>">
                    <h4 class="shoppingCart__stepTitle">Krok 3/4</h4>
                    <p class="shoppingCart__stepDescription">Potwierdzenie danych teleadresowych</p>
                </li>
                <li class="shoppingCart__step <?php if(isset($_SESSION['adress_data']) && ($_SESSION['step'] === 4)){echo "step--active";}?>">
                    <h4 class="shoppingCart__stepTitle">Krok 4/4</h4>
                    <p class="shoppingCart__stepDescription">Potwierdzenie zamówienia</p>
                </li>
            </ul>
            <div class="securityGuarantee">
                <p class="securityGuarantee__text">100% Bezpieczeństwa <i class="fa fa-shield"></i> </p>
            </div>
        </aside>
        <div class="shoppingCart__content">
        <?php
                require ('fullshoppingCart.php');
            ?>
        </div>
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