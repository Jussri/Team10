<!DOCTYPE html>
<html>
<head><title>Requires login</title></head>
<body>
<?php
session_start();

if (!isset($_SESSION["user_ok"])){
    $_SESSION["return address"]="login.php";
    header("Location:loginin.php");
    exit;

}

print "Need to login";
?>
<p>Login Accepted!</p>
</body>
</html>