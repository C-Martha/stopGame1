<?php
	
	require_once('login.php');
	
	session_start();
	
	$alphabet = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
	$arrlength = count($alphabet);
	
	echo  $arrlength; 
	echo "<br>"; 
	
	
	shuffle($alphabet);
		
	for($x = 0; $x < $arrlength; $x++) {
	
    echo $alphabet[$x];

	}


//turn array into string to save database
$catArray = mysql_escape_string(serialize($alphabet));
echo $catArray; 


 $UnArray = unserialize(stripslashes($catArray)); 

for($x = 0; $x < $arrlength; $x++) {
	
    echo $UnArray[$x];
	echo "<br>"; 

	}
	?>