<?php
	
	//file to connect to database
require_once 'login.php';



	
	

 $alphabet = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
 // $arrlength = count($alphabet);
	
  $newArray =  shuffle($alphabet);

  $SnewArray = mysql_escape_string(serialize($newArray));


  $sql = "INSERT INTO letters (letterArray, code)  VALUES ('{$SnewArray}', '{$code}')"; 
    
   //check if submition was successfull
if ($conn->query($sql) === TRUE) {
	echo "RANDOM LETTERS SUBMITTED SUCCESSFULLY";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

    


$conn->close();
?>
