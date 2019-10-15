<?php
session_start();
$user = $_SESSION['user'];
$prawieUser = explode("@",$user);
$user = $prawieUser[0];

// wczytanie starych danych
// stworzenie nowych danych
$a = $_GET['autor'];
$t = $_GET['tytul'];
$noweDane  = $user."<br>".$a."<br>".$t;

// zapisanie nowych danych

// otwarcie pliku do zapisu
$fp = fopen($user.".txt", "w");

// zapisanie danych
fputs($fp, $noweDane);

// zamknięcie pliku
fclose($fp);
header('Location: index.php');
?>
