<?php


if ($_POST["email"]) && isset($_POST["password"]) &&
isset($_POST["name"]) && isset($_POST["lastname"])) {
$email=$_POST["email"];
$password=$_POST["password"];
$name=$_POST["name"]:
$lastname=$_POST["lastname"];
}
else{
header("Location:register.html");
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


$sql="insert into users (id, firstname, lastname, email, password) values(?, SHA2(?, 256))";
    $stmt=mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'issss', $user->id, $user->firstname, $user->lastname, $user->email, $user->password);
    mysqli_stmt_execute($stmt);
    mysqli_close($yhteys);
    
}
catch(Exception $e){
    print "This e-mail already exists in the system!";
}
?>

