<?php

$conn = mysqli_connect('localhost', 'root', "", "ht");
if (!$conn) {
    echo "not connected to the  database";
}
if (isset($_POST['submit'])) {
    // collect value of input field
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $hobby = $_POST['hobbies'];


    $image = $_FILES['photo']['name'];
    $image_extension =pathinfo($image,PATHINFO_EXTENSION);
    $file =time().'.'.$image_extension;



    $sqlme = "INSERT INTO crud(`fname`, `lname`, `city`, `hobby`, `gender`, `photo`) VALUES ('$fname', '$lname','$city','$hobby','$gender','$file')";
    $sql_runme = mysqli_query($conn, $sqlme);
    if ($sql_runme) {
        move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$file);
        
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border: 2px solid black;
            border-collapse: collapse;
        }
        th,td{
            border: 2px solid black;
        }
        a{
            text-decoration: none;
            color: black;
        }

    </style>
</head>

<body>
    <div class="container">

        <form action="kk.php" method="POST" enctype="multipart/form-data">
            <label for="fname">Enter first name</label>
            <input type="text" name=' fname'>
            <br>
            <label for="fname">Enter last name</label>
            <input type="text" name=' lname'>
            <br>
            <label for="city">Enter city</label>
            <select name="city">
                <option value="ktm">ktm</option>
                <option value="brt">brt</option>
                <option value="itahari">itahari</option>
                <option value="morang">morang</option>
            </select>
            <br>
            <label for="gender">gender</label>
            <input type="radio" name="gender" value="male"> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <br>
            <label for="Hobbies">hobbies</label>
            <br>

            <label for="hobbies">cricket</label>


            <input type="checkbox" name="hobbies" value="cricket">
            <br>

            <label for="hobbies">football</label>

            <input type="checkbox" name="hobbies" value="football">
            <br>

            <label for="hobbies">basketball</label>

            <input type="checkbox" name="vehicle3" value="basketball">

            <label for="image">selsct image here</label>
            <input type="file" id="photo" name="photo">

            <input type="submit" name="submit">

        </form>
    </div>

<br>
<br>
<br>
<br>
<br>
    <div class="table">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">fnmae</th>
          <th scope="col">lname</th>
          <th scope="col">city</th>
          <th scope="col">gender</th>
          <th scope="col">hobbies</th>
          <th scope="col">photo</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $sql="SELECT * FROM crud";
        $sql_run=mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($sql_run)){
            
            echo "<tr>
            <th scope='row'>". $row['id'] . "</th>
            <td>". $row['fname'] . "</td>
            <td>". $row['lname'] . "</td>
            <td>". $row['city'] . "</td>
            <td>". $row['gender'] . "</td>
            <td>". $row['hobby'] . "</td>
            <td><img src='images/".$row['photo']."'  alt='image' height=50px width=50px>  </td>
            <td> <button><a href='edit.php?id=".$row['id']."'>update</button> <button>  <a href='delete.php?id=".$row['id']."'>delete</a></button>  </td>
          </tr>";
        }
    
          ?>


      </tbody>
    </table>

    </div>

</body>


</html>