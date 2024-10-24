<?php

    $serverName = "localhost"; //127.0.0.1
    $userName = "root";
    $pwd = "";
    $nameDB = "dblaptop";

    $conn = mysqli_connect($serverName, $userName, $pwd, $nameDB);

    if ($conn === false){
        echo "kết nối thất bại";
    }
?>  