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
    <h1 class="searchTitle__text">Książki</h1>
</div>
<div class="books">
<table class="booksTable">
<thead>
<tr>
<th>L.P</th>
<th>Imię</th>
<th>Nazwisko</th>
<th>Tytuł</th>
<th>Cena</th>
</tr>
</thead>
<tbody>
<?php
    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0) {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else {
        $sql = "SELECT * FROM ksiazki";
        if ($rezultat = @$polaczenie->query($sql)){
            $ile_ksiazek = $rezultat->num_rows;
            if($ile_ksiazek>0) {
                while ($wiersz = $rezultat->fetch_object()) {
                    echo "<tr>";
                    echo "<td>".$wiersz->idksiazki."</td>";
                    echo "<td>".$wiersz->imieautora."</td>";
                    echo "<td>".$wiersz->nazwiskoautora."</td>";
                    echo "<td>".$wiersz->tytul."</td>";
                    echo "<td>".$wiersz->cena." zł </td>";
                    echo "<td><img style='width: 20px; height: 20px;' src='./src/okladki/".$wiersz->Okladka."'/></td>";
                    echo "</tr>";
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
</tbody>
</table>
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