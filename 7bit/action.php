<?php
$birth = $_GET['birth'];
$birth_arr = str_split($birth);
$b = 1;
if(isset($_GET['inverse'])){
    if($_GET['inverse'] == "yes"){
        $b=0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generator Tugas</title>
    <style>
        body {
            margin: 20px;
        }

        .grid {
            margin: 0 auto;
            width: 80vw;
            max-width: 60vh;
            height: 80vw;
            max-height: 60vh;
            font-size: 1rem;
        }
        .row {
            display: flex;
        }
        .box {
            margin: 2px;
            font-weight: bold;
            flex: 1 0 auto;
            position: relative;
        }
        .black {
            background-color: black !important;
            color: white;
            border:1px solid black;
            -webkit-print-color-adjust: exact !important;
        }
        .white {
            background: white;
            color: black;
            border:1px solid black;
        }
        .box:after {
            content: "";
            float:left;
            display: block;
            padding-top: 100%;
        }
        .box .inner {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="grid">
        <?php
        foreach($birth_arr as $n){        
            echo "<div class=\"row\">";
            $bin = decbin($n + 48);
            $color = "white";
            if($b==0){
                $color = "black";
            }
            echo "<div class=\"box $color\"><div class=\"inner\">0</div></div>";
            foreach(str_split($bin) as $a){
                $color = "white";
                if($a==$b){
                    $color = "black";
                }
                echo "<div class=\"box $color\"><div class=\"inner\">$a</div></div>";
            }
            echo "</div>";
        }
        ?>                                   
    </div>
</body>
</html>