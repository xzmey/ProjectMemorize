<?php
require $_SERVER['DOCUMENT_ROOT'].'/application/db.php';
session_start() ;

 $text=$_POST['text'];

$paragraph = $text;
$contents = explode(' ', $paragraph);
$i = 0;
$span_content = '';
foreach ($contents as $c){
    $span_content .= "<span> $c </span> ";
    $i++;
}
$result = $span_content;
echo $result;