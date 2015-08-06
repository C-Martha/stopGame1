<?php
	
    session_start(); 
    
	//file to contain to database
require_once 'login.php';
require_once 'tracker.php';
	
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

$code = $_SESSION['code']; 
$letter =  $_SESSION['letter']; 


$stop = "SELECT COUNT(*) FROM Answers WHERE code = '{$code}' AND letter = '{$letter}' ";

$result = $conn->query($stop); 


$total = $result->num_rows; 

//echo "data: total players  " . $total . "\n\n"; 



$sql = "SELECT COUNT(*) FROM Answers WHERE code = '{$code}' AND letter = '{$letter}' AND stop = '1' ";


$result2 = $conn->query($sql); 


$total1 = $result2->num_rows; 

//echo "data: total done  " .  $total1 . "\n\n"; 

         
         if($total == $total1){
             
         echo "data: Waiting for all players countdown to finish! \n\n"; 
         
         } 
           

   
$conn->close();


flush();



?>