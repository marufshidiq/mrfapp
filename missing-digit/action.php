<?php

$raw = $_POST['data'];

$oddData = array();
$evenData = array();

$data_array = str_split($raw);

$i = 1;
$xNum = 0;
$xPos = 0;

foreach($data_array as $data){
    if($i%2 == 1){
        array_push($oddData,$data);
    }
    else {
        array_push($evenData,$data);
    }
    $i++;
}

$oddSum = 0;
$oddFiveSum = 0;
$evenSum = 0;

foreach($oddData as $data){
    if($data == "x"){
        $xNum++;
        $xPos = 1;
    }
    else{
        $oddSum += $data;
    }
    echo $data."-";
}
foreach($oddData as $data){
    if($data >= 5){
        $oddFiveSum += $data;
    }    
}
echo "<br>";
foreach($evenData as $data){
    if($data == "x"){
        $xNum++;
        $xPos = 0;
    }
    else{
        $evenSum += $data;
    }
    echo $data."-";
}
echo "<br>";

for($i = 0; $i<10; $i++){
    $oddSumLocal = $oddSum;
    $evenSumLocal = $evenSum;
    if($xPos == 0){
        $oddSumLocal += $i;
    }
    else if($xPos == 1){
        $evenSumLocal += $i;
    }
    $ans = ((2*$oddSumLocal)+$oddFiveSum+$evenSumLocal);
    echo $i."-".$ans."<br>";    
}

?>