<?php
session_start();
if (!isset($_SESSION['user'])){
    echo "<script>alert('By edytować profil musisz być zalogowany')</script>";
    Header("Location: index.php");
}
$miastoWprowadzone = $_POST['city'];
$miasto = htmlentities($miastoWprowadzone);
$adresWprowadzony = htmlentities($_POST['adress']);
$adres = htmlentities($adresWprowadzony);



if (($miastoWprowadzone !== $miasto) || ($adresWprowadzony !== $adres)){
    echo "<script>alert('Proszę wprowadzić poprawny adres!');</script>";
    echo "<script>window.location.href = 'profile.php';</script>";
} else {

    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    $email = $_SESSION['user'];
    $update = sprintf("UPDATE `klienci` SET `miejscowosc`='".$miasto."' WHERE email='%s'", mysqli_real_escape_string($polaczenie, $email));
    if($zmien=$polaczenie->query($update)){
        echo "<script>alert('Baza danych została zaktualizowana')</script>";
        $polaczenie->close();
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
    $polaczenie->close();
    echo "<script>alert('Błąd podczas próby zmiany adresu')</script>";
    echo "<script>window.location.href = 'profile.php';</script>";
    }
    echo "<script>alert('Błąd podczas łączenia z bazą danych')</script>";
    echo "<script>window.location.href = 'profile.php';</script>";
}

?>