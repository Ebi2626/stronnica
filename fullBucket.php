
<?php
$userMail = $_SESSION['user'];
$prawieUser = explode("@",$userMail);
$user = $prawieUser[0];
$userFile = "orders/".$user.".json";
?>

<form class="fullBucket" action="step2.php" method="post">
    <h2 class="fullBucket__title">Twoje zakupy</h2>
    <table class="fullBucket__table" id="table">
        <thead>
        <tr class="fullBucket__row">
            <th>Produkt</th>
            <th>Cena</th>
            <th>Ilość</th>
            <th>Wartość</th>
            <th> </th>
        </tr>
</thead>
<tbody>
<?php
if(file_exists($userFile)){
    $plik = fopen($userFile,'r'); 
    $tablica = file_get_contents($userFile);
    $tablica = explode("/", $tablica);
    $n = 0;
    $nmax = (count($tablica) - 1);
        while($n < $nmax){
        $elementTablicy = $tablica[$n];
        $elementTablicy = json_decode($elementTablicy, true);
        $title = $elementTablicy['tytul'];
        $autor = $elementTablicy['autor'];
        $imieiNazwiskoAutora = explode(" ", $autor);
        $imieAutora = $imieiNazwiskoAutora[0];
        $nazwiskoAutora = $imieiNazwiskoAutora[1];
        echo "<tr class='fullBucket__row'>";
        echo "<td>".$title."<br>".$autor."</td>";
        ?>
        <!-- KOMÓRKA POBIERAJĄCA CENE Z DB -->
        <?php
        require_once("connect.php");
        $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if($polaczenie->connect_errno) {
        echo "<td>Error: ".$polaczenie->connect_errno."</td>";
    }
    else {
        $polaczenie -> query("SET NAMES 'utf8'");
        $sql = "SELECT * FROM ksiazki WHERE tytul='".$title."' AND imieautora='".$imieAutora."' AND nazwiskoautora='".$nazwiskoAutora."'";
        if ($rezultat = @$polaczenie->query($sql)){
            $ile_ksiazek = $rezultat->num_rows;
            if($ile_ksiazek>0) {
                $wiersz = $rezultat->fetch_object();
                echo "<td>".$wiersz->cena."</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "</tr>";
                $rezultat->close();
                    } else {
            echo "nie znaleziono książek";
            $rezultat->close();
                     }
            } else {
                echo"<td class='nopass'>".$polaczenie->error."</td>";
                $polaczenie->close();
            }
        }

        $n++;
        }
} else {
    echo "Brak danych do wyswietlenia";
};
// Koniec komorki pobierającej dane
?>
            
</tbody>
            <tfoot>
            <tr class="fullBucket__summary">
    <th class="left deleteAll" id="deleteAll">Usuń wszystkie</th>
</tr>
                <tr class="fullBucket__summary">
                    <th class="left">Koszt dostawy:</th><td id="deliver"></td><td>1</td><td id="deliver2"></td>
</tr>
<tr class="fullBucket__summary">
<th class="left">Kwota do zapłaty:</th><td id="result"></td>
</tr>
</tfoot>
</table>
<input type="submit" class="button" name="step2" id="step2" value="Dalej" />
</form> 