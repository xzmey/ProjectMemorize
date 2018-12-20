<?php
// Вывод содержимого загруженного файла
require $_SERVER['DOCUMENT_ROOT'].'/application/db.php';
$dir = '/uploads';
//Read
$files = R::find('files',  "`user_id`= ?", array($_SESSION['logged_user']->id));

foreach( $files as $file)
{
    //pathinfo($path, PATHINFO_FILENAME) - убрал расширение .txt чтобы красивей смотрелось
    echo 'Имя файла: ' . pathinfo($file->filename,PATHINFO_FILENAME).'<br />  ';
    echo '<a href=  '.($dir."/".$file->name).'>Открыть текст</a>';
    echo '<br /><hr />';
}
