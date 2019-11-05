<?php
$userMail = $_SESSION['user'];
$prawieUser = explode("@",$userMail);
$user = $prawieUser[0];
$userFile = "orders/".$user.".json";
?>

<form class="fullBucket" action="step.php" method="post">
<h2 class="fullBucket__title"><?php switch($_SESSION['step']){
    case 1:
    echo "Twoje zakupy";
    break;
    case 2:
    echo "Wybór metody płatności";
    break;
    case 3: 
    echo "Potwierdzenie danych teleadresowych";
    break;
    case 4:
    echo "Złożenie zamówienia";
    break;
    default:
    echo "Twoje zakupy";
    break;
}?><br/>
<?php if(isset($_SESSION['bucket_response'])){echo $_SESSION['bucket_response'];}?></h2>
<?php
//sprawdzanie stepów i wyświetlanie odpowiedniego 
// STEP I - wybór produktów
$step = $_SESSION['step'];
// zmienia się gdy istinieje plik z zamówieniem i użytkownik kliknie dalej
if(file_exists($userFile) && ($step == 1)){
    echo '<table class="fullBucket__table" id="table">';
    echo '<thead>';
    echo '<tr class="fullBucket__row">';
    echo '<th>Produkt</th>';
    echo '<th>Cena</th>';
    echo '<th>Ilość</th>';
    echo '<th>Wartość</th>';
    echo '<th> </th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $plik = fopen($userFile,'r');
    $tablica = file_get_contents($userFile);
    $tablica = explode("/", $tablica);
    $n = 0;
    $nmax = (count($tablica) - 1);
    $_SESSION['iloscIteracji'] = $nmax;
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
        <!-- KOMÓRKI POBIERAJĄCE CENE Z DB -->
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
                echo "<td name='".$n."'></td>";
                echo "<td></td>";
                echo "<td><a href='removeItem.php' class='remove__item'>X</a></td>";
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
echo '</tbody>';
echo '<tfoot>';
echo '<tr class="fullBucket__summary">';
echo '<th class="left deleteAll" id="deleteAll">Usuń wszystkie</th>';
echo '</tr>';
echo '<tr class="fullBucket__summary">';
echo '<th class="left">Koszt dostawy:</th><td id="deliver"></td><td>1</td><td id="deliver2"></td>';
echo '</tr>';
echo '<tr class="fullBucket__summary">';
echo '<th class="left">Kwota do zapłaty:</th><td id="result"></td>';
echo '</tr>';
echo '</tfoot>';
echo '</table>';
echo '<input type="submit" class="button" name="step2" id="step2" value="Dalej" />';
echo '</form>';
// STEP II - wybór płatności
// następuje gdy użytkownik kliknie dalej i ma jakieś zakupy w koszyku
} elseif ($step == 2) {
    if(isset($_POST['payment'])){
        echo $_POST['payment'];
    }
    $str3 = <<<END
    <div class="fullBucket__div">
    <h3 class="fullBucket__title--payment>Wybierz metodę płatności</h3>
    <form class="fullBucket__payment" action="step.php" method="post">
    <fieldset>
    <legend>Metoda płatności</legend>
    <input type="radio" name="payment" value="bank" />Przelew
    <input type="radio" name="payment" value="blik" />Blik
    <input type="radio" name="payment" value="cash" />Za pobraniem
    </fieldset>
    <input type="submit" class="button" name="step3" id="step3" value="Dalej" />
    </form>
END;
echo($str3);
// STEP III - potwierdzenie danych teleadresowych
// następuje gdy użytkownik kliknie dalej i wybrał metodę płatności
} elseif ($step == 3) {
            echo '<div class="fullBucket__div">';
            echo '<h3 class="fullBucket__title--delivery>Potwierdź dane teleadresowe</h3>';
            echo '<form class="fullBucket__delivery" action="step.php" method="post">';
            echo '<fieldset>';
            echo '<legend>Dane teleadresowe</legend>';
            echo '<input type="text" name="city" value="'.$_SESSION['miasto'].'" />';
            echo '<input type="text" name="adress" value="'.$_SESSION['adres'].'" />';
            echo '<input type="text" name="postcode" value="" />';
            echo '<input type="nubmer" name="phone" value="" />';
            echo '</fieldset>';
            echo '<input type="submit" class="button" name="step3" id="step3" value="Dalej" />';
            echo '</form>';
// STEP IV - potwierdzenie danych zamówienia
// następuje gdy użytkownik kliknie dalej i potwierdził dane teleadresowe
} elseif ($step == 4) {
    $plik = fopen($userFile,'r');
    $tablica = file_get_contents($userFile);
    $tablica = explode("/", $tablica);
    $n = 0;
    echo '<div class="fullBucket__div">';
    echo '<h3 class="fullBucket__title--order">Złóż zamówienie</h3>';
    echo '<div class="fullBucket__order">';
    echo '<h4 class="fullBucket__order--title">Zamawiane produkty</h4>';
    echo '<table class="fullBucket__order--table" id="orderTable">';
    echo '<thead>';
    echo '<tr class="fullBucket__row">';
    echo '<th>L.P.</th>';
    echo '<th>Produkt</th>';
    echo '<th>Cena</th>';
    echo '<th>Ilość</th>';
    echo '<th>Wartość</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>'; 
    $nmax = (count($tablica) - 1);
    while($n < $nmax){
    $elementTablicy = $tablica[$n];
    $elementTablicy = json_decode($elementTablicy, true);
    $title = $elementTablicy['tytul'];
    $autor = $elementTablicy['autor'];
    $imieiNazwiskoAutora = explode(" ", $autor);
    $imieAutora = $imieiNazwiskoAutora[0];
    $nazwiskoAutora = $imieiNazwiskoAutora[1];
    echo '<tr class="fullBucket__row">';
    echo '<td>'.$n.'</td>';
    echo '<td>'.$title.'<br/>'.$autor.'</td>';   
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
                $cena = $wiersz->cena;                
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
    echo "<td>".$_SESSION['produkty'][$n]."</td>";
    echo "<td>".$_SESSION['produkty'][$n]*$cena."</td>";
    echo "</tr>";
    $n++;
    }
    echo '<form class="fullBucket__acceptation" action="step.php" method="post">';
    echo '<label for="acceptation">Potwierdzam poprawność danych i składam zamówienie</label>';
    echo '<input type="checkbox" name="acceptation" value="0 />';
    echo '<input type="submit" class="button" name="step3" id="step3" value="Dalej" />';
    echo '<form/>';
} elseif ($step == 5) {
    echo "Brak danych do wyswietlenia4";
} else{
    echo "Brak danych do wyswietlenia5";
};

?>
