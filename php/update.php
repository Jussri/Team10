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

$sql="select * delete from users where firstname=?";
$stmt=mysqli_prepare($yhteys, $sql);
mysqli_stmt_bind_param($stmt, 'i', $modifyable;
mysqli_stmt_execute($stmt);
$tulos=mysqli_stmt_get_result($stmt);

if ($rivi=mysqli_fetch_object($tulos))
?>
<form action='../php/update.php' method='post'>
<div class="inputs">
<input type='text' name='firstname' value='<?php print $rivi->firstname;?>'><br>
<input type='text' name='lastname' value='<?php print $rivi->lastname;?>' placeholder='Last name'><br>
<input type='text' name='email' value='<?php print $rivi->email;?>' placeholder='E-mail'><br>
<input type='password' name='password' value='<?php print $rivi->password;?>' placeholder='Password'><br>
</div>
<div class="button">
<input type='submit' name='ok' value='Send' ><br>
</div>
</form>


<?php

?>

