<?php
session_start();
?>
<?php
if (!isset($_SESSION["user_ok"])){
    $_SESSION["returnaddress"]="login.php";
    header("Location:login2.php");
    exit;

}

?>
<!DOCTYPE html>
<html>
<head><title>Requires login</title></head>
<body>
<p>Login Accepted!</p>

</body>
</html>