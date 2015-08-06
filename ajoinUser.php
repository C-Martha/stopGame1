<?php

// Start the session
session_start();



//file to connect to databse
require_once 'login.php';

//connect to database

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 

    $username = mysqli_real_escape_string($conn, $_POST['usernameJ']); 
    $code = mysqli_real_escape_string($conn, $_POST['code']); 
    
   $_SESSION['username'] = $users_name; 
   $_SESSION['code'] = $code; 
   
   
   
   
//return count of total number of players for game
$sql = "SELECT numPlayers FROM leaderboard WHERE code = '{$code}'";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
	
    // output data of each row
    while($row = $result->fetch_assoc()) {
		 //  echo "data:  " . " " . $row["stop"]. "<br>\n\n";

         $total = $row["numPlayers"]; 
         
         if($total > 0){

           echo "GOT TOTAL ROW";
          // echo $total; 
 
         }
 
    }

} else {
    echo "0 results";
}
   
   echo $total;
   

    //insert data into database 
    $sql = "INSERT INTO leaderboard (userID, code, numPlayers)
    VALUES ('{$users_name}', '{$code}', '{$total}')";

    if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    






$_SESSION['counter'] = 0;



$conn->close();
?>