<?php

if (isset($_POST["etunimi"])){
    $etunimi=$_POST["etunimi"];

}
else{
    header("Location:contactus.html");
    exit;

}

if (isset($_POST["sukunimi"])){
    $sukunimi=$_POST["sukunimi"];

}
else{
    $sukunimi="";

}
if (isset($_POST["ika"])){
    $ika=$_POST["ika"];

}
else{
    $ika="";

}


$yhteys = mysqli_connect();

// Check connection
if (!$yhteys) {
	die("Yhteyttä ei voitu muodostaa: " . mysqli_connect_error());
}
echo "Yhteys OK."; // debug

$tietokanta=mysqli_select_db($yhteys, "users");
if (!$tietokanta) {
	die("Tietokannan valinta epäonnistui: " . mysqli_connect_error());
}
echo "Tietokanta OK."; // debug

$sql="insert into users(id, firstname, lastname, email, password) values(?, ?, ?, ?, ?)";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'issss', $id, $firstname, $lastname, $email, $password);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys); 
?>


