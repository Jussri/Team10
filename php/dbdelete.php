<?php

if (isset($_GET["poistettava"])) {
    $poistettava=$_GET["poistettava"];
}

$yhteys=mysqli_connect("db", "root", "password", "users");

if (!$yhteys) {
    die("Failed to connect: " . mysqli_connect_error());
}
$tietokanta=mysqli_select_db($yhteys, "users");
if (!$tietokanta) {
    die ("Failed to choose database: " . mysqli_connect_error());
}
echo "Database OK";

if (isset ($poistettava)){
    $sql="delete from users where firstname=?";
    $stmt=mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $poistettava);
    mysqli_stmt_execute($stmt);
}

$tulos=mysqli_query($yhteys, "select * from users");

print "<ol>";
while ($rivi=mysqli_fetch_object($tulos)){
    print "<liv>firstname=$rivi->firstname lastname=$rivi->lastname email=$rivi->email password=$rivi->password usertype=$rivi->usertype<br>";
}
print "</ol>"
mysqli_close($yhteys);
?>