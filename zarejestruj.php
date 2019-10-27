<?php

require ("head.php")

?>
<?php

if (isset($_POST['email'])) {
    // Flaga walidacji
    $wszystko_OK=true;

    // Zmienne z formularza

    $name = $_POST['name'];
    $adres = $_POST['adres'];
    $miasto = $_POST['city'];
    $email = $_POST['email'];
    $haslo1 = $_POST['password1'];
    $haslo2 = $_POST['password2'];

    // Sprawdzenie długości imienia i nazwiska
    if ((strlen($name)<2) || (strlen($name)>25)) {
        $wszystko_OK=false;
        $_SESSION['e_name']="Nieprawidłowe imię i nazwisko";

        // Sprawdzenie czy imię i nazwisko to dwa wyrazy napisane z dużej litery
    } elseif (!preg_match('/[A-ZŁŚ]{1}+[a-ząęółśżźćń]{2,12}+\s+[A-ZŁŚ]{1}+[a-ząęółśżźćń]{2,12}/', $name)){
        $wszystko_OK=false;
        $_SESSION['e_name']="Nieprawidłowe imię i nazwisko";
    }

    //Sprawdzenie miasta

     if ((strlen($miasto)<3) || (strlen($miasto)>15)){
        $wszystko_OK=false;
        $_SESSION['e_city']="Wprowadzono nieprawidłowe miasto";
    }

    //Sprawdzenie adresu
    if ((strlen($adres)<5) || (strlen($adres)>40)){
        $wszystko_OK=false;
        $_SESSION['e_adres']="Wprowadzono nieprawidłowy adres";
    }

    // Sprawdzenie maila

    // Sanityzacja wprowadzonego adresu email
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Walidacja maila i wykluczenie pomyłek wynikłych z polskich znaków
    if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB != $email)) {
        $wszystko_OK=false;
        $_SESSION['e_mail']="Nieprawidłowy adres e-mail";
        // Sprawdzenie długości poprawnego maila
    } elseif ((strlen($emailB)<5) || (strlen($emailB)>30)){
        $wszystko_OK=false;
        $_SESSION['e_mail']="Nieprawidłowa długość adresu email";
        // Upewnienie się co do poprawności danych przy pomocy wyrażenia regularnego
    } elseif (!preg_match('/^([A-Z|a-z|0-9](\.|_){0,1})+[A-Z|a-z|0-9]\@([A-Z|a-z|0-9])+((\.){0,1}[A-Z|a-z|0-9]){2}\.[a-z]{2,3}$/', $email)) {
        $wszystko_OK=false;
        $_SESSION['e_mail']="Nieprawidłowy adres e-mail";
    }

    // Sprawdzenie długości hasła
    if((strlen($haslo1)<6) || (strlen($haslo1)>25)) {
        $wszystko_OK=false;
        $_SESSION['e_haslo']="Hasło musi mieć od 6 do 24 znaków";

        // Sprawdzenie czy hasła są identyczne
    } elseif ($haslo1 != $haslo2) {
        $wszystko_OK=false;
        $_SESSION['e_haslo']="Hała nie są identyczne";
    } else {
        // Jeżeli wszystko jest w porządku, to hashujemy hasło
        $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
    }

    // Sprawdzenie zgody na regulamin
    if (!isset($_POST['rules'])){
        $_SESSION['e_rules']="Proszę wyrazić zgodę na regulamin";
    }

    // Sprawdzenie recaptcha

    $sekret = "6Le1wLkUAAAAALzXhWAX9rEPwyrM1mNWDOvRgbuK";

    $recaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);

    $odpowiedz = json_decode($recaptcha);
    $_SESSION['answer'] = $odpowiedz->success;

    if($odpowiedz->success == false) {
        $wszystko_OK=false;
            $_SESSION['e_recaptcha']="Proszę przejść test turinga";
    }
    // Otworzenie połączenia
    require_once "connect.php";
    // Ręczne przechwytywanie błędów
    mysqli_report(MYSQLI_REPORT_STRICT);
    // Próba połaczenia z bazą danych
    try {
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        // Wyrzucanie błędów w postaci wyjątków obsługiwanych dalej
        if($polaczenie->connect_errno!=0) {
            throw new Exception(mysqli_connect_errno());
        }
        else {
            // W wypadku braku błędów zapytanie
            $rezultat = $polaczenie->query("SELECT idklienta FROM klienci WHERE email='$email'");

            if (!$rezultat) throw new Exception($polaczenie->error);

            $ile_maili = $rezultat->num_rows;
            // Jeżeli już istnieje taki rekord w bazie - wyrzucenie błędu dla użytkownika
            if ($ile_maili>0){
                $wszystko_OK=false;
                $_SESSION['e_mail']="Użytkownik o takim e-mailu już jest w bazie";
            }
            if($wszystko_OK==true){
                $imieINazwisko = explode(" ", $name);
                $imie = $imieINazwisko[0];
                $nazwisko = $imieINazwisko[1];

                if($polaczenie->query("INSERT INTO klienci(`idklienta`, `imie`, `nazwisko`, `miejscowosc`, `email`, `haslo`, `Avatar`) VALUES (NULL, '$imie', '$nazwisko', '$miasto', '$email', '$haslo_hash', 'human.png')")){
                    $_SESSION['udanarejestracja']=true;
                    Header('Location: welcome.php');
                } else {
                    unset($_SESSION['udanarejestracja']);
                    throw new Exception($polaczenie->error);
                }

                //Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
            }
            $polaczenie->close();
        }
    }
    catch(Exception $e) {
        echo '<span style="color: red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie</span>';
        echo '<br .> Informacja developerska: '.$e;
    }
} else {
    unset($_SESSION['e_name'], $_SESSION['e_adres'], $_SESSION['e_city'], $_SESSION['e_haslo'], $_SESSION['e_rules'], $_SESSION['e_recaptcha']);
}

