<html>
<head>
    <title>Encoder Komunikasi Data</title>
    <style>
        body {
            font-family: Consolas;
        }
    </style>
    <link rel="stylesheet" href="../style.css">
    <script src="http://wavedrom.com/skins/default.js"></script>
    <script src="http://wavedrom.com/WaveDrom.js"></script>
</head>
<body onload="WaveDrom.ProcessAll()">
    <form style="padding-bottom:40px;margin-bottom:40px;">
<?php
    $data = $_POST['data'];
    $type = $_POST['type_generator'];

    if($type == "parity-odd"){
        require("parity.php");
        $ret = getBit($data, 1);
    }
    else if($type == "parity-even"){
        require("parity.php");
        $ret = getBit($data, 0);
    }
    else if($type == "bcc-odd"){
        require("bcc.php");
        $ret = getBit($data, 1);
    }
    else if($type == "bcc-even"){
        require("bcc.php");
        $ret = getBit($data, 0);
    }
    else if($type == "crc"){
        require("crc.php");
        $ret = getBit($data, "110101");
    }
?>
</form>
<center>    
<?php
    $data = "0";
    $enable = "01";
    $clock = "0p";
    $ret_array = str_split($ret);
    $last = $ret_array[0];
    $last_clock = 0;
    $data .= $last;
    for($i = 1; $i<strlen($ret); $i++){
        if($ret_array[$i]!=$last){
            $last = $ret_array[$i];
            $data .= $ret_array[$i];
        }
        else {            
            $data .= ".";
        }
        $enable .= ".";
        $clock .= ".";
    }
    $enable .= "0";
    if($last == 0){
        $data .= ".";
    }
    else {
        $data .= "0";
    }
    $clock .= "l";
?>
<script type="WaveDrom">
   { signal : [
     { name: "enable",  wave: "<?php echo $enable;?>" },
     { name: "clock",  wave: "<?php echo $clock;?>" },
     { name: "data",  wave: "<?php echo $data;?>" },
   ]}
</script>
</center>
</body>
</html>