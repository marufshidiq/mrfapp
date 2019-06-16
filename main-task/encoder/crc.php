<?php
    function xor_data($data, $div)
    {
        $result = "";        
        $data_split = str_split($data);
        $div_split = str_split($div);        
        for($i = 0; $i < count($data_split); $i++){
            if($data_split[$i] == $div_split[$i]){
                $result.="0";
            }
            else {
                $result.="1";
            }
        }
        $result = substr($result, 1);        
        return $result;
    }

    function mod2div($data, $div){        
        $pick = strlen($div);        
        $tmp = substr($data, 0, $pick);        
        while($pick < strlen($data)){            
            if($tmp[0]=="1"){
                $tmp = xor_data($div, $tmp) . $data[$pick];
            }
            else {
                $zero = "";
                for($i = 0; $i<strlen($div);$i++){
                    $zero.="0";
                }
                $tmp = xor_data($zero, $tmp) . $data[$pick];
            }
            $pick++;                        
        }                

        if($tmp[0]=="1"){
            $tmp = xor_data($div, $tmp);
        }
        else {
            $zero = "";
            for($i = 0; $i<strlen($div);$i++){
                $zero.="0";
            }
            $tmp = xor_data($zero, $tmp);
        }
        return $tmp;
    }

    function getBit($data, $divider){
        $data_arr = str_split($data);        
        $buffer = "";
        foreach($data_arr as $n){                
            $dec = ord($n);    
            $bin = decbin($dec);
            $buffer .= $bin;
            echo $bin;
        }
        echo "<br>";
        echo "Divider : ".$divider;
        echo "<br>";
        $div = strlen($divider);        
        $dataword = $buffer;
        for($i = 0; $i<$div-1;$i++){
            $dataword.="0";
        }
        $remainder = mod2div($dataword, $divider);        
        echo "Remainder : ".$remainder;
        echo "<br>";
        echo "Bit yang dikirimkan : ".$buffer.$remainder;
    }
?>