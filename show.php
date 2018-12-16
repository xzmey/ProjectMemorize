<?php
require "db.php";

$dir    = 'uploads/';
$files1 = scandir($dir);

print_r($files1);

?>

<hr>

<?php
$dir = 'uploads/';
$catalog = opendir($dir);

while ($filename = readdir($catalog )) // перебираем наш каталог
{
        $filename = $dir."/".$filename;
        readfile($filename);
        echo '<br /><hr />';
}

closedir($catalog);

?>

