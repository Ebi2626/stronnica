<?php
session_start();
if (!isset($_SESSION['user'])){
    echo "<script>alert('By edytować profil musisz być zalogowany')</script>";
    Header("Location: index.php");
}
foreach($_POST as $item => $value) echo $item."=>".$value."<br />";

require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

$nowyEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
if ((filter_var($nowyEmail, FILTER_VALIDATE_EMAIL) != true)){
echo "<script>alert('Wprowadzono niepoprawny adres email')</script>";
echo "<script>window.location.href = 'profile.php';</script>";
} else {
                $email = $_SESSION['user'];
                $update = sprintf("UPDATE `klienci` SET `email`='".$nowyEmail."' WHERE email='%s'", mysqli_real_escape_string($polaczenie, $email));
                if($zmien=$polaczenie->query($update)){
                    $_SESSION['user'] = $nowyEmail;
                    echo "<script>alert('Baza danych została zaktualizowana')</script>";
                    $polaczenie->close();
                    echo "<script>window.location.href = 'index.php';</script>";
                } else {
                $polaczenie->close();
                echo "<script>alert('Błąd podczas próby zmiany maila')</script>";
                echo "<script>window.location.href = 'profile.php';</script>";
                }
                echo "<script>alert('Błąd podczas łączenia z bazą danych')</script>";
                echo "<script>window.location.href = 'profile.php';</script>";
            }
?>