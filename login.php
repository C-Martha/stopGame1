<?php
	
	
//database info 
$dbhost = '50.62.209.47:3306';
$dbuser = 'stop_game';
$dbpass = 'K1234567';
$dbname = 'stopgame_';


// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
	
?>