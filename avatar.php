<?php
if (isset($_SESSION['user'])){
    require_once "connect.php";
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if($polaczenie->connect_errno!=0) {
        echo "Error: ".$polaczenie->connect_error;
    } else {
        $sql = 'SELECT Avatar FROM klienci WHERE email="'.$_SESSION['user'].'"';
        if ($rezultat = @$polaczenie->query($sql)){
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0) {
                $wiersz = $rezultat->fetch_assoc();
                $_SESSION['avatar'] = $wiersz['Avatar'] ;
                echo $_SESSION['avatar'];
                $rezultat->close();
                } else {     
                $_SESSION['avatar'] = "błąd połączenia";
            };
        } else {
            echo "brak userow";
            $polaczenie->close();
        };
    }
    $polaczenie->close();
}
?>