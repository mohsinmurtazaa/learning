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
include ('../dbcon.php');
 $id = $_GET['$id'];
$qry ="SELECT * FROM `student` WHERE `id` = '$id'";
 $run = mysqli_query($conn,$qry);
$data = mysqli_fetch_assoc($run);
?>

<form method="post" action = "updatedata.php" enctype="multipart/form-data">
    <table border="1"  style="width: 50%; margin-top: 40px;" align="center" >
        <tr>
            <th>Roll no.</th>
            <td><input type="text" name="rollno" value = <?php echo $data['rool no.']; ?> required></td>
        </tr>
        <tr>
            <th>Full Name</th>
            <td><input type="text" name="name" value = <?php echo $data['name']; ?> required></td>
        </tr>
        <tr>
            <th>City</th>
            <td><input type="text" name="city" value = <?php echo $data['city']; ?> required></td>
        </tr>
        <tr>
            <th>Parent Contact no.</th>
            <td><input type="text" name="contact" value = <?php echo $data['contact no.']; ?> required></td>
        </tr>
        <tr>
            <th>Standard</th>
            <td><input type="number" name="stndrd" value = <?php echo $data['standard']; ?> required></td>
        </tr>
        <tr>
            <th>Image</th>
            <td><input type="file" name="img" required  ></td>
        </tr>
        <tr>

            <td colspan="2" align="center">
                <input type="hidden" name="$id" value="<?php echo $data['id'];?>" />
                <input type="submit" name="submit" value="Submit"></td>
        </tr>

    </table>
</form>
</body>
</html>
