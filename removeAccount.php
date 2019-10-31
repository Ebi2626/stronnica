<?php

session_start();

if ((isset($_SESSION['user'])) && (isset($_POST['password']))) {
    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0) {
        echo "Error: ".$polaczenie->connect_errno;
    }  else {
        $email = $_SESSION['user'];
        $password = $_POST['password'];
                    $delete = sprintf("DELETE FROM `klienci` WHERE email='%s'", mysqli_real_escape_string($polaczenie, $email));
                    if($usun=$polaczenie->query($delete)){
                    $_SESSION['remove_account'] = 1;
                    echo "<script>alert('Konto zostało usunięte');</script>";
                    unset($_SESSION['user']);
                    echo "<script>window.location.href = 'index.php';</script>";
                    } else {
                    echo "<script>alert('Błąd podczas próby usunięcia konta')</script>";
                    echo "<script>window.location.href = 'index.php';</script>";
                    }
                    echo "<script>window.location.href = 'index.php';</script>";
                }
        } else {
                echo "<script>alert('Nieprawidłowe hasło')</script>";
        }
        $polaczenie->close();
?>
