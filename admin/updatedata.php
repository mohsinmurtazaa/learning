<?php

    include ('../dbcon.php');
    $rollno = $_POST['rollno'];
    $name=$_POST['name'];
    $city=$_POST['city'];
    $contact=$_POST['contact'];
    $stndrd=$_POST['stndrd'];
    $id = $_POST['$id'];
    $imgnm = $_FILES['img']['name'];
    $tempname = $_FILES['img']['tmp_name'];
    move_uploaded_file($tempname,"../dataimage/$imgnm");

    $qry="UPDATE `student` SET `rool no.` = '$rollno', `name` = '$name', `contact no.` = '$contact', `city` = '$city', `standard` = '$stndrd', `iamge` = '$imgnm' WHERE `id` = $id; ";

$run = mysqli_query($conn,$qry);

    if ($run == true)
    {
        ?>
        <script>
            alert('Data updated successfully');
        </script>

     <script>
         window.open('updateform.php?$id=<?php echo $id;?>' , '_self');
     </script>
<?php



    }

?>