<?php
	
	require_once 'login.php'; 
	
	$code = $_POST['code']; 
	

$sql = "SELECT stop FROM game WHERE code = '{$code}' ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	
    // output data of each row
    while($row = $result->fetch_assoc()) {
		 //  echo "data:  " . " " . $row["stop"]. "<br>\n\n";
         
         if($row['stop'] == 1){
             
         return "1"; 
         
         } else {
			 return "0"; 

		 } 
    }
} else {
    echo "data: 0 results\n\n";
}


?> 