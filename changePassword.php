<?php
if (!isset($_SESSION['user'])){
    echo "<script>alert('By edytować profil musisz być zalogowany')</script>";
    Header("Location: index.php");
}
foreach($_POST as $item => $value) echo $item."=>".$value."<br />";

?>