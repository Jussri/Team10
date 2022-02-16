<?php

try{
    $yhteys=mysqli_connect("db", "root", "password", "users");
}
catch(Exception $e){
    header("Error!");
    exit;
}

$tulos=mysqli_query($yhteys, "select * from users");

if($row["usertype"]=="user")
print "<ol>";
while ($rivi=mysqli_fetch_object($tulos)){
    print "<li>$rivi->firstname $rivi->lastname"."<a href='./poista.php?poistettava=$rivi->id'> Poista</a> ". 
    "<a href='./muokkaa.php?muokattava=$rivi->id'> Muokkaa</a>";
}


mysqli_close($yhteys);
?>

<?php