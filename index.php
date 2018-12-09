<?php
  require "db.php";
?>

<?php if ( isset($_SESSION['logged_user']) ) : ?>
 Авторизован!
 Привет, <?php echo $_SESSION['logged_user']->login; ?>!
 <hr>
 <a href="logout.php">Выйти</a><br>
 <a href="upload.php">Загрузить текст</a>

<?php else : ?>
 Вы не авторизованы! <br>
 <a href="login.php">Авторизация</a><br>
 <a href="signup.php">Регистрация</a>
<?php endif;
?>




