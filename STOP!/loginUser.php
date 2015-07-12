<?php

//file to connect to database
require_once 'login.php';


// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

echo "Connected successfully";


//executed if user signs in 
if(isset($_POST['submitLog']))
{
    
    
   function generateRandomString($length = 5) 
   {
   return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    // Echo the random string.
   
    $code = generateRandomString($length = 5);
    $users_name = mysqli_real_escape_string($conn, $_POST['username']); 
   
 
 
     
        //insert user data into database 
    $sql = "INSERT INTO leaderboard (UserID, Code, Score)
    VALUES ('{$users_name}', '{$code}', NULL )"; 
    
 
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {   
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    

        
}
 
  
   if (isset($_POST["username"]) & isset($_POST['submitLog']) == NULL )
    {
	
	//trim and lowercase username
	$username =  strtolower(trim($_POST["username"])); 

	//check username in db
	$results = mysqli_query($conn ,"SELECT ID FROM leaderboard WHERE UserID = '{$username}'");
	
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	
	//if value is more than 0, username is not available
	if($username_exist) 
        {
		  echo ('<img src="imgs/not-available.png" />');
        }else
       {
		  echo ('<img src="imgs/available.png" />');
        }
    
    
    }
    

    

$conn->close();

?>