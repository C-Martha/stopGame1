<?php


//file to contain to database
require_once 'login.php';

//connect to database
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

echo "Connected successfully";

//save categories inputs in variables

$name = $POST['username']; 
$country = $POST['country']; 
$color = $POST['color']; 
$fruit = $POST['fruit']; 
$animal = $POST['animal']; 
$thing = $POST['thing']; 


function randomCodeGenerator()

//create array

//insert data into database 
$sql = "INSERT INTO game (Code, UserID, Score)
VALUES (NULL, '{$username}', '{$answer1}', '{$score}')";

//check if submition was successful 
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

//close database connection
$conn->close();
?>

