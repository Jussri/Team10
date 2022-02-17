<?php

try{
    $connection=mysqli_connect("db", "root", "password", "users");
}
catch(Exception $e){
    header("Error!");
    exit;
}

$results=mysqli_query($connection, "select * from users");


print "<ol>";
while ($row=mysqli_fetch_object($results)){
    print "<li>$row->firstname $row->lastname"." <a href='./php/dbdelete.php?poistettava=$row->id'>Delete</a> ". 
    "<a href='../php/modify.php?modify=$row->id'> Edit data</a></li>";
}
print "</ol>";

mysqli_close($connection);
?>

