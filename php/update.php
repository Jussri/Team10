<?php

if (isset($_POST["email"])){
    $email=$_POST["email"];
}

if (isset($_POST["password"])){
    $password=$_POST["password"];
} 

if (isset($_POST["firstname"])){
    $firstname=$_POST["firstname"];
}

if (isset($_POST["lastname"])){
    $lastname=$_POST["lastname"];
}

if (isset($_POST["id"])){
    $id=$_POST["id"];
}

 if (isset($_POST["usertype"])) {
    $usertype=$_POST["usertype"];
}


if (!(isset($email) || isset($password) || isset($firstname) || isset($lastname) || isset($id) )){
    header("Location:dbdelete.php");
    exit;
}
$yhteys=mysqli_connect("db", "root", "password", "users");

if (!$yhteys) {
    die("Connection failed: " . mysqli_connect_error());

}

$user="user";
$sql="update users set firstname=?, lastname=?, email=?, password=?, usertype=? where id=?";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'sssssi', $firstname, $lastname, $email, $password, $user, $id);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);
  
header("Location:dbdelete.php");
exit;

?>

