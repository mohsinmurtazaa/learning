<?php
session_start();
if (isset($_SESSION['uid']))
{
    header ('location:admin/admindash.php');
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin LOgin</title>
</head>
<body bgcolor="yellow">

<h1 align="center" style="color: azure; background-color: red; line-height: 120px; font-size: 80px; margin-top: 0%;">Admin Login</h1>
<form action="login.php" method="post">

    <table align="center">
        <tr>
            <td style="color: black;"> Username</td><td> <input type="text" name="uname" required </td>
        </tr>
        <tr>
            <td style="color: black;"> Password</td><td> <input type="password" name="pass" required </td>

        </tr>
        <tr>
            <td><input type="submit" name="login" value="Login" </td>
        </tr>
    </table>


</form>


</body>
</html>

<?php
include ('dbcon.php');
if(isset($_POST['login']))
{
    $username = $_POST['uname'];

    $password = $_POST['pass'];

    $qry = "SELECT * FROM admin WHERE  username = '$username' AND password = '$password'" ;
    $run = mysqli_query($conn,$qry);
    $row = mysqli_num_rows($run);
    if ($row < 1)
    {
        ?>
        <script> alert('username and password do not match.');
            window.open('login.php', '_self');

        </script>

        <?php



    }
    else{
        $data = mysqli_fetch_assoc($run);
        $id = $data ['id'];

        echo "id=".$id;

        $_SESSION['uid'] = $id;
        header ('location: admin/admindash.php');

    }
}


?>