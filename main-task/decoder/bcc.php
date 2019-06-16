<?php
    function getData($bit, $parity){
        $name = $parity==1?"Odd":"Even";
        echo "<h3>BCC $name</h3>";
        echo $bit;
        $bit_array = str_split($bit); // Merubah bit yang diterima ke dalam array

        // <Section> Validasi apakah jumlah bit diterima valid (kelipatan 8)
        $count = count($bit_array); // Mendapatkan jumlah bit yang diterima
        echo "<br>";
        echo $count;
        if($count%8 != 0){
            echo "<br>";
            echo "Jumlah bit tidak valid";
            return;
        }
        // </Section>

        // <Section> Validasi apakah ada karakter selain bit 0 dan 1        
        $other_bit = 0;
        foreach($bit_array as $b){
            if(!is_numeric($b)){
                $other_bit = 1;
            }
            if(($b != 0)&&($b != 1)){
                $other_bit = 1;
            }            
        }

        echo "<br>";
        if($other_bit == 1){
            echo "Ada data selain 0 dan 1";
            return;
        }
        // </Section>

        $buffer = array();
        $valid = true;
        for($i = 0; $i<8;$i++){
            $buffer[$i] = 0;
        }
        
        $data = 1;
        $len = $count/8;
        foreach(array_chunk($bit_array, 8) as $arr){            
            $ch = "";
            $i = 0;
            foreach($arr as $k => $a){
                if($a == 1){
                    $i++;
                    $buffer[$k] += 1;
                }
                if($k != 7) $ch .= $a;
                echo $a;
            }            
            if($data != $len){
                if($i%2 == $parity){
                    echo " $i $ch Sesuai ";
                    echo chr(bindec($ch));
                }
                else {
                    $valid = false;
                    echo " $i $ch Tidak sesuai";
                }
            }
            else {
                echo " Parity";
            }
            echo "</br>";
            $data++;
        }

        for($i = 0; $i<8;$i++){
            if($buffer[$i]%2 == $parity){
                echo "<text style=\"color:blue;\">";
            }
            else {
                $valid = false;
                echo "<text style=\"color:red;\">";
            }
            echo $buffer[$i];
            echo "</text>";
        }

        echo "</br>";
        echo "</br>";
        if($valid){
            echo "Data yang diterima valid";
        }
        else {
            echo "Data yang diterima tidak valid";
        }
    }
?>