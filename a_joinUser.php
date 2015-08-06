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

 
 
//executed if user signs in 

    $users_name = mysqli_real_escape_string($conn, $_POST['username']); 
    $code = mysqli_real_escape_string($conn, $_POST['code']); 
    
   $_SESSION['username'] = $users_name; 
   $_SESSION['code'] = $code; 

    //insert data into database 
    $sql = "INSERT INTO leaderboard (userID, code, score)
    VALUES ('{$users_name}', '{$code}', NULL)";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $results = mysqli_query($conn ,"SELECT gID FROM game WHERE userID='{$username}' AND code='{$code}");





 
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
    
    







/*


 if (isset($_POST["username"]) )
{
	
	//trim and lowercase username
	$username =  strtolower(trim($_POST["username"])); 

	//check username in db
	$results = mysqli_query($conn ,"SELECT ID FROM leaderboard WHERE userID='{$username}'");
	
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	
	//if value is more than 0, username is not available
	if($username_exist) 
        {
		 echo "username does not exist, choose another one"; 
        } else
        {
		  echo "user exists"; 
        }
    
    
}


 if (isset($_POST["code"]))
    {
	
	//trim and lowercase username
	$code =  $_POST["code"]; 

	//check username in db
	$results = mysqli_query($conn ,"SELECT ID FROM leaderboard WHERE code='{$code}'");
	
	//return total count
	$code_exists = mysqli_num_rows($results); //total records
	
	//if value is more than 0, username is not available
	if($code_exists) 
        {
		    echo "code is not valid"; 
        } else
        {
		     echo "code is valid"; 
        }
  
}

*/ 

$conn->close();
?>