?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
     <script>
       function onSubmit(token) {
         document.getElementById("register").submit();
       }
     </script>
<link rel="stylesheet" href="./dist/<?php

$filename = basename(__FILE__);
echo substr($filename, 0, -4);

?>.bundle.css" />
<title>Stronnica - <?php

$filename = basename(__FILE__);
echo substr($filename, 0, -4);

?>
</title>

<body>
<main class="mainHeader">
<?php

include("nav.php")

?>
<aside class="aside">
    <form class="login" method="post" id="register">
        <header class="login__header">
            <h2>Zarejestruj się</h2>
            <p>I w pełni korzystaj z naszych usług</p>
        </header>
        <label class="login__label" for="name">Imię i nazwisko:<br />
            <input required class="login__input" type="text" name="name" id="name"/><br />
            <p class="error">
                <?php
                    if(isset($_SESSION['e_name'])){
                        echo $_SESSION['e_name']."<br />";
                        unset($_SESSION['e_name']);
                    }
                ?>
            </p>
        </label>
        <label class="login__label" for="city">Miasto:<br />
            <input required class="login__input" type="text" name="city" id="city"/><br />
            <p class="error">
                <?php
                    if(isset($_SESSION['e_city'])){
                        echo $_SESSION['e_city']."<br />";
                        unset($_SESSION['e_city']);
                    }
                ?>
            </p>
        </label>
        <label class="login__label" for="adres">Adres:<br />
            <input required class="login__input" type="text" name="adres" id="adres"/><br />
            <p class="error">
                <?php
                    if(isset($_SESSION['e_adres'])){
                        echo $_SESSION['e_adres']."<br />";
                        unset($_SESSION['e_adres']);
                    }
                ?>
            </p>
        </label>
        <label class="login__label" for="email">Adres e-mail:<br />
            <input required class="login__input"type="text" name="email" id="email"/> <br />
            <p class="error">
                <?php
                    if (isset($_SESSION['e_mail'])){
                        echo $_SESSION['e_mail']."<br>";
                        unset($_SESSION['e_mail']);
                    }
                ?>
            </p>
        </label>
        <label class="login__label" for="password">Hasło:<br />
            <input required class="login__input" type="password" id="password1" name="password1"/> <br />
            <p class="error">
                <?php
                    if (isset($_SESSION['e_haslo'])){
                        echo $_SESSION['e_haslo']."<br>";
                        unset($_SESSION['e_haslo']);
                    }
                ?>
            </p>
        </label>
        <label class="login__label" for="password">Powtórz hasło:<br />
            <input required class="login__input" type="password" id="password2" name="password2"/>
        </label>
        <label for="rules" class="login__label"> Akceptuję <a href="rules.php" target="_blank">regulamin </a><br />
            <input required type="checkbox" name="rules" id="rules" class="checkbox" /><br />
            <p class="error">
                <?php
                    if(isset($_SESSION['e_rules'])){
                        echo $_SESSION['e_rules']."<br />";
                        unset($_SESSION['e_rules']);
                    }
                ?>
            </p>
        </label>
        <button class="g-recaptcha" data-sitekey="6Le1wLkUAAAAAGqRXqOxQe6b9QKheRbDsnUMBIzA" data-callback='onSubmit'>Zarejestruj</button>
        <p class="error">
                <?php
                    if(isset($_SESSION['e_captcha'])){
                        echo $_SESSION['e_captcha']."<br />";
                        unset($_SESSION['e_captcha']);
                    }
                ?>
            </p>
    </form>
</aside>

</main>
<main class="main">

<div class="main__content">

</div>
</main>
<?php

require("footer.php")

?>
</body>
<script>
  grecaptcha.ready(function() {
      grecaptcha.execute('reCAPTCHA_6Ldo67gUAAAAABEZ3T3Chn-h0igCgLNiaklOoot5', {action: 'homepage'});
  });
  </script>
<script src="./dist/<?php
    $filename = basename(__FILE__);
    echo substr($filename, 0, -4);
    ?>.bundle.js"></script>