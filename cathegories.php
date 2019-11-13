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

<body>
<main class="mainHeader">
<?php

include("nav.php")

?>
<div class="searchTitle">
    <h1 class="searchTitle__text">Kategorie</h1>
</div>
<div class="categories">
  <h2 class="categories__title">W naszej ofercie znajdziesz książki z następujących kategorii</h2>
  <div class="categories__box">
    <div class="categories__item">
      <h4 class="category__name">Informatyka</h4>
      <ul class="category__list category__list--it">
<?php
 require_once "connect.php";

 $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

 if($polaczenie->connect_errno!=0) {
     echo "Error: ".$polaczenie->connect_errno;
 }
 else {
    $polaczenie -> query("SET NAMES 'utf8'");
     $sql = "SELECT * FROM ksiazki WHERE gatunek='Informatyka' ORDER BY `nazwiskoautora`";
     if ($rezultat = @$polaczenie->query($sql)){
         $ile_ksiazek = $rezultat->num_rows;
         if($ile_ksiazek>0) {
             while ($wiersz = $rezultat->fetch_object()) {
                 echo "<li class='category__result'>".$wiersz->imieautora." ".$wiersz->nazwiskoautora."</li>";
             }
             $rezultat->close();
                 } else {
         echo "nie znaleziono książek";
         $rezultat->close();
     }
         } else {
             echo"<p class='nopass'> Błąd połączenia 2</p>";
             $polaczenie->close();
         }
     }
?>
</ul>
    </div>
    <div class="categories__item">
      <h4 class="category__name">Matematyka</h4>
      <ul class="category__list category__list--math">
<?php
if($polaczenie->connect_errno!=0) {
  echo "Error: ".$polaczenie->connect_errno;
}
else {
    $polaczenie -> query("SET NAMES 'utf8'");
  $sql = "SELECT * FROM ksiazki WHERE gatunek='Matematyka' ORDER BY `nazwiskoautora`";
  if ($rezultat = @$polaczenie->query($sql)){
      $ile_ksiazek = $rezultat->num_rows;
      if($ile_ksiazek>0) {
          while ($wiersz = $rezultat->fetch_object()) {
              echo "<li class='category__result'>".$wiersz->imieautora." ".$wiersz->nazwiskoautora."</li>";
          }
          $rezultat->close();
              } else {
      echo "nie znaleziono książek";
      $rezultat->close();
  }
      } else {
          echo"<p class='nopass'> Błąd połączenia 2</p>";
          $polaczenie->close();
      }
  }
?>
</ul>
    </div>
    <div class="categories__item">
      <h4 class="category__name">Fizyka</h4>
      <ul class="category__list category__list--phys">
<?php
if($polaczenie->connect_errno!=0) {
  echo "Error: ".$polaczenie->connect_errno;
}
else {
    $polaczenie -> query("SET NAMES 'utf8'");
  $sql = "SELECT * FROM ksiazki WHERE gatunek='Fizyka' ORDER BY `nazwiskoautora`";
  if ($rezultat = @$polaczenie->query($sql)){
      $ile_ksiazek = $rezultat->num_rows;
      if($ile_ksiazek>0) {
          while ($wiersz = $rezultat->fetch_object()) {
              echo "<li class='category__result'>".$wiersz->imieautora." ".$wiersz->nazwiskoautora."</li>";
          }
          $rezultat->close();
              } else {
      echo "nie znaleziono książek";
      $rezultat->close();
  }
      } else {
          echo"<p class='nopass'> Błąd połączenia 2</p>";
          $polaczenie->close();
      }
  }

?>
</ul>
    </div>
    <div class="categories__item">
      <h4 class="category__name">Inżynieria</h4>
      <ul class="category__list category__list--eng">
<?php
if($polaczenie->connect_errno!=0) {
  echo "Error: ".$polaczenie->connect_errno;
}
else {
    $polaczenie -> query("SET NAMES 'utf8'");
  $sql = "SELECT * FROM ksiazki WHERE gatunek='Inzynieria' ORDER BY `nazwiskoautora`";
  if ($rezultat = @$polaczenie->query($sql)){
      $ile_ksiazek = $rezultat->num_rows;
      if($ile_ksiazek>0) {
          while ($wiersz = $rezultat->fetch_object()) {
              echo "<li class='category__result'>".$wiersz->imieautora." ".$wiersz->nazwiskoautora."</li>";
          }
          $rezultat->close();
              } else {
      echo "nie znaleziono książek";
      $rezultat->close();
  }
      } else {
          echo"<p class='nopass'> Błąd połączenia 2</p>";
          $polaczenie->close();
      }
  }
?>
</ul>
</div>
    </div>
</div>
</main>
<?php

require("footer.php")

?>
  <script src="./dist/<?php
    $filename = basename(__FILE__);
    echo substr($filename, 0, -4);
    ?>.bundle.js"></script>
</body>