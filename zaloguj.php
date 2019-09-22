<?php

require ("head.php")
?>

<link rel="stylesheet" href="./dist/<?php

$filename = basename(__FILE__);
echo substr($filename, 0, -4);

?>.bundle.css" />
<title>Stronnica - <?php

$filename = basename(__FILE__);
echo substr($filename, 0, -4);

?>
</title>
</head>
<body>
    <main class="mainHeader">
<?php
include("nav.php");
?>
<aside class="aside">
<form class="login" action="login.php" method="post">
<header class="login__header">
<h2>Zaloguj się</h2>
<p>I w pełni korzystaj z naszych usług</p>
</header>
<label class="login__label" for="email">Adres e-mail:</label>
<input class="login__input"type="email" name="email" id="email" />
<label class="login__label" for="password">Hasło:</label>
<input class="login__input" type="password" id="password" name="password" />
<?php 
if (!isset($_SESSION['user'])){
  if (isset($_SESSION['e_password'])){
    echo $_SESSION['e_password'];
  }
}
?>
<input type="submit" id="submit" value="Zaloguj" class="login__button">

</form>

</aside>

</main>
<?php

require("footer.php")

?>
  <script src="./dist/<?php
    $filename = basename(__FILE__);
    echo substr($filename, 0, -4);
    ?>.bundle.js"></script>
</body>
