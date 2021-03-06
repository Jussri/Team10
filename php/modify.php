<?php
$modify=isset($_GET["modify"]) ? $_GET["modify"] : 0; 
//Tarkistetaan onko saatu kelvollinen syötee, jos ei hypätään usersadmin.php sivulle
if (empty($modify)){
    header("Location:../yllapito/usersadmin.php");
    exit;
}//Yhdistäminen tietokantaan, jos ei onnistu hypätään usersadmin.php sivulle.
mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
try{
    $yhteys=mysqli_connect("db", "root", "password", "users");
}
catch(Exception $e){
    header("Location:../yllapito/usersadmin.php");
    exit;
}//Haetaan kaikki tiedot tietokannasta id:n avulla, valmistellaan sql lause, lisätään arvot oikeisiin paikkoihin
//suoritetaan sql lause
$sql="select * from users where id=?";

$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'i', $modify);
mysqli_stmt_execute($stmt);
//luetaan tietokantaan muokatut tiedot, jos jokin tyhjä -> usersadmin.php sivu
$tulos=mysqli_stmt_get_result($stmt);

if (!$rivi=mysqli_fetch_object($tulos)){
    header("Location:../yllapito/usersadmin.php");
    exit;
}//Jos kaikki ok siirtyvät tiedot lomakkeen kautta update.php post metodilla ja suljetaan tietokanta yhteys
?>
<form action='../php/update.php' method='post'>
ID: <input type='text' name='id' value='<?php print $rivi->id;?>'><br>
Firstname: <input type='text' name='firstname' value='<?php print $rivi->firstname;?>'><br>
Lastname: <input type='text' name='lastname' value='<?php print $rivi->lastname;?>'><br>
Password: <input type='text' name='password' value='<?php print $rivi->password;?>'><br>
E-mail: <input type='text' name='email' value='<?php print $rivi->email;?>'><br>
Usertype: <input type='text' name='usertype' value='<?php print $rivi->usertype;?>'><br>
<input type='submit' name='ok' value='OK'><br>
</form>
<?php 
mysqli_close($yhteys);
?>
