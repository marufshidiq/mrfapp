<html>
<head>
    <title>Encoder Komunikasi Data</title>
    <style>
        body {
            font-family: Consolas;
        }
    </style>
</head>
<body>
    
<?php
    $data = $_POST['data'];
    $type = $_POST['type_generator'];

    if($type == "parity-odd"){
        require("parity.php");
        getBit($data, 1);
    }
    else if($type == "parity-even"){
        require("parity.php");
        getBit($data, 0);
    }
    else if($type == "bcc-odd"){
        require("bcc.php");
        getBit($data, 1);
    }
    else if($type == "bcc-even"){
        require("bcc.php");
        getBit($data, 0);
    }
    else if($type == "crc"){
        require("crc.php");
        getBit($data, "110101");
    }
?>
</body>
</html>