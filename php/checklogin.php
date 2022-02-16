<?php
session_start();

if (isset($_POST["email"]) && isset($_POST["password"])) {
$email=$_POST["email"];
$password=$_POST["password"];

}
else{
    header("Location:register2.html");
    exit;
    }

$yhteys=mysqli_connect("db", "root", "password", "users");
$tietokanta=mysqli_select_db($yhteys, "users");

$sql="select * from users where email=? and password=md5(?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, "ss", $tunnus, $salasana);
mysqli_execute($stmt);
$tulos=mysqli_stmt_get_result($stmt);

if ($rivi=mysqli_fetch_object($tulos)) {
    $_SESSION["user_ok"]="ok";
    header("Location:".$_SESSION["returnaddress"]);
    exit;
}
else{
    header("Locaton:login2.php");
    exit;
}
?>