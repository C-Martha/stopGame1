<?php
	
    session_start(); 
    
	//file to contain to database
require_once 'login.php';
require_once 'tracker.php';
	
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$code = $_SESSION['code']; 
$totalP = $_SESSION['players']; 
$playerID = $_SESSION['username'];

//return count of total number of players for game
$sql = "SELECT numPlayers FROM leaderboard WHERE code = '{$code}' AND userID = '{$playerID}' ";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
	
    // output data of each row
    while($row = $result->fetch_assoc()) {
		 //  echo "data:  " . " " . $row["stop"]. "<br>\n\n";

         $total = $row["numPlayers"]; 
        // $total = $_SESSION['$total']; 
         //echo $total; 
      //  echo "data: ALL ".  $total . "\n\n";
         
         
         echo " GOT TOTAL ROW";
    }
    
    
    
} else {
    echo "0 results";
}


//$_SESSION['Tplayers'] = $total; 

//return count of total number of players present with same code   
 $query = "SELECT userID FROM leaderboard WHERE code = '{$code}' ";
    $Presentresult = $conn->query($query); 
 $num = $Presentresult->num_rows;
 
 echo "data: present $num\n\n";
 

//check if total players are present to start game!!
 if($total == $num){
     

     echo "data: EVERYONE IS HERE!!\n\n";
     
 } else {
     
     echo " WAITING ";
     
 }
 

$conn->close();


flush();



?>