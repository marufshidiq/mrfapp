<?php

$data = $_POST['data'];

$text = trim($data);
$textAr = explode("\n", $text);
$textAr = array_filter($textAr, 'trim'); // remove any extra \r characters left behind

foreach ($textAr as $line) {
    $char = chr(bindec($line));
    echo $char."<br/>";
}
 
?>