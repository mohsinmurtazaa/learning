<?php
 function showdetails($standard , $rollno)
{
include('dbcon.php');
$conn = mysqli_connect('localhost', 'root' , '' , 'sms');
     $qry="SELECT * FROM `student` WHERE `rool no.` ='$rollno' AND `standard`='$standard'";

     $run=mysqli_query($conn,$qry);
     if(mysqli_num_rows($run)> 0)
     {
         $data = mysqli_fetch_assoc($run);

         ?>

<table border="1" style="width: 60%; margin-top: 10px;" align="center" >
    <tr>
        <th colspan="3"> Student Details</th>
    </tr>
    <tr>
        <td rowspan="5"> <img src ="dataimage/<?php  echo  $data['iamge']; ?>" style="max-height: 150px; max-width: 120px; padding-left: 40px;"> </td>

        <th>Roll no</th>
        <td align="center"><?php  echo $data['rool no.']; ?> </td>
    </tr>
<tr>
    <th>Name</th>
    <td align="center"><?php  echo $data['name']; ?> </td>
    </tr>
    <tr>
        <th>Contact number</th>
        <td align="center"><?php  echo $data['contact no.']; ?> </td>
    </tr>
    <tr>
        <th>city</th>
        <td align="center"><?php  echo $data['city']; ?> </td>
    </tr>
    <tr>
        <th>standard</th>
        <td align="center"><?php  echo $data['standard']; ?> </td>
    </tr>
</table>
<?php
     }
else
{
echo "<script>
    alert ('No Student Found.');
</script> ";
}
 }

?>