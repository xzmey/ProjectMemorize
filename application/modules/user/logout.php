<?php
// выход unset - удаляет переменную logged_user
  require $_SERVER['DOCUMENT_ROOT'].'/application/db.php';
  unset($_SESSION['logged_user']);
  header('Location: /');

?>

