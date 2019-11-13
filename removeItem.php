<?php
session_start();
$userMail = $_SESSION['user'];
$prawieUser = explode("@",$userMail);
$user = $prawieUser[0];
$userFile = "orders/".$user.".json";
$a = $_GET['autor'];
$t = $_GET['tytul'];
$i = $_GET['ilosc'];
$_SESSION['ilosc_'.$t]--;
class pozycja {
    public $autor;
    public $tytul;
    function pokaz(){
        echo $this->autor."<br/>";
        echo $this->tytul."<br/>";
    }
}
$pozycja = new pozycja();
$pozycja->autor = $a;
$pozycja->tytul = $t;
$pozycja->pokaz();
$pozycjaJSON = json_encode($pozycja);
echo $pozycjaJSON."<br/>";
// wczytanie starych danych
// stworzenie nowych danych
if(file_exists($userFile)){
   $fp = fopen($userFile, "rt");
   $stareDane = fread($fp, filesize($userFile));
   $stareDane = explode("/", $stareDane);
   $num=0;
   $rem = $i;
   $hit=0;
   $staraIlosc=0;
   foreach($stareDane as $linia){
    $prawda = strstr($linia, $pozycjaJSON);
     if($prawda == true){
         $staraIlosc++;
     }
    }
     $rem = $staraIlosc - $rem;
     $noweDane = "";
   foreach($stareDane as $linia){
      $prawda = strstr($linia, $pozycjaJSON);
       if(($prawda == true) && ($rem>0)){
           $hit++;
           $linia = "";
           $rem--;
           $num++;
       } else {
       if (strlen($linia)>10){
       $noweDane .= $linia."/\r\n";
       $num++;
       } else {
       $noweDane .= "";
       $num++;
    }
    }
}
   echo "<br><br>!!!".$noweDane;
   fclose($fp);
   $fp = fopen($userFile, "w");
   fwrite($fp, $noweDane);
   fclose($fp);
   //Header("Location:shoppingCart.php");
}
?>