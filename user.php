<div class="user">
<div class="user__header">
  <span class="hook" id="userHook"></span>
  <h2 class="user__title"><?php echo $_SESSION['imie']." ".$_SESSION['nazwisko']; ?></h2>
  <img class="user__avatar" src="<?php include('avatar.php'); ?>" >
</div>
<ul class="user__options">
<a href="story.php"><li class="user__option">Historia zamówień
</li></a>
<a href="order.php"><li class="user__option">Śledź zamówienie
</li></a>
<a href="profile.php"><li class="user__option">Edytuj profil
</li></a>
<a href="contact.php"><li class="user__option">Kontakt
</li></a>
<a href="logout.php"><li class="user__option">Wyloguj
</li></a>
</ul>
    </div>