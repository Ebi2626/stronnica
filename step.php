<?php
session_start();

if (!(isset($_SESSION['user']))){
    echo "<script>alert('By korzystać z koszyka musisz być zalogowany')</script>";
    echo "window.location.href = 'index.php";
}
$userMail = $_SESSION['user'];
$prawieUser = explode("@",$userMail);
$user = $prawieUser[0];
$userFile = "orders/".$user.".json";
$userFileLength = count(file($userFile));

switch($_SESSION['step']){
    case 1:
    if(file_exists($userFile) && $userFileLength > 0){
        if(isset($_SESSION['bucket_response'])){
            unset($_SESSION['bucket_response']);
        };
        for($i = 0; $i = $_SESSION['iloscIteracji']-3; $i++){
            $produkt.$i = $_POST[$i];
            $_SESSION['produkty'][$i] = $produkt.$i;
        }
        $_SESSION['step']++;
        header('Location: koszyk.php');
    } else {
        $_SESSION['bucket_response'] = "Musisz uzupełnić koszyk by złożyć zamówienie";
        header('Location: koszyk.php');
    }
    break;
    case 2:
    if(isset($_POST['payment'])){
        if(isset($_SESSION['bucket_response'])){
            unset($_SESSION['bucket_response']);
        };
    $_SESSION['payment'] = $_POST['payment'];
    }
    if(isset($_SESSION['payment'])){
        if(isset($_SESSION['bucket_response'])){
            unset($_SESSION['bucket_response']);
        };
        $_SESSION['step']++;
        header('Location: koszyk.php');
    } else {
        $_SESSION['bucket_response'] = "Musisz wybrać metodę płatności by złożyć zamówienie";
        header('Location: koszyk.php');
    }
    break;
    case 3:
    if(isset($_POST['city']) && isset($_POST['adress']) && isset($_POST['phone']) && isset($_POST['postcode'])){
        $delivery['city'] = $_POST['city']; 
        $delivery['adress'] = $_POST['adress']; 
        $delivery['postcode'] = $_POST['postcode']; 
        $delivery['phone'] = $_POST['phone']; 
        $_SESSION['delivery'] = $delivery;
        $_SESSION['step']++;
        if(isset($_SESSION['bucket_response'])){
            unset($_SESSION['bucket_response']);
        };
        /*foreach($_SESSION['delivery']as $item => $value){
            echo $item.": ".$value."<br/>";
        }*/
        header('Location: koszyk.php');
    } else {
        $_SESSION['bucket_response'] = "Musisz potwierdzić wszystkie dane teleadresowe by złożyć zamówienie";
        header('Location: koszyk.php');
    }
    break;
    case 4:
    if($_SESSION['acceptation'] == 1){
        if(isset($_SESSION['bucket_response'])){
            unset($_SESSION['bucket_response']);
        };
        $_SESSION['step']++;
        header('Location: koszyk.php');
    } else {
        $_SESSION['bucket_response'] = "Proszę potwierdzić złożenie zamówienia";
        header('Location: koszyk.php');
    }
    break;
    case 5:
    $_SESSION['bucket_response'] = "Dziękujemy za złożenie zamówienia";
    $_SESSION['step'] = 0;
    header('Location: koszyk.php');
    break;
    default:
    $_SESSION['bucket_response'] = "Wystąpił nieoczekiwany błąd";
    header('Location: koszyk.php');
    break;
}
?>