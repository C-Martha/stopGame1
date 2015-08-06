<?php
	
		session_start(); 
	
require_once 'login.php';
require_once 'tracker.php'; 

	
 	$username = $_SESSION['username']; 
	$code = $_SESSION['code']; 

//get value of counter
$counter = $_SESSION['counter']; 



//if first round is being played
if($counter == 0){

	//get array for game
	$sql = "SELECT letterArray FROM letters WHERE code = '{$code}'";
	$result = $conn->query($sql);

	//check if code exist and array exist
	if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc(); 
	
	
	$serializedArray = $row["letterArray"]; 
	echo "serialized ARRY";
	echo "<br>"; 
   echo $serializedArray; 
   

   
   //unserialized array from db
	$UnArray = unserialize(stripslashes($serializedArray)); 
	
	echo "letter"; 
	echo "<br>"; 
	echo $UnArray[$counter]; 
		$letter = $UnArray[$counter]; 
		
		
	$_SESSION['letter'] = $letter; 	
		
 //no code found
} else {
    echo "0 results";
}

//for second and rest of rounds
} else if($counter < 26) {
	
	//increment value of counter to move through array
	$_SESSION['counter'] = $counter; 
	echo $counter; 
	echo "<br>"; 
	
	$sql = "SELECT letterArray FROM letters WHERE code = '{$code}'";
	$result = $conn->query($sql);

	
	if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc(); 
	
	$serializedArray = $row["letterArray"]; 
	echo "serialized ARRY";
	echo "<br>"; 
   echo $serializedArray; 
   
   	$arrlength = count($serializedArray);
	   
	   echo "length";
	   echo $arrlength; 
   
	$UnArray = unserialize(stripslashes($serializedArray)); 
	echo "<br>"; 
	echo "letter"; 
	echo "<br>"; 
	$letter = $UnArray[$counter]; 
	echo $letter; 
	

	
	
	$_SESSION['letter'] = $letter; 	
}

} if($counter == 26){
	
	//show total score of all players!!!
	
}



	$sql = "INSERT INTO game (playerID, code, letter) VALUES ('{$username}', '{$code}', '{$letter}')";
		
//check if submition was successfull
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

	?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Stop!</title>
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	  <link rel="stylesheet" type="text/css" href="register.css">
	  

		  
<!-- check value of stop, to see if user has finished -->
<script>
if(typeof(EventSource) != "undefined") {
	//file where events are coming from
    var source = new EventSource("stop.php");
    source.onmessage = function(event) {
		
        document.getElementById("halt").innerHTML += event.data + "<br>";
		

     
var count=5;

var counter=setInterval(timer, 1000); //1000 will  run it every 1 second

  function timer()
 {
 count=count-1;
  if (count <= 0)
  {
  clearInterval(counter);
  
  //go to next round when counter is over
document.getElementById("game").submit();

   return;
}
  //send countdown in seconds to html
document.getElementById('demo').innerHTML=count + ' secs';
}
			

    };

} else {
    document.getElementById("halt").innerHTML = "Sorry, your browser does not support server-sent events...";
}
</script>
	  
  
	  
</head>
<body>
	


<!-- banner (make it nice!) -->

	<div class="container">
		<div class="jumbotron">
			<h1>Play STOP! </h1>
			<p> Player ID: <?php echo $username ?> </p> 
		</div>

	<!-- <p id="demo"></p>-->

		
			
			<br><br><br><br><br>
	<!-- Categories inputs --> 
		<div class="row">
			<div class="container">
				<form action="gameSubmit.php" id="game" method="post">
					<div class="col-sm-2"> <!-- size of colum across page -->
						<div id = "text">Name</div><br>
						<input type="text" id="name" name="name" placeholder="Name">
						<br>
					</div>
					<div class="col-sm-2">
						<div id = "text">Country</div><br>
						<input type="text" id="country" name="country" placeholder="Country">
						<br><br>
					</div>
					<div class="col-sm-2">
						<div id = "text">Color</div><br>
						<input type="text" id="color" name="color" placeholder="Color">
						<br><br>
					</div>
					<div class="col-sm-2">
						<div id = "text">Fruit</div><br>
						<input type="text" id="fruit" name="fruit" placeholder="Fruit">
						<br><br>
					</div>
					<div class="col-sm-2">
						<div id = "text">Animal</div><br>
						<input type="text" id="animal" name="animal" placeholder="Animal">
						<br><br>
					</div>
					<div class="col-sm-2">
						<div id = "text">Sport</div><br>
						<input type="text" id="sport" name="sport" placeholder="Sport">
						<br><br>
					</div>
					<div class="col-sm-2">
						<div id = "text">Thing</div><br>
						<input type="text" id="thing" name="thing" placeholder="Thing">
						<br><br>
		
		<!--submit button (needs to start timer) -->
					</div>
					<br><br><br><br><br>
					
					<button type="submit" value="submit" id="stop" name="stop" class="col-sm-12 btn btn-danger">STOP!</button>
				</div>
			</form>
		</div>
		
		
		
		<div id="halt"></div>
		
		
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	


<p> STOP!!! ... </p> 
<p id='demo'></p>

	</body>
	</html>

