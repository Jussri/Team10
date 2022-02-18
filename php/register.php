<?php

if (isset($_POST["email"]) && isset($_POST["password"]) &&
isset($_POST["firstname"]) && isset($_POST["lastname"])) {
$email=$_POST["email"];
$password=$_POST["password"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
}
else{
header("Location:register2.html");
exit;
}
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys=mysqli_connect("db", "root", "password", "users");
}
catch(Exception $e){
    print "Error!";
    exit;
}

$user="user";
$sql="insert into users (firstname, lastname, email, password, usertype) values(?,?,?, SHA2(?, 256),?)";

    $stmt=mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'sssss', $firstname, $lastname, $email, $password, $user);
    mysqli_stmt_execute($stmt);
    mysqli_close($yhteys);
    

    header("Location:/index.html");
exit;

?>

