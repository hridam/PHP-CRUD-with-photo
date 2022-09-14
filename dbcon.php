
<?php
$localhost = "localhost";
        $name = "root";
        $pass = "";
        $dbname = "comp_test";

        $conn = mysqli_connect($localhost, $name, $pass, $dbname);

        if(mysqli_connect_error()){
            echo "conncection fail".mysqli_connect_error();
        }
        ?>