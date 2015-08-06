<?php
	
		session_start(); 
	
require_once 'login.php';
require_once 'tracker.php'; 

	
 	$username = $_POST['username']; 
	$code = $_POST['code']; 

//get value of counter
$counter = $_POST['counter']; 
$counter1 = intval('$counter'); 


//if first round is being played
if($counter1 == 0){

	//get array for game
	$sql = "SELECT letterArray FROM letters WHERE code = '{$code}'";
	$result = $conn->query($sql);

	//check if code exist and array exist
	if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc(); 
	
	
	$serializedArray = $row["letterArray"]; 
 
   //echo $serializedArray; 
   

   
   //unserialized array from db
	$UnArray = unserialize(stripslashes($serializedArray)); 
	
	
		$letter = $UnArray[$counter1]; 
		echo $letter; 
		
	$_SESSION['letter'] = $letter; 	
		
 //no code found
} else {
    echo "0 results";
}

//for second and rest of rounds
} else if($counter1 < 26) {
	
	//increment value of counter to move through array
	$_SESSION['counter1'] = $counter1; 
	//echo $counter; 
	//echo "<br>"; 
	
	$sql = "SELECT letterArray FROM letters WHERE code = '{$code}'";
	$result = $conn->query($sql);

	
	if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc(); 
	
	$serializedArray = $row["letterArray"]; 

  // echo $serializedArray; 
   
   	$arrlength = count($serializedArray);
	   

	//   echo $arrlength; 
   
	$UnArray = unserialize(stripslashes($serializedArray)); 
	
	$letter = $UnArray[$counter1]; 
	echo $letter; 
	

	
	$_SESSION['letter'] = $letter; 	
}

} if($counter1 == 26){
	
	//show total score of all players!!!
	
}


	$sql = "INSERT INTO Answers (playerID, code, letter) VALUES ('{$username}', '{$code}', '{$letter}')";
		
//check if submition was successfull
if ($conn->query($sql) === TRUE) {
	//echo "New record created successfully";
} else {
	//echo "Error: " . $sql . "<br>" . $conn->error;
}







	?> 
