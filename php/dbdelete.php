<?php
$yhteys=mysqli_connect("db", "root", "password", "users");

if ($yhteys) {
    die("Yhteyden muodostaminen epäonnistui: " . mysqli_connect_error());
}
$tietokanta=mysqli_select_db($yhteys, "users");
if (!$tietokanta) {
    die ("Failed to choose database: " . mysqli_connect_error());
}
echo "Database OK";

$tulos=mysqli_query($yhteys, "select * from users");

print "<ol>";
while ($rivi=mysqli_fetch_object($tulos)){
    print "<liv>firstname=$rivi->firstname lastname=$rivi->lastname email=$rivi->email password=$rivi->password usertype=$rivi->usertype<br>";
}
print "</ol>"
mysqli_close($yhteys);
?>