<?php
require $_SERVER['DOCUMENT_ROOT'].'/application/db.php';
?>

<?php if ( isset($_SESSION['logged_user']) ) : ?>
 Авторизован!
 Привет, <?php echo $_SESSION['logged_user']->login;?>!
 <hr>
 <a href="/application/modules/user/logout.php">Выйти</a><br>
 <a href="/application/input/upload.html">Загрузить текст</a>
 <a href="/application/output/showfiles.php">Показать мои тексты</a>

<?php else : ?>
 Вы не авторизованы! <br>
 <a href="/application/modules/user/login.php">Авторизация</a><br>
 <a href="/application/modules/user/signup.php">Регистрация</a>
<?php endif;
?>





