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
    $pshsa2= hash("sha256", $ps);
    $sql="select password,usertype from users where email='$unm' and password='$pshsa2'";
    $data=mysqli_query($con,$sql);
    $count=mysqli_num_rows($data);

    if($count>0)
    {
        $row=mysqli_fetch_assoc($data);
        $_SESSION['ROLE']=$row['usertype'];
        $_SESSION['IS_LOGIN']='yes';

        if($row ['usertype']=='admin')
        
        {
            header("Location:../yllapito/usersadmin.php");
            exit;
        }
<<<<<<< HEAD
        if($row ['usertype']=='user')
        {
            
            header("Location:../php/users.php");
            exit;
=======
        else{
            header("Location:../login.html");
>>>>>>> 5c97cc2fea5847f9c0eae913ea1b3d260c72954a
        }
                      
    } else {
        
       header("Location:../login.html");   
       exit;
    }
 
}
?>