<?php
session_start();
// lukee syötetyt arvot "email" ja "password"
if (isset($_POST["email"]) && isset($_POST["password"])) {
$email=$_POST["email"];
$password=$_POST["password"];

} // jos tietojen saamisessa on ongelmia, ohjataan käyttäjä takaisin registeröinnin pääsivulle
else{
    header("Location:register2.html");
    exit;
    }
// Otetaan yhteys mysql palvelimeen ja oikeaan tietokantaan
$yhteys=mysqli_connect("db", "root", "password", "users");
$tietokanta=mysqli_select_db($yhteys, "users");
// tarkistetaan onko syötetyt tiedot (email ja salasana) jo tietokannassa
$sql="select * from users where email=? and password=sha2(?,256)";
$stmt=mysqli_prepare($yhteys, $sql); // valmistellaan sql-lause 
mysqli_stmt_bind_param($stmt, "ss", $tunnus, $salasana);
mysqli_execute($stmt);
$tulos=mysqli_stmt_get_result($stmt);


if ($rivi=mysqli_fetch_object($tulos)) {
    $_SESSION["user_ok"]="ok";
    header("Location:".$_SESSION["returnaddress"]);
    exit;
}
else{
    header("Location:users.php");
    exit;
}
?>