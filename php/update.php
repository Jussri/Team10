<?php
if (isset($_GET["modifyable"])){
    $modifyable=$_GET["modifyable"]
}

if (!isset($modifyable)){
    header("Location:dbdelete.php");
    exit;
}

$yhteys=mysqli_connect("db", "root", "password", "users");

if (!$yhteys) {
    die("Failed to connect: " . mysqli_connect_error());
}
$tietokanta=mysqli_select_db($yhteys, "users");
if (!$tietokanta) {
    die ("Failed to choose database: " . mysqli_connect_error());
}



?>