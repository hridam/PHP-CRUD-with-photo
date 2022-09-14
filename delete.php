<?php

include('dbcon.php');
    
    if(isset($_GET['delid'])){
        $aa = $_GET['delid'];
        $student = mysqli_query($conn, "select * from student where ID = $aa");
        $row = $student->fetch_assoc();
        unlink("./images/".$row['Photo']);
        $del = mysqli_query($conn, "delete from student where ID = $aa");
        header('Location:test.php');
        // echo "item deleted";

        
    }
    
    ?>