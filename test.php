<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    <form method='POST' action="test.php" enctype="multipart/form-data">
        <label>First Name : </label>
        <input type="text" name="fname" id="fname" />
        <br>
        <br>

        <label>Last Name : </label>
        <input type="text" name="lname" id="lname" />
        <br>
        <br>

        <label>City : </label>
        <select name="city" id="city">
            <option value="ktm">Kathmadu</option>
            <option value="pkr">Pokhara</option>
            <option value="brt">Biratnagar</option>
            <option value="lali">Lalitpur</option>
        </select>
        <br>
        <br>

        <label>Gender : </label>
        <input type="radio" id="male" name="gender" value="Male"/><label>Male</label>
        <input type="radio" id="female" name="gender" value="Female"/><label>Female</label>
        <input type="radio" id="other" name="gender" value="Other"/><label>Other</label>
        <br>
        <br>

        <lavel>Hobby : </label>
        <input type="checkbox" id="cir" name="hobby" value="Circket"/><label>Circket</label>
        <input type="checkbox" id="foo" name="hobby" value="Football"/><label>Football</label>
        <input type="checkbox" id="bas" name="hobby" value="BasketBall"/><label>BasketBall</label>
        <br>
        <br>

        <label>Photo : </label>
        <input type="file" id="photo" name="photome"/>
        <br>
        <br>

        <button type="submit" name="submit">Submit</button>
        <br>
        <br>

    </form>

    <?php 
        $localhost = "localhost";
        $name = "root";
        $pass = "";
        $dbname = "comp_test";

        $conn = mysqli_connect($localhost, $name, $pass, $dbname);

        if(mysqli_connect_error()){
            echo "conncection fail".mysqli_connect_error();
        }



        if(isset($_POST['submit'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $city = $_POST['city'];
            $gender = $_POST['gender'];
            $hobby = $_POST['hobby'];
            // $photo = $_POST['photo'];

            $image = $_FILES['photome']['name'];
            $image_extension =pathinfo($image,PATHINFO_EXTENSION);
            $file =time().'.'.$image_extension;

            // if(file_exists("photo/" .$_FILES['photo']['name'])){
            //     $store = $_FILES['photo']['name'];
            //     header('Location: test.php');
            // }
           
            
            // else{
            $query = mysqli_query($conn, "insert into student(`First Name`, `Last Name`, `City`, `Gender`, `Hobby`, `Photo`) VALUE ('$fname', '$lname', '$city', '$gender', '$hobby', '$file')");
            if($query){
                move_uploaded_file($_FILES['photome']['tmp_name'], 'images/'.$file);
                header('Location:test.php');

            }
            }

        // }
    ?>
    <table border="1" style="border-collapse:collapse;">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>City</th>
            <th>Gender</th>
            <th>Hobby</th>
            <th>Photo</th>
        </tr>

        <?php
            
            $queryselect = mysqli_query($conn, "Select * from student");
            $row=mysqli_num_rows($queryselect);
            if($row>0){
                while ($row=mysqli_fetch_array($queryselect)){
                    ?>
                    <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['First Name']; ?></td>
                    <td><?php echo $row['Last Name']; ?></td>
                    <td><?php echo $row['City']; ?></td>
                    <td><?php echo $row['Gender']; ?></td>
                    <td><?php echo $row['Hobby']; ?></td>
                    <td><img src="./images/<?php echo $row['Photo']?>" alt="" width="100" height="100" srcset="">
                    </td>
                    <td><a href="delete.php?delid=<?php echo $row['ID'];?>" class="view" title="View">Delete</a></td>
                    <td><a href="edit.php?editid=<?php echo $row['ID'];?>" class="view" title="View">Edit</a></td>
                    </tr>
                    <?php
                    
                }
            }?>
    </table>

</body>
</html>