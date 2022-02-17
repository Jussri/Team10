<?php

$host = "db";
$username = "root";
$password = "";
$database = "users";

$conn = mysqli_connect("db", "root", "password", "users");
$results = $conn->query("SELECT * FROM users");
?>

<?php while ($data = $results->fetch_assoc()): ?>
    
<li> 
<tr>
     <td><?php echo $data ['firstname']; ?></td>
     <td><?php echo $data ['lastname']; ?></td>
     <td><?php echo $data ['email']; ?></td>
     
</tr>   
</li>

<?php endwhile; 

?>    