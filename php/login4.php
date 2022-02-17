<?php
session_start();
$host = "db";
$username = "root";
$password = "";
$database = "users";

$con = mysqli_connect("db", "root", "password", "users");

if(isset($_POST['submit']))
{
    $unm=mysqli_real_escape_string($con,$_POST['email']);
    $ps=mysqli_real_escape_string($con,$_POST['password']);

    $sql="select password,usertype from users where email='$unm'";
    $data=mysqli_query($con,$sql);
    $count=mysqli_num_rows($data);

    if($count>0)
    {
        $row=mysqli_fetch_assoc($data);
        $_SESSION['ROLE']=$row['usertype'];
        $_SESSION['IS_LOGIN']='yes';

        if($row['password']==$ps)
        {
           if($row ['usertype']=='admin')
           {
                header("Location:../yllapito/usersadmin.php");
           }
           if($row ['usertype']=='user')
           {
                 header("Location:../php/users.php");
           }
        }
        else{
            header("Location:login.html");
        }
    }
}