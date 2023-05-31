<?php
$Fname=$_POST['Fname'];
$Pass=$_POST['Pass'];
$con=mysqli_connect("localhost","root","","pdo") or die("db not connected");
$query="select * from curd where Fname='$Fname'";
$res=mysqli_query($con,$query);
if($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
{
    if($row['Pass']==$Pass)
    {
        echo "<script> alert ('login success');
             window.location.href='PDO_CURD_FETCH.PHP';
            </script>";
    }
    else
    {
        echo "<script> alert('login un success') </script>";
    }
}
else
{
    echo "<script> alert('invalid user name');</script>";
}
?>