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
        if(isset($_SESSION['shoppingCart_response'])){
            unset($_SESSION['shoppingCart_response']);
        };
        $_SESSION['step']++;
        header('Location: shoppingCart.php');
    } else {
        $_SESSION['shoppingCart_response'] = "Musisz uzupełnić koszyk by złożyć zamówienie";
        header('Location: shoppingCart.php');
    }
    break;
    case 2:
    if(isset($_GET['payment'])){
        if(isset($_SESSION['shoppingCart_response'])){
            unset($_SESSION['shoppingCart_response']);
        };
    $_SESSION['payment'] = $_GET['payment'];
    }
    if(isset($_SESSION['payment'])){
        if(isset($_SESSION['shoppingCart_response'])){
            unset($_SESSION['shoppingCart_response']);
        };
        $_SESSION['step']++;
        header('Location: shoppingCart.php');
    } else {
        $_SESSION['shoppingCart_response'] = "Musisz wybrać metodę płatności by złożyć zamówienie";
        header('Location: shoppingCart.php');
    }
    break;
    case 3:
    if(isset($_GET['city']) && isset($_GET['adress']) && isset($_GET['phone']) && isset($_GET['postcode'])){
        $delivery['city'] = $_GET['city'];
        $delivery['adress'] = $_GET['adress'];
        $delivery['postcode'] = $_GET['postcode'];
        $delivery['phone'] = $_GET['phone'];
        $_SESSION['delivery'] = $delivery;
        $_SESSION['step']++;
        $_SESSION['adress_data'] = $_SESSION['delivery'];
        if(isset($_SESSION['shoppingCart_response'])){
            unset($_SESSION['shoppingCart_response']);
        };
        /*foreach($_SESSION['delivery']as $item => $value){
            echo $item.": ".$value."<br/>";
        }*/
        header('Location: shoppingCart.php');
    } else {
        $_SESSION['shoppingCart_response'] = "Musisz potwierdzić wszystkie dane teleadresowe by złożyć zamówienie";
        header('Location: shoppingCart.php');
    }
    break;
    case 4:
    if($_SESSION['acceptation'] == 1){
        if(isset($_SESSION['shoppingCart_response'])){
            unset($_SESSION['shoppingCart_response']);
        };
        $_SESSION['step']++;
        header('Location: shoppingCart.php');
    } else {
        $_SESSION['shoppingCart_response'] = "Proszę potwierdzić złożenie zamówienia";
        header('Location: shoppingCart.php');
    }
    break;
    case 5:
    $_SESSION['shoppingCart_response'] = "Dziękujemy za złożenie zamówienia";
    $_SESSION['step'] = 0;
    header('Location: shoppingCart.php');
    break;
    default:
    $_SESSION['shoppingCart_response'] = "Wystąpił nieoczekiwany błąd";
    header('Location: shoppingCart.php');
    break;
}
?>