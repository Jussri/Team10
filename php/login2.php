<!DOCTYPE html>
<html>
<head><title>Log in</title></head>
<body>
<?php
print "<h2> Log in<h2>";
?>
<form action='checklogin.php' method='post'>
    E-mail: <input type='text' name='email' value=''> <br>
    Password: <input type='password' name='password' value=''><br>
    <input type='submit' name='ok' value='OK'>
</form>
    
</body>
</html>