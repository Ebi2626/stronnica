<?php

require ("head.php")
?>

<link rel="stylesheet" href="./dist/<?php

$filename = basename(__FILE__);
echo substr($filename, 0, -4);

?>.bundle.css" />
<title>Stronnica - <?php

$filename = basename(__FILE__);
echo substr($filename, 0, -4);

?>
</title>
<?php
if (!isset($_SESSION['user'])){
    echo "<script>alert('By edytować profil musisz być zalogowany')</script>";
    Header("Location: index.php");
}
?>
<body>
<div class="mainHeader">
<?php

include("nav.php")

?>
    <div class="profile">
        <h1 class="profile__title">Profil użytkownika: <?php
        $user = explode("@",$_SESSION['user']);
        $user = $user[0];
        $userName = str_replace(".", " ", $user);
        $id = $_SESSION['id'];
        echo $userName;
                ?></h1>
        <div class="profile__item">
            <p class="profile__label">Obecny avatar:</p><img id="userAvatar" src="./src/clients/<?php
            if(glob($user."_".$id.".*") > 0){

            require('avatar.php');

            } else {
            echo "human.png";
            }?>" class="profile__img" alt="avatar">
        </div>
        <div class="profile__item">
            <p class="profile__label" id="userMail">Obecny adres e-mail:</p><p class="profile__result"><?php echo $_SESSION['user'];?></p>
        </div>
        <div class="profile__item">
            <p class="profile__label" id="userCity">Obecne miasto:</p><p class="profile__result"><?php echo $_SESSION['miasto']; ?></p>
        </div>
        <div class="profile__item">
            <p class="profile__label" id="userAdress">Obecny adres:</p><p class="profile__result"><?php echo $_SESSION['adres'];?></p>
        </div>
    </div>
</div>
<main class="changing">
    <h2 class="changing__title">Ustawienia</h2>
    <form enctype="multipart/form-data" class="changing__item" method="post" action="changeAvatar.php">
        <div class="changing__line">
            <label for="avatar" class="changing__label--title">Zmień swój avatar:</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
            <input type="file" name="avatar" id="avatar" class="changing__input" accept="image/*" require/>
            <input type="submit" class="changing__submit"  value="Zmień"/>
        </div>
    </form>
    <form class="changing__item" method="post" action="changeEmail.php" autocomplete="on">
        <div class="changing__line">
            <label for="email" class="changing__label--title">Zmień swój adres e-mail:</label>
            <input type="email" name="email" id="email" class="changing__input" require/>
            <input type="submit" class="changing__submit"  value="Zmień"/>
        </div>
    </form>
    <form class="changing__item" method="post" action="changeAdress.php" autocomplete="on">
        <p class="changing__label--title">Zmień swój adres</p>
        <div class="changing__line">
            <label for="city" class="changing__label">Wprowadź nowe miasto:</label>
            <input type="text" name="city" id="city" class="changing__input" require/>
        </div>
        <div class="changing__line">
            <label for="adress" class="changing__label">Wprowadź nowy adres:</label>
            <input type="text" name="adress" id="adress" class="changing__input" require/>
            <input type="submit" class="changing__submit"  value="Zmień"/>
        </div>
    </form>
    <form class="changing__item" method="post" action="changePassword.php">
        <p class="changing__label--title">Zmień hasło</p>
        <div class="changing__line">
            <label for="oldPassword" class="changing__label">Wprowadź stare hasło:</label>
            <input type="password" name="oldPassword" id="oldPassword" class="changing__input" require/>
        </div>
        <div class="changing__line">
            <label for="newPassword" class="changing__label">Wprowadź nowe hasło:</label>
            <input type="password" name="newPassword" id="newPassword" class="changing__input" require/>
            <input type="submit" class="changing__submit"  value="Zmień"/>
        </div>
    </form>
    <form class="changing__item" method="post" action="removeAccount.php">
        <p class="changing__label--title">Usuń konto</p>
        <div class="changing__line">
            <label for="password" class="changing__label">Wprowadź  hasło:</label>
            <input type="password" name="password" id="password" class="changing__input" require/>
            <input type="submit" class="changing__submit"  value="Usuń"/>
        </div>
    </form>
</main>
<?php

require("footer.php")

?>
<script src="./dist/<?php
    $filename = basename(__FILE__);
    echo substr($filename, 0, -4);
    ?>.bundle.js"></script>
</body>