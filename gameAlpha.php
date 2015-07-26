<?php
	
	//file to connect to database
require_once 'login.php';



	
	$alphabet = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
	$arrlength = count($alphabet);
	
	shuffle($alphabet);

//go through randomized array
	for($i = 0; $i < $arrlength; $i++){
		
	echo $alphabet[$i];
	
	}
	
	echo "<br>"; 
	
	$pick = "Abbot"; 

	//check username in db
	$results = mysqli_query($conn ,"SELECT cID FROM City WHERE A ='{$pick}'");
	
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	
	//if value is more than 0, username is not available
	if($username_exist) 
        {
			echo "no found"; 
        } else
        {
		  echo "found"; 
        }
    
    


$conn->close();
?>
