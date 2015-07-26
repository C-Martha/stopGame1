<?php
    
    // Start the session
session_start();


//file to connect to database
require_once 'login.php';


// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}


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
    
   $_SESSION['username'] = $users_name; 
   $_SESSION['code'] = $code; 
  
 
     
        //insert user data into database 
    $sql = "INSERT INTO leaderboard (userID, code, score)
    VALUES ('{$users_name}', '{$code}', NULL )"; 
    
 
    if ($conn->query($sql) === TRUE) {
        ///echo "$users_name";
    } else {   
        echo "An error ocurred creating your username, please try again!"; 
    }
    

        
}
 
  
   if (isset($_POST["username"]) & isset($_POST['submitLog']) == NULL )
    {
	
	//trim and lowercase username
	$username =  strtolower(trim($_POST["username"])); 

	//check username in db
	$results = mysqli_query($conn ,"SELECT ID FROM leaderboard WHERE userID = '{$username}'");
	
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	
	//if value is more than 0, username is not available
	if($username_exist) 
        {
		  die ('<img src="imgs/not-available.png" />');
        }else
       {
		 die ('<img src="imgs/available.png" />');
        }
    
    
    }
    

    

$conn->close();

?>


<!-- HTML output -->
<!DOCTYPE html>
<html lang = "en">
<head>
<title>STOP Game!</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- banner -->
    <div class="container">
    <div class="jumbotron">
      <h1>STOP! Game! </h1>
      <p> </p> 
    </div>
    <br><br><br><br>
    <!-- output userinfo -->

<h1> Hello, 
   <?php   
   echo "$users_name";
   ?>
</h1>

<h2> Your game code id, 
    <?php 
      echo "$code"; 
     ?>
</h2> 
  <br><br><br>  
    <!--button to start game! -->
    <form action="PlayGame.php">
    <button type="submit" name="start" id="start" class="btn btn-success">Start Game!</button>
    </form>
    
    

</body>
</html>