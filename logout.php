<?php
// выход unset - удаляет переменную logged_user
  require "db.php";
  unset($_SESSION['logged_user']);
  header('Location: /');

?>

