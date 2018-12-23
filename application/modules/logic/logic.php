<?php
require $_SERVER['DOCUMENT_ROOT'].'/application/db.php';
session_start() ;

 $text=$_POST['text'];
 echo $text;

 // если напишу var_dump($text) будет видно значение выбранного файла


?>
<p><span class="letter"><?php echo $text?></span></p>




