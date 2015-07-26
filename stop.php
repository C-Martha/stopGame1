<?php
	
    session_start(); 
    
	//file to contain to database
require_once 'login.php';
require_once 'tracker.php';
	
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$code = $_SESSION['code']; 


$sql = "SELECT stop FROM game WHERE code = '{$code}' ";

$result = $conn->query($sql);



if ($result->num_rows > 0) {
	
    // output data of each row
    while($row = $result->fetch_assoc()) {
		 //  echo "data:  " . " " . $row["stop"]. "<br>\n\n";
         
         if($row['stop'] == 1){
             
         echo "data: id: " . $row["stop"] .  "<br> \n\n"; 
         
         }
           
    }
} else {
    echo "data: 0 results\n\n";
}

   
$conn->close();


flush();



?>