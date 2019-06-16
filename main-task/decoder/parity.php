<?php
    function getData($bit, $parity){
        $name = $parity==1?"Odd":"Even";
        echo "<h3>Parity $name</h3>";
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
        
        $valid = true;
        foreach(array_chunk($bit_array, 8) as $arr){
            $ch = "";
            $i = 0;
            foreach($arr as $k => $a){
                if($a == 1)$i++;                                
                if($k != 7) $ch .= $a;
                echo $a;
            }
            if($i%2 == $parity){
                echo " $i $ch Sesuai ";
                echo chr(bindec($ch));
            }
            else {
                echo " $i $ch Tidak sesuai";
                $valid = false;
            }           
            echo "<br>";
        }

        echo "</br>";
        if($valid){
            echo "Data yang diterima valid";
        }
        else {
            echo "Data yang diterima tidak valid";
        }
    }
?>