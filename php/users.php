<?php

$conn = mysqli_connect("db", "root", "password", "users");
$results = $conn->query("SELECT * FROM users");
?>

<table>
<?php while ($data = $results->fetch_assoc()): ?>
    

<tr>
     <td><?php echo $data ['firstname']; ?></td>
     <td><?php echo $data ['lastname']; ?></td>
     <td><?php echo $data ['email']; ?></td>
     
</tr>   


<?php endwhile; ?>
</table>
   