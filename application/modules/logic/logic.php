<?php
require $_SERVER['DOCUMENT_ROOT'].'/application/db.php';
session_start() ;

$text=$_POST['text'];
$text = preg_replace('~(\S+)~', '<span>$1</span>', $text);

echo  nl2br($text);

