<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>

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
<form method='POST' action="edit_1.php" enctype="multipart/form-data">
    <?php
    $aaa = $_GET['editid'];
        $queryselect = mysqli_query($conn, "Select * from student where ID = $aaa");
                while ($row=mysqli_fetch_array($queryselect)){
                    // print_r($row);
                    ?>
        <input type="text" name="id" id="id" value="<?php echo $row['ID']; ?>"? hidden>
        <label>First Name : </label>
        <input type="text" name="fname" id="fname" value="<?php echo $row['First Name']; ?>"?/>
        <br>
        <br>

        <label>Last Name : </label>
        <input type="text" name="lname" id="lname" value="<?php echo $row['Last Name']; ?>"?/>
        <br>
        <br>

        <label>City : </label>
        <select name="city" id="city">
            <option <?php echo ($row['City']=='pkr')?"selected":"null";?> value="pkr">Pokhara</option>
            <option <?php echo ($row['City']=='ktm')?"selected":"null";?> value="ktm">Kathmadu</option>
            <option <?php echo ($row['City']=='brt')?"selected":"null";?> value="brt">Biratnagar</option>
            <option <?php echo ($row['City']=='lali')?"selected":"null";?> value="lali">Lalitpur</option>
        </select>
        <br>
        <br>
        <?;?>
        <label>Gender : </label>
        <input type="radio" id="male" name="gender" value="Male" <?php echo ($row['Gender']=='Male')?"checked":"null";?> /><label>Male</label>
        <input type="radio" id="female" name="gender" value="Female" <?php echo ($row['Gender']=='Female')?"checked":"null";?> /><label>Female</label>
        <input type="radio" id="other" name="gender" value="Other"  <?php echo ($row['Gender']=='Other')?"checked":"null";?> /><label>Other</label>
        <br>
        <br>
        <label>Hobby : </label>
        <input type="checkbox" <?php echo ($row['Hobby']=='Circket')?"checked":"null";?> id="cir" name="hobby" value="Circket"/><label>Circket</label>
        <input type="checkbox" <?php echo ($row['Hobby']=='Football')?"checked":"null";?> id="foo" name="hobby" value="Football"/><label>Football</label>
        <input type="checkbox" <?php echo ($row['Hobby']=='BasketBall')?"checked":"null";?> id="bas" name="hobby" value="BasketBall"/><label>BasketBall</label>
        <br>
        <br>

        <label>Photo : </label>
        <input type="text" value="<?php echo $row['Photo']; ?>" name="old" hidden>
        <input type="file" id="photome" name="photome"/>
        <br>
        <img src="./images/<?php echo $row['Photo']?>" alt="" width="100" height="100" srcset="">
        <br>
        <br>

        <?php 
            }?>
        <button type="submit" name="edit">Edit</button>
        <br>
        <br>

    </form>
</body>
</html>