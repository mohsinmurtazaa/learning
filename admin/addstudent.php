<?php
session_start();
if (isset($_SESSION['uid']))
{
    echo "";
}
else{
    header('location: ../login.php');
}
?>
<?php
include ('header.php');
include ('title.php');
?>



<form method="post" action = "addstudent.php" enctype="multipart/form-data">
    <table border="1"  style="width: 50%; margin-top: 40px;" align="center" >
        <tr>
            <th>Roll no.</th>
            <td><input type="text" name="rollno" placeholder="Enter Roll no." required></td>
        </tr>
        <tr>
            <th>Full Name</th>
            <td><input type="text" name="name" placeholder="Enter full name" required></td>
        </tr>
        <tr>
            <th>City</th>
            <td><input type="text" name="city" placeholder="Enter city name" required></td>
        </tr>
        <tr>
            <th>Parent Contact no.</th>
            <td><input type="text" name="contact" placeholder="Enter contact no." required></td>
        </tr>
        <tr>
            <th>Standard</th>
            <td><input type="number" name="stndrd" placeholder="Enter your standard" required></td>
        </tr>
        <tr>
            <th>Image</th>
            <td><input type="file" name="img" required  ></td>
        </tr>
        <tr>
            <td colspan="2" align="center"> <input type="submit" name="submit" value="Submit"></td>
        </tr>

    </table>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    include ('../dbcon.php');
    $rollno = $_POST['rollno'];
    $name=$_POST['name'];
    $city=$_POST['city'];
    $contact=$_POST['contact'];
    $stndrd=$_POST['stndrd'];
    $imgnm = $_FILES['img']['name'];
    $tempname = $_FILES['img']['tmp_name'];
    move_uploaded_file($tempname,"../dataimage/$imgnm");

    $qry="INSERT INTO `student`(  `rool no.` , `name` , `contact no.`, `city`, `standard` , `iamge` ) VALUES ( '$rollno' , '$name' ,'$contact' , '$city' , '$stndrd', '$imgnm')";

    $run = mysqli_query($conn,$qry);
    if ($run == true){
        ?>
<script>
    alert('Data Inserted successfully');

</script>
<?php
    }
    else{
        echo ("ERROR:".mysqli_error($conn));
    }
}
    ?>