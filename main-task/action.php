<html>
<head>
    <title>Generator Komunikasi Data</title>
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

    if($type == "odd"){
        require("parity.php");
        getBit($data, 1);
    }
    else if($type == "even"){
        require("parity.php");
        getBit($data, 0);
    }
?>
</body>
</html>