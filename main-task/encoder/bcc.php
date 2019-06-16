<?php
function getBit($data, $parity){
    $name = $parity==1?"Odd":"Even";    
    echo "<h1 style='margin-top:20px;'>BCC $name</h1>";
    echo "Data : ";
    echo $data;
    echo "<br>";
    $ret = "";
    
    $bcc = array();
    for($b = 0; $b < 8; $b++){
        $bcc[$b] = 0;
    }
    $data_arr = str_split($data);
    $i = 0;
    echo "<table style=\"border-spacing:0px !important;\"><tr>";
    foreach($data_arr as $n){    
        $dec = ord($n);    
        $bin = decbin($dec);
        
        $j = 0;
        echo "<td style=\"padding:0px !important;\">";
        if($dec <= 63){
            echo "0";
            $ret .= "0";
        }
        $k = 0;
        foreach(str_split($bin) as $a){
            if($a == 1){
                $j++;            
                $bcc[$k] += 1;
            }
            echo $a;
            $ret .= $a;
            $k++;
        }
        echo "<text style=\"color:red;\">";
        if($j%2 == $parity){
            echo "0";
            $ret .= "0";
        }
        else {
            echo "1";
            $bcc[7] += 1;
            $ret .= "1";
        }           
        echo "</text>";        
        echo "</td>"; 
        $i++;
    }        
    echo "<td><text style=\"color:blue;\">"; 
    foreach($bcc as $b){        
        if($b%2 == $parity){
            echo "0";
            $ret .= "0";
        }
        else {
            echo "1";            
            $ret .= "1";
        }  
    }
    echo "</text></td>"; 
    echo "</tr><tr>";
    foreach($data_arr as $n){
        echo "<td style=\"text-align:center;padding:0px !important;\">$n</td>";
    }
    echo "</tr>";
    echo "</table>";  
    return $ret;      
}
?>