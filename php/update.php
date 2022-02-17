<?php

if (isset($_POST["email"]) && isset($_POST["password"]) &&
isset($_POST["firstname"]) && isset($_POST["lastname"]) &&
isset($_POST["id"]) && isset($_POST["usertype"])) {
$email=$_POST["email"];
$password=$_POST["password"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$id=$_POST["id"];
$usertype=$_POST["usertype"]
}

if (!isset($email) || isset($password) || isset($firstname) || isset($lastname) || isset($id) )){
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

