<?php
// Вывод содержимого загруженного файла
require $_SERVER['DOCUMENT_ROOT'].'/application/db.php';
session_start() ;
unset($_SESSION['userfiles']);

$dir = '/uploads';

//Read
$files = R::find('files',  "`user_id`= ?", array($_SESSION['logged_user']->id));

foreach( $files as $file)
{
    //в массив записываю элементы с именами как у файлов ,а в значение элементов сам текст
    //pathinfo($path, PATHINFO_FILENAME) - убрал расширение .txt чтобы красивей смотрелось
    $name= pathinfo($file->filename,PATHINFO_FILENAME);
    $names[]=pathinfo($file->filename,PATHINFO_FILENAME);
    $_SESSION['userfiles'][$name]['content']= (file_get_contents($_SERVER['DOCUMENT_ROOT'].$dir."/".$file->name));
}
if (!empty($names))
{
//link-ссылка на контент файла по имени
//content должен передаться на другую странциу по ссылке
//htmlspecialchars чтобы кавычки прочитались
    foreach ($names as $link)
    {
        $content = $_SESSION['userfiles'][$link]['content'];
        ?>
        <form method="post" action="/application/modules/logic/logic.php">
        <input type="hidden" name="text" value="<?php echo htmlspecialchars($content); ?>">
        <button type="Submit">Открыть текст-><?
            echo $link ?></button>
        </form><?php
    }

}
else
    echo '<div style="color: red;">Файлы не найдены!<br/>';

