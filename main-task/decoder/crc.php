<?php
    function xor_data($data, $div)
    {
        $result = "";
        $data_split = str_split($data);
        $div_split = str_split($div);
        for ($i = 0; $i < count($data_split); $i++) {
            if ($data_split[$i] == $div_split[$i]) {
                $result .= "0";
            } else {
                $result .= "1";
            }
        }
        $result = substr($result, 1);
        return $result;
    }

    function mod2div($data, $div)
    {
        $pick = strlen($div);
        $tmp = substr($data, 0, $pick);
        while ($pick < strlen($data)) {
            if ($tmp[0] == "1") {
                $tmp = xor_data($div, $tmp) . $data[$pick];
            } else {
                $zero = "";
                for ($i = 0; $i < strlen($div); $i++) {
                    $zero .= "0";
                }
                $tmp = xor_data($zero, $tmp) . $data[$pick];
            }
            $pick++;
        }

        if ($tmp[0] == "1") {
            $tmp = xor_data($div, $tmp);
        } else {
            $zero = "";
            for ($i = 0; $i < strlen($div); $i++) {
                $zero .= "0";
            }
            $tmp = xor_data($zero, $tmp);
        }
        return $tmp;
    }
    function getData($bit, $divider)
    {
        echo "<h3>Cyclic Redundancy Check</h3>";
        echo $bit;
        $bit_array = str_split($bit); // Merubah bit yang diterima ke dalam array

        // <Section> Validasi apakah jumlah bit diterima valid (kelipatan 8)
        $count = count($bit_array); // Mendapatkan jumlah bit yang diterima
        echo "<br>";
        echo $count;
        $divider_length = strlen($divider);
        if ((($count % 7)) != $divider_length - 1) {
            echo "<br>";
            echo "Jumlah bit tidak valid";
            return;
        }
        // </Section>

        // <Section> Validasi apakah ada karakter selain bit 0 dan 1        
        $other_bit = 0;
        foreach ($bit_array as $b) {
            if (!is_numeric($b)) {
                $other_bit = 1;
            }
            if (($b != 0) && ($b != 1)) {
                $other_bit = 1;
            }
        }

        echo "<br>";
        if ($other_bit == 1) {
            echo "Ada data selain 0 dan 1";
            return;
        }
        
        $right_remainder = "";
        for($i = 0; $i<$divider_length-1;$i++){
            $right_remainder.="0";
        }

        $remainder = mod2div($bit, $divider);        
        echo "Remainder : ".$remainder;
        echo "<br>";
        if($remainder!=$right_remainder){
            echo "Data tidak valid";
            return;
        }        
        echo "Data valid";        
        echo "<br>";
        $dataword = substr($bit, 0, -($divider_length-1));
        
        echo "Dataword : ".$dataword;
        echo "<br>";
        echo "Data : ";

        foreach(array_chunk(str_split($dataword), 7) as $arr){
            $ch = "";            
            foreach($arr as $k => $a){                
                $ch .= $a;                
            }                        
            echo chr(bindec($ch));                        
        }
    }
?>