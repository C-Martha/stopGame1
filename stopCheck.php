<?php
    
    
      session_start(); 
    
	//file to contain to database
require_once 'login.php';
require_once 'tracker.php';

  
$name = $_POST['name']; 
$country = $_POST['country']; 
$color = $_POST['color']; 
$fruit = $_POST['fruit']; 
$animal = $_POST['animal']; 
$thing = $_POST['thing']; 
$sport = $_POST['sport']; 



$playerID = $_SESSION['username'];
$code = $_SESSION['code']; 
$letter = $_SESSION['letter'];


//insert data into database 
$sql = "UPDATE Answers SET name = '{$name}', country = '{$country}', animal = '{$animal}', fruit = '{$fruit}', sport = '{$sport}', color = '{$color}', thing = '{$thing}', stop = '1'
WHERE playerID= '{$playerID}' AND code= '{$code}' "; 


//check if submition was successfull
if ($conn->query($sql) === TRUE) {
 //   echo "New record created successfully";
} else {
	//echo "Error: " . $sql . "<br>" . $conn->error;
}


   
$sql = "SELECT userID, score FROM leaderboard WHERE code = '{$code}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        
        echo "Player: " . $row["userID"]. " - Total score: " . $row["score"]. "<br>"; 
     
    }
} else {
   // echo "0 results";
}

    $conn->close();
    
    ?>


<!DOCTYPE html>
<html>
	<head>
	<script>
if(typeof(EventSource) != "undefined") {
	//file where events are coming from
    var source = new EventSource("next.php");
    source.onmessage = function(event) {
		
        document.getElementById("halt").innerHTML += event.data + "<br>";
		
       setTimeout(function () { 
			
			document.getElementById('game').submit();
      
        }, 5000);
       // document.getElementById('game').submit();
    };

} else {
    document.getElementById("halt").innerHTML = "Sorry, your browser does not support server-sent events...";
}
</script>
	  	
	<style>
body {
    background-color: #AFEBFF;
}
 </style>	
</head>
<body >




<form action="gameSubmit.php" id="game" method="post">
	
</form>


<div id = "halt" > </div>

</body>
</html>