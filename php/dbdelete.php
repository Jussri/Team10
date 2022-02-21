<?php
// Lukee poistettavan tiedon
if (isset($_GET["poistettava"])) {
    $poistettava=$_GET["poistettava"];
}
// Tarkistaa yhteyden
$yhteys=mysqli_connect("db", "root", "password", "users");

if (!$yhteys) {
    die("Failed to connect: " . mysqli_connect_error());
}
$tietokanta=mysqli_select_db($yhteys, "users");
if (!$tietokanta) {
    die ("Failed to choose database: " . mysqli_connect_error());
}
echo "Database OK";  //Debug

//poistaa valitut tiedot id:n mukaan
if (isset ($poistettava)){
    $sql="delete from users where id=?";
    $stmt=mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $poistettava);
    mysqli_stmt_execute($stmt);
}

$tulos=mysqli_query($yhteys, "select * from users"); 

print "<ol>"; // printtaa listan tietokannassa olevista tiedoista, joita voi sitten poistaa tai muokkaa
while ($rivi=mysqli_fetch_object($tulos)){
    print "<liv>id=$rivi->id firstname=$rivi->firstname lastname=$rivi->lastname email=$rivi->email password=$rivi->password usertype=$rivi->usertype " . 
    "<a href='dbdelete.php?poistettava=".$rivi->id."'>Delete</a> <a href='modify.php?modify=".$rivi->id."'>Edit data</a><br>";
}
print "</ol>";
mysqli_close($yhteys);
?>