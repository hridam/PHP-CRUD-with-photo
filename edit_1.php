<?php

include('dbcon.php');
if(isset($_POST['edit']))
  { 
    // easy and less code and boiler plate
    // extract($_POST);
  	$eid=$_POST['id'];
	
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];
    $hobby=$_POST['hobby'];


    $old=$_POST['old'];
    $update="";
    $image = $_FILES['photome']['name'];
    // print_r($image);
    // die;
    if($image!=NULL){

      $image_extension = pathinfo($image,PATHINFO_EXTENSION);
      $file = time().'.'. $image_extension;
      $update = $file;
      unlink('images/'.$old);
    }
    else{
      $update=$old;
    }




 
    // Query for data updation
     $query=mysqli_query($conn, "UPDATE `student` SET `First Name`='$fname',`Last Name`='$lname',`City`='$city',`Gender`='$gender',`Hobby`='$hobby',`Photo`='$update' WHERE `ID`= $eid");
     
    if ($query) {
      if($image!=NULL){
        if(file_exists('images/'.$old)){
            unlink("'images/'.$old");
        }
        move_uploaded_file($_FILES['photome']['tmp_name'], 'images/'.$update);

        }
      }
          header("Location:test.php");
}
?>