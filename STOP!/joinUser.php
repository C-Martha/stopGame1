<?php

//file to connect to databse
require_once 'login.php';

//connect to database

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $users_name; 
 $code; 
 
//executed if user signs in 
if(isset($_POST['submitJoin']))
{
    $users_name = mysqli_real_escape_string($conn, $_POST['username']); 
    $code = mysqli_real_escape_string($conn, $_POST['code']); 

    //insert data into database 
    $sql = "INSERT INTO leaderboard (UserID, Code, Score)
    VALUES ('{$users_name}', '{$code}', NULL)";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }


}


 if (isset($_POST["usernameJ"]) & isset($_POST['submitJoin']) == NULL )
{
	
	//trim and lowercase username
	$username =  strtolower(trim($_POST["usernameJ"])); 

	//check username in db
	$results = mysqli_query($conn ,"SELECT ID FROM leaderboard WHERE UserID='{$username}'");
	
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	
	//if value is more than 0, username is not available
	if($username_exist) 
        {
		  echo ('<img src="imgs/not-available.png" />');
        } else
        {
		  echo ('<img src="imgs/available.png" />');
        }
    
    
}


 if (isset($_POST["code"]) & isset($_POST['submitJoin']) == NULL )
    {
	
	//trim and lowercase username
	$code =  $_POST["code"]; 

	//check username in db
	$results = mysqli_query($conn ,"SELECT ID FROM leaderboard WHERE Code='{$code}'");
	
	//return total count
	$code_exists = mysqli_num_rows($results); //total records
	
	//if value is more than 0, username is not available
	if($code_exists) 
        {
		    echo ('<img src="imgs/available.png" />');
        } else
        {
		   echo ('<img src="imgs/not-available.png" />');
        }
  
}

$conn->close();
?>

