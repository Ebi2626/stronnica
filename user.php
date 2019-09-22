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

<body>
<main class="mainHeader">
<?php

include("nav.php")

?>
<aside class="aside">
<form class="login">
<header class="login__header">
<h2>Zarejestruj się</h2>
<p>I w pełni korzystaj z naszych usług</p>
</header>
<label class="login__label" for="name">Imię i nazwisko:</label>
<input class="login__input" type="text" name="name" id="name" />
<label class="login__label" for="adres">Adres:</label>
<input class="login__input" type="text" name="adres" id="adres" />
<label class="login__label" for="email">Adres e-mail:</label>
<input class="login__input"type="email" name="email" id="email" />
<label class="login__label" for="password">Hasło:</label>
<input class="login__input" type="password" id="password" name="password" />
<input type="submit" id="submit" value="Zarejestruj" class="login__button">
</form>
</aside>

</main>
<main class="main">

<div class="main__content">

</div>
</main>
<?php

require("footer.php")

?>
  <script src="./dist/<?php
    $filename = basename(__FILE__);
    echo substr($filename, 0, -4);
    ?>.bundle.js"></script>
</body>