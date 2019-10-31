<?php
session_start();
if (!isset($_SESSION['user'])){
    echo "<script>alert('By edytować profil musisz być zalogowany')</script>";
    echo "<script>window.location.href = 'profile.php';</script>";
}
$stareHaslo = $_POST['oldPassword'];
$noweHaslo = $_POST['newPassword'];
if (strlen($noweHaslo)<6 || strlen($noweHaslo)>20){
    echo "<script>alert('Hasło musi mieć od 6 do 20 znaków')</script>";
    echo "<script>window.location.href = 'profile.php';</script>";
}

echo $stareHaslo."<br/>";
echo $noweHaslo."<br/>";

$noweHaslo = password_hash($noweHaslo, PASSWORD_DEFAULT);

echo $noweHaslo;

    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    $email = $_SESSION['user'];
    $email = htmlentities($email, ENT_QUOTES, "UTF-8");

    $sql = sprintf("SELECT * FROM klienci WHERE email='%s'", mysqli_real_escape_string($polaczenie,$email));
        if ($rezultat = @$polaczenie->query($sql)){
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0) {
                $wiersz = $rezultat->fetch_assoc();
                if(password_verify($stareHaslo, $wiersz['haslo'])){
                    $rezultat->close();
                    $sql2 = sprintf("UPDATE `klienci` SET `haslo`='".$noweHaslo."' WHERE email='%s'", mysqli_real_escape_string($polaczenie,$email));
                        if($update = @$polaczenie->query($sql2)){
                        echo "<script>alert('Baza danych została zaktualizowana')</script>";
                        echo "<script>window.location.href = 'profile.php';</script>";
                        } else {
                            echo "<script>alert('Błąd łączenia z bazą danych!')</script>";
                            echo "<script>window.location.href = 'profile.php';</script>";
                        }
                } else {
                    echo "<script>alert('Nieprawidłowe hasło!')</script>";
                    echo "<script>window.location.href = 'profile.php';</script>";
                }
            } else {
                $_SESSION['e_password'] = "<p class='nopass'>Nieprawidłowy login lub hasło!</p>";
                header('Location: zaloguj.php');
            }
} else {
    echo "<script>alert('Błąd łączenia z bazą danych!')</script>";
    echo "<script>window.location.href = 'profile.php';</script>";
}

?>