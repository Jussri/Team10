<?php

<<<<<<< HEAD

=======
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


$sql="insert into users (email, password) values(?, SHA2(?, 256))";
    $stmt=mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $user->email, $user->password);
    mysqli_stmt_execute($stmt);
    mysqli_close($yhteys);
    
}
catch(Exception $e){
    print "This e-mail already exists in the system!";
}
?>
>>>>>>> 5986098c8561c9718f81f9e87677affa1079866d
