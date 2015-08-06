<?php
	
	
	require_once 'login.php'; 
	
	
$sql = "SELECT * FROM Colors WHERE name = 'dog' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  while($row = $result->fetch_assoc()) {
        echo "found"; 
    }
} else {
    echo "0 results";
}
$conn->close();
	
	?>