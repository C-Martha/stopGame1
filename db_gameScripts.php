<?php

$dbhost = '50.62.209.47:3306';
$dbuser = 'stop_game';
$dbpass = 'K1234567';
$dbname = 'stopgame_';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "Connected successfully";

$username = $POST['username']; 
$answer1 = $POST['answer1']; 
$score = $POST['timer']; 


//insert data into database 
$sql = "INSERT INTO game (playerID, username, score)
VALUES (NULL, '{$username}', '{$answer1}' , '{$score}')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

