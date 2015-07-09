<?php

//file to connect to databse
require_once 'login.php';

//connect to database

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "Connected successfully";

$userID = $_POST['username']; 
$code = ''; 


//generate random word for code 

function generateRandomString($length = 5) {
   return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    
}

// Echo the random string.
//echo "<br>"; 
$code = generateRandomString($length = 5);
//echo $code; 
//echo "<br>"; 

 


//insert data into database 
$sql = "INSERT INTO leaderboard (Code, UserID, Score)
VALUES ('{$code}', '{$userID}', NULL)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


<!-- HTML output -->
<!DOCTYPE html>
<html lang = "en">
<head>
<title>Play Game</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- banner -->
    <div class="container">
    <div class="jumbotron">
      <h1>Play STOP! </h1>
      <p> </p> 
    </div>
    <br><br><br><br>
    <!-- output userinfo -->
<h2> Welcome, <?php 
    echo $userID;
     ?> </h2>
<h1> Code is: <?php 
    echo $code; 
    ?> </h1>
    
    <!-- check database if another user has the same code (loop) -->
<p>Waiting for other players to join...</p>

<form action="PlayGame.html">
    <button type="submit" class="btn btn-success">PLAY!</button>
</form>


</body>
</html>