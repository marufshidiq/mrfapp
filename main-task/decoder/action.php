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
    $bit = $_POST['bit'];
    $type = $_POST['type_generator'];

    if($type == "parity-odd"){
        require("parity.php");
        getData($bit, 1);
    }
    else if($type == "parity-even"){
        require("parity.php");
        getData($bit, 0);
    }
    else if($type == "bcc-odd"){
        require("bcc.php");
        getData($bit, 1);
    }
    else if($type == "bcc-even"){
        require("bcc.php");
        getData($bit, 0);
    }
    else if($type == "crc"){
        require("crc.php");
        getData($bit, "110101");
    }
?>
</body>
</html>