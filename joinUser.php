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
if(isset($_POST['submitJoin']))
{
    $users_name = mysqli_real_escape_string($conn, $_POST['usernameJ']); 
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
    
    

}


 if (isset($_POST["usernameJ"]) & isset($_POST['submitJoin']) == NULL )
{
	
	//trim and lowercase username
	$username =  strtolower(trim($_POST["usernameJ"])); 

	//check username in db
	$results = mysqli_query($conn ,"SELECT ID FROM leaderboard WHERE userID='{$username}'");
	
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	
	//if value is more than 0, username is not available
	if($username_exist) 
        {
		  die ('<img src="imgs/not-available.png" />');
        } else
        {
		  die ('<img src="imgs/available.png" />');
        }
    
    
}



 if (isset($_POST["code"]) & isset($_POST['submitJoin']) == NULL )
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
		    die ('<img src="imgs/available.png" />');
        } else
        {
		   die ('<img src="imgs/not-available.png" />');
        }
  
}



$_SESSION['counter'] = 0;



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
  
  
  
 <!--check if all players are present to start game -->
  <script>
if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("waiting.php");
    
    source.onmessage = function(event) {
        document.getElementById("result").innerHTML += event.data + "<br>";
        
        document.getElementById('startGame').submit();
        
    };
} else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
}
</script>
  
  
  
</head>
<body>
    <!-- banner -->
    <div class="container">
    <div class="jumbotron">
      <h1>STOP Game!</h1>
      <p> Player ID: <?php echo $users_name ?></p> 
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
    
    <!--button to start game! -->
    <form action="PlayGame.php" id= "startGame" method ="post">
    <button type="submit" name="start" id="start" class="btn btn-success">Start Game!</button>
    </form>
    
    <div id="result"></div> 

</body>
</html>
