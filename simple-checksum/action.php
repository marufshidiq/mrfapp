<?php

$data = $_POST['data'];

$text = trim($data);
$textAr = explode("\n", $text);
$textAr = array_filter($textAr, 'trim'); // remove any extra \r characters left behind

$vertical = array();
$vertical[0] = 0;
$vertical[1] = 0;
$vertical[2] = 0;
$vertical[3] = 0;
$vertical[4] = 0;
$vertical[5] = 0;
$vertical[6] = 0;

foreach ($textAr as $line) {
    $data_array = str_split($line);
    $i = 0;
    $n = 0;
    foreach($data_array as $bit){        
        if($bit == 1){
            $i++;
            $vertical[$n]++;
        }
        $n++;
    }
    if($i%2 == 1){
        $cs = 1;
    }
    else {
        $cs = 0;
    }    
    echo $line."\t=>\t".$cs."<br/>";
}

foreach($vertical as $v){
    if($v%2 == 1){
        echo "1";
    }
    else {
        echo "0";
    } 
}

 
?>