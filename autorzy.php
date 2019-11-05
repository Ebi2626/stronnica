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
    <h1 class="searchTitle__text"><?php
    $filename = basename(__FILE__);
    echo substr($filename, 0, -4);
    ?>
</h1>
</div>
<div class="authors">
<h3 class="authors__title">W naszej księgarni znajdziesz następujących autorów:</h3>
<ul class="authors__list">
<?php
    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0) {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else {
        $polaczenie -> query("SET NAMES 'utf8'");
        $sql = "SELECT * FROM ksiazki ORDER BY `nazwiskoautora`";
        if ($rezultat = @$polaczenie->query($sql)){
            $ile_ksiazek = $rezultat->num_rows;
            if($ile_ksiazek>0) {
                while ($wiersz = $rezultat->fetch_object()) {
                    echo "<li class='authors__item'>".$wiersz->imieautora." ".$wiersz->nazwiskoautora."</li>";
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