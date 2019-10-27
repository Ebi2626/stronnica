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
                    echo "<script>alert('".$delete."')</script>";
                    if($usun=$polaczenie->query($delete)){
                    $_SESSION['remove_account'] = 1;
                    echo "<script>alert('pykło2')</script>";
                    } else {
                    echo "<script>alert('Coś nie pykło1/2')</script>";
                    echo "<script>alert('".$sql."')</script>";
                    }
                    echo "<script>alert('Coś nie pykło')</script>";
                    //header('Location: index.php');
                }
        } else {
                $_SESSION['e_password'] = "<p class='nopass'>Nieprawidłowy login lub hasło!</p>";
                echo "<script>alert('Coś nie pykło3')</script>";
                //header('Location: zaloguj.php');
        }
        $polaczenie->close();
?>
