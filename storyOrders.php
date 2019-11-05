<?php
if ((isset($_SESSION['user']))){

    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0) {
        echo "Error: ".$polaczenie->connect_errno;
    } else { 
        $email = $_SESSION['user'];
        $email = htmlentities($email, ENT_QUOTES, "UTF-8");
        $polaczenie -> query("SET NAMES 'utf8'");
        $sql = sprintf("SELECT idklienta FROM klienci WHERE email='%s'", mysqli_real_escape_string($polaczenie,$email));
        if ($rezultat = @$polaczenie->query($sql)){
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0) {
                $wiersz = $rezultat->fetch_assoc();
                $_SESSION['id'] = $wiersz['idklienta'];
                $id = $_SESSION['id'];
                $rezultat->close();
                $sql2 = sprintf("SELECT * FROM zamowienia WHERE idklienta='%s'", mysqli_real_escape_string($polaczenie,$id));
                if ($rezultat2 = @$polaczenie->query($sql2)){
                    $ile_zamowien2 = $rezultat2->num_rows;
                    if($ile_zamowien2>0){
                        if(isset($_SESSION['orders'])){
                            unset($_SESSION['orders']);
                        }
                        $i2 = 0;
                        echo "<table class='orders__table'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>L.P.</th>";
                        echo "<th>Data</th>";
                        echo "<th>Nr. zamówienia</th>";
                        echo "<th>Autor</th>";
                        echo "<th>Produkt</th>";
                        echo "<th>Cena</th>";
                        echo "</thead>";
                        echo "<tbody>";                     
                        while ($wiersz2 = $rezultat2->fetch_object()) {
                            $realI = $i2 + 1;
                            echo "<tr>";
                            echo "<td>$realI</td>";
                            echo "<td>$wiersz2->data</td>";
                            echo "<td>$wiersz2->idzamowienia</td>";
                            $idksiazki = $wiersz2->idksiazki;
                            $sql3 = sprintf("SELECT * FROM ksiazki WHERE idksiazki='%s'", mysqli_real_escape_string($polaczenie,$idksiazki));
                            if($rezultat3 = @$polaczenie->query($sql3)){
                                $ile_zamowien3 = $rezultat3->num_rows;
                                if($ile_zamowien3>0){
                                    $i3 = 0;
                                    while ($wiersz3 = $rezultat3->fetch_object()){
                                        echo"<td>".$wiersz3->imieautora." ". $wiersz3->nazwiskoautora."</td>";
                                        echo "<td>$wiersz3->tytul</td>";
                                        echo "<td>".$wiersz3->cena." zł</td>";
                                        echo "</tr>";
                                        $i3++;
                                        if($i3 >= $ile_zamowien3){
                                            break;
                                        }
                                        $rezultat3->close();
                                    }
                                } 
                            } else {
                                echo 'Problem z połączeniem. Nie można znaleźć książki o podanym id.';
                            }
                            $i2++;
                            if($i2 >= $ile_zamowien2){
                                break;
                            }
                        } 
                        echo"</tbody></table>";
                        $rezultat2->close();
                    } 
                } else {
                    echo 'Problem z połączeniem. Nie można znaleźć zamówienia dla obecnego użytkownika.';
                }
            } else {
                echo 'Problem z połączeniem. Nie można znaleźć użytkownika.';
            }
        }
    }
}
else {
    echo "By korzystać z historii zamówień musisz być zalogowany";
}
