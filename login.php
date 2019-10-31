<?php

session_start();

if ((isset($_POST['email'])) && (isset($_POST['password']))) {
    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0) {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email = htmlentities($email, ENT_QUOTES, "UTF-8");
        $polaczenie -> query("SET NAMES 'utf8'");

        $sql = sprintf("SELECT * FROM klienci WHERE email='%s'", mysqli_real_escape_string($polaczenie,$email));
        if ($rezultat = @$polaczenie->query($sql)){
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0) {
                $wiersz = $rezultat->fetch_assoc();
                if(password_verify($password, $wiersz['haslo'])){
                    $_SESSION['imie'] = $wiersz['imie'];
                    $_SESSION['nazwisko'] = $wiersz['nazwisko'];
                    $_SESSION['miasto'] = $wiersz['miejscowosc'];
                    $_SESSION['adres'] = $wiersz['miejscowosc'];
                    $_SESSION['user'] = $wiersz['email'];
                    $_SESSION['id'] = $wiersz['idklienta'];
                    $_SESSION['pass'] = 'true';
                    $_SESSION['refreshing'] = 0;
                    if(isset($_SESSION['nopass'])){
                        unset($_SESSION['nopass']);
                    }
                    $rezultat->close();

                    header('Location: index.php');
                } else {
                    $_SESSION['e_password'] = "<p class='nopass'>Nieprawidłowe hasło!</p>";
                header('Location: zaloguj.php');
                    header('Location: zaloguj.php');
                }

            } else {
                $_SESSION['e_password'] = "<p class='nopass'>Nieprawidłowy login lub hasło!</p>";
                header('Location: zaloguj.php');
            }
        }
        $polaczenie->close();
    }
} else {
    $_SESSION['e_password'] = "<p class='nopass'>Nieprawidłowy login lub hasło!</p>";
    header('Location: zaloguj.php');
}
?>