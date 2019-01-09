<?php
require $_SERVER['DOCUMENT_ROOT'].'/application/db.php';
session_start() ;

$text=$_POST['text'];

$strings = explode('<br', $text);
$length = count($strings);
for ($i=0; $i < $length; $i++) {
    $finString = trim($strings[$i], "/> ");
    $words = explode(' ', $finString);
    foreach ($words as $c){
        echo "<span>$c </span> ";
    };
    echo "<br>";
};