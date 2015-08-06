<?php
	
session_start(); 
    

	//file to contain to database
require_once 'login.php';
require_once 'tracker.php';
	
    
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');



$playerID = $_SESSION['username']; 
$code = $_SESSION['code']; 
$letter =  $_SESSION['letter']; 




//get total score of other players!! not of current players from diff players!! 
/*
$sql = "SELECT userID FROM leaderboard WHERE code = '{$code}' AND userID != '{$playerID}'  ";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     
       $x = $row["userID"]; 
       
$sqlTotal = "SELECT score FROM leaderboard WHERE code = '{$code}' AND userID = '{$x}' ";
$resultTotal = $conn->query($sqlTotal); 
$totalScore = $resultTotal->num_rows; 


for($i = 0; $i < $totalScore; ++$i){
 
  $row = $resultTotal->fetch_array(MYSQLI_ASSOC); 
  
  sleep(7);
 
  
  echo "data: " . $row['score'] . "\n\n"; //score		
			
      
        
     
}
    

    }
} else {
    echo "0 results FROM mis";
}

*/

$sql = "SELECT userID, score FROM leaderboard WHERE code = '{$code}' AND userID != '{$playerID}";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    
  
    while($row = $result->fetch_assoc()) {
        
        sleep(5); 
        echo "data: Player: " . $row["userID"]. " - Total score: " . $row["score"]. "<br>\n\n"; 
     
    }
} else {
    echo "0 results";
}




	  $conn->close();
      
      flush();
	
	?>
	
