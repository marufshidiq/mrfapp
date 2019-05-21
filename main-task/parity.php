<?php
    function getBit($data, $parity){
        $name = $parity==1?"Odd":"Even";
        echo "<h3>Parity $name</h3>";
        echo "Data : ";
        echo $data;
        echo "<br>";

        $data_arr = str_split($data);
        echo "<table style=\"border-spacing:0px !important;\"><tr>";
        foreach($data_arr as $n){    
            $dec = ord($n);    
            $bin = decbin($dec);
            
            $i = 0;
            echo "<td style=\"padding:0px !important;\">";
            if($dec <= 63){
                echo "0";
            }
            foreach(str_split($bin) as $a){
                if($a == 1)$i++;
                echo $a;
            }
            echo "<text style=\"color:red;\">";
            if($i%2 == $parity){
                echo "0";
            }
            else {
                echo "1";
            }           
            echo "</text></td>"; 
        }        
        echo "</tr><tr>";
        foreach($data_arr as $n){
            echo "<td style=\"text-align:center;padding:0px !important;\">$n</td>";
        }
        echo "</tr>";
        echo "</table>";
    }
?>