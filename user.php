<div class="user">
<div class="user__header">
  <span class="hook" id="userHook"><img class="hook__img" src="./src/img/arrow.png"/></span>
  <h2 class="user__title"><?php echo $_SESSION['imie']." ".$_SESSION['nazwisko']; ?></h2>
  <img class="user__avatar" src="./src/klienci/<?php include('avatar.php'); ?>" />
</div>
<ul class="user__options">
<a href="story.php"><li class="user__option">Historia zamówień
</li></a>
<a href="order.php"><li class="user__option">Śledź zamówienie
</li></a>
<a href="profile.php"><li class="user__option">Edytuj profil
</li></a>
<a href="logout.php"><li class="user__option">Wyloguj
</li></a>
</ul>
    </div>