<?php

// Luetaan email, salasana, etunimi, sukunimi, id ja usertype

if (isset($_POST["email"])){
    $email=$_POST["email"];
}

if (isset($_POST["password"])){
    $password=$_POST["password"];
} 

if (isset($_POST["firstname"])){
    $firstname=$_POST["firstname"];
}

if (isset($_POST["lastname"])){
    $lastname=$_POST["lastname"];
}

if (isset($_POST["id"])){
    $id=$_POST["id"];
}

 if (isset($_POST["usertype"])) {
    $usertype=$_POST["usertype"];
}

// Jossei arvoja ole annettu, niin poistuu dbdeleteen.

if (!(isset($email) || isset($password) || isset($firstname) || isset($lastname) || isset($id) )){
    header("Location:dbdelete.php");
    exit;
}
// Jos kaikki arvot saatu yhteys tietokanta palvelimelle
$yhteys=mysqli_connect("db", "root", "password", "users");

// Tietokannan valinta
if (!$yhteys) {
    die("Connection failed: " . mysqli_connect_error());

}

// Update päivittää nimet, emailin, salasanan ja usertypen. Where lauseella mitä tietoa päivitetään
$user="user";
$sql="update users set firstname=?, lastname=?, email=?, password=?, usertype=? where id=?";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'sssssi', $firstname, $lastname, $email, $password, $user, $id);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($yhteys);

  // poistuu yllapito/usersadmin.php
header("Location:../yllapito/usersadmin.php");
exit;

?>

