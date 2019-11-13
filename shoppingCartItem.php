<?php
session_start();
$userMail = $_SESSION['user'];
$prawieUser = explode("@",$userMail);
$user = $prawieUser[0];
$userFile = "orders/".$user.".json";
$a = $_GET['autor'];
$t = $_GET['tytul'];
class Pozycja {
    public $autor;
    public $tytul;
    function pokaz(){
        echo $this->autor;
        echo $this->tytul;
    }
}
$pozycja = new Pozycja();
$pozycja->autor = $a;
$pozycja->tytul = $t;
if(isset($_SESSION["ilosc_".$t])){
    $_SESSION["ilosc_".$t]++;
} else {
    $_SESSION["ilosc_".$t] = 1;
}
$pozycjaJSON = json_encode($pozycja)."/";
// wczytanie starych danych
// stworzenie nowych danych
if(file_exists($userFile)){
   $stareDane = fread(fopen($userFile, "rt"), filesize($userFile));
   $noweDane = $stareDane."\r\n".$pozycjaJSON."\r\n";
   $fp = fopen($userFile, "w");
   fputs($fp, $noweDane);
   fclose($fp);
   $_SESSION['w_koszyku'] = 1;
   if (isset($_SESSION['shoppingCart_response'])){
    unset($_SESSION['shoppingCart_response']);
}
   Header('Location:index.php');
} else {
    $noweDane = $pozycjaJSON;
    $fp = fopen($userFile, "w+t");
    fputs($fp, $noweDane);
    fclose($fp);
    $_SESSION['w_koszyku'] = 1;
    if (isset($_SESSION['shoppingCart_response'])){
        unset($_SESSION['shoppingCart_response']);
    }
   Header('Location:index.php');
};
?>
