<?php

// jos email, salasana, etunimi ja sukunimi on olemassa, niin lukee ne
if (isset($_POST["email"]) && isset($_POST["password"]) &&
isset($_POST["firstname"]) && isset($_POST["lastname"])) {
$email=$_POST["email"];
$password=$_POST["password"];
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
}
// jossei, siirtää paikkaan register2.html ja ohjelma ei jatku.
else{ 
header("Location:register2.html");
exit;
}
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
// yhteys tietokantaan, "käyttäjätunnus", salasana
try{
    $yhteys=mysqli_connect("db", "root", "password", "users");
}
catch(Exception $e){
    print "Error!";
    exit;
}
// tietokannan määritys ja nimi
$user="user";
// lisää tiedot sqllään
$sql="insert into users (firstname, lastname, email, password, usertype) values(?,?,?, SHA2(?, 256),?)";

    $stmt=mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'sssss', $firstname, $lastname, $email, $password, $user);
    mysqli_stmt_execute($stmt);
    mysqli_close($yhteys);
    
  // jossei ole rekisteröitynyt päätyy --> urregistered.php
    header("Location:urregistered.php");
exit;

?>

