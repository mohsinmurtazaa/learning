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
<table align="center" border="1" style="width: 50%; margin-top: 40px;">
    <form action="deletestudent.php" method="post">
        <tr>
            <th>Enter Standard</th><td>
                <input type="number" name="standard" placeholder="Enter standard " required />

            </td>
        </tr>
        <tr>
            <th> Enter student name</th><td>
                <input type="text" name="stdntname" placeholder="Enter student name " required />
            </td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="search"/>
            </td>
        </tr>

    </form>
</table>
<table align="center" width="80%" border="1" style="margin-top: 10px;">
    <tr style="background-color: black ; color: azure;">
        <th>NO</th>
        <th>IMAGE</th>
        <th>Name</th>
        <th>Roll no.</th>
        <th>Edit</th>
    </tr>
    <?php

    if(isset($_POST['submit']))
    {
        include('../dbcon.php');
        $standard = $_POST['standard'];
        $name = $_POST['stdntname'];
        $qry="SELECT * FROM `student` WHERE `standard` = '$standard' AND `name` LIKE '%$name%'";
        $run = mysqli_query($conn,$qry);
        if (mysqli_num_rows($run)<1)
        {
            echo "<tr><td colspan='5'>NO record found</td></tr>";
        }
        else
        {
            $count=0;

            while($data= mysqli_fetch_assoc($run))
            {
                $count++;

                ?>
                <tr >
                    <td align="center"> <?php echo $count ; ?> </td>
                    <td align="center"><img src="../dataimage/<?php echo $data['iamge'] ; ?>" style="max-width: 100px;"/> </td>
                    <td align="center"><?php echo $data['name']; ?> </td>
                    <td align="center"> <?php echo $data['rool no.']; ?></td>
                    <td align="center"><a href="deleteform.php?$id=<?php echo $data['id'];?>">Delete</a> </td>
                </tr>
                <?php

            }
        }
    }

    ?>

</table>