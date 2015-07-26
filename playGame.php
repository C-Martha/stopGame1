<?php
	
require_once 'login.php';


	session_start(); 
	
	
	$alphabet = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
	$arrlength = count($alphabet);
	
	 shuffle($alphabet);

//go through randomized array

	static $i; 
	
	for($i = 0; $i < $arrlength; $i++){
		
	echo $alphabet[$i];
	
	}
	
 	$username = $_SESSION['username']; 
	$code = $_SESSION['code']; 
	

		
	$sql = "INSERT INTO game (playerID, code) VALUES ('{$username}', '{$code}')";
		
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
		

			document.getElementById("game").submit();

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
			<p> </p> 
		</div>

	<p id="demo"></p>

		
			
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
	




	</body>
	</html>

