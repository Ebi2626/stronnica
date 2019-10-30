<?php
session_start();
if (!(isset($_SESSION['user']))){
    echo "<script>alert('By edytować profil musisz być zalogowany')</script>";
    Header("Location: index.php");
}

if($_FILES['avatar']['error'] > 0){
    switch ($_FILES['avatar']['error'])
    {
      // jest większy niż domyślny maksymalny rozmiar,
      // podany w pliku konfiguracyjnym
      case 1: {echo '<script>alert("Rozmiar pliku jest zbyt duży.");</script>'; break;}

      // jest większy niż wartość pola formularza
      // MAX_FILE_SIZE
      case 2: {echo '<script>alert("Rozmiar pliku jest zbyt duży.");</script>'; break;}

      // plik nie został wysłany w całości
      case 3: {echo '<script>alert("Plik wysłany tylko częściowo.");</script>'; break;}

      // plik nie został wysłany
      case 4: {echo '<script>alert("Nie wysłano żadnego pliku.");</script>'; break;}

      // pozostałe błędy
      default: {echo '<script>alert("Nieznany błąd. Skontaktuj się z administratorem strony w celu wyjaśnienia.");</script>'; break;}
    }
    echo "<script>window.location.href = 'profile.php';</script>";
} else {
function zapisz_plik()
{
$user = explode('@',$_SESSION['user']);
$id = $_SESSION['id'];
$user = $user[0]."_".$id;
$typ = $_FILES['avatar']['type'];
if (preg_match('/jpeg/', $typ)){
    $rozszerzenie = ".jpg";
} elseif (preg_match('/png/', $typ)){
$rozszerzenie = ".png";
}
$lokalizacja = './src/klienci/'.$user.$rozszerzenie;

$nowyAvatar = $user.$rozszerzenie;

  if(is_uploaded_file($_FILES['avatar']['tmp_name']))
  {
      //echo 'Jest uploadnięty plik o nazwie '.$_FILES['avatar']['tmp_name'];
      echo "<script>alert('Avatar został poprawnie przesłany');</script>";
    if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $lokalizacja))
    {
        echo "<script>alert('Wystąpił błąd podczas aktualizacji. Spróbuj z mniejszym zdjęciem lub innym formatem.');</script>";
        echo "<script>window.location.href = 'profile.php';</script>";
        return false;
    }
  }
  else
  {
    echo 'problem: Możliwy atak podczas przesyłania pliku.';
	echo 'Plik nie został zapisany.';
    return false;
  }
  return true;
}

zapisz_plik();

require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if($polaczenie->connect_errno!=0) {
    echo "Error: ".$polaczenie->connect_errno;
}  else {
    $user = explode('@',$_SESSION['user']);
    $id = $_SESSION['id'];
    $user = $user[0]."_".$id;
    $typ = $_FILES['avatar']['type'];
    if (preg_match('/jpeg/', $typ)){
        $rozszerzenie = ".jpg";
    } elseif (preg_match('/png/', $typ)){
    $rozszerzenie = ".png";
    }
    $lokalizacja = './src/klienci/'.$user.$rozszerzenie;
    $nowyAvatar = $user.$rozszerzenie;



    $email = $_SESSION['user'];
                $update = sprintf("UPDATE `klienci` SET `Avatar`='".$nowyAvatar."' WHERE email='%s'", mysqli_real_escape_string($polaczenie, $email));
                if($zmien=$polaczenie->query($update)){
                    echo "<script>alert('Baza danych została zaktualizowana')</script>";
                    echo "<script>window.location.href = 'index.php';</script>";

                $polaczenie->close();
                echo "<script>window.location.href = 'index.php';</script>";
                } else {
                    $polaczenie->close();
                echo "<script>alert('Błąd podczas próby zmiany avatara')</script>";
                echo "<script>window.location.href = 'profile.php';</script>";
                }
                $polaczenie->close();
                echo "<script>window.location.href = 'profile.php';</script>";
            }
    $polaczenie->close();
        }
?>
