<?php

// yhteys tietokantaan
try{
    $yhteys=mysqli_connect("db", "root", "password", "users");
}
catch(Exception $e){
    header("Error!");
    exit;
}

$tulos=mysqli_query($yhteys, "select * from users");

print "<ol>";
while ($rivi=mysqli_fetch_object($tulos)){
    print "<li>$rivi->firstname $rivi->lastname"."<a href='../php/dbdelete.php?poistettava=$rivi->id'> Delete</a> ". 
    "<a href='../php/modify.php?modify=$rivi->id'> Edit data</a></li>";
}
print "</ol>";

mysqli_close($yhteys);
?>