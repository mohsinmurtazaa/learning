<?php

include ('../dbcon.php');
$id=$_REQUEST['$id'];

$qry="DELETE FROM `student` WHERE `id` = '$id'; ";

$run = mysqli_query($conn,$qry);

if ($run == true)
{
    ?>
    <script>
        alert('Data deleted successfully');
    </script>

    <script>
        window.open('deletestudent.php' , '_self');
    </script>
    <?php



}

?>