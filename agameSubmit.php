<?php


  session_start();


//file to contain to database
require_once 'login.php';

//connect to database
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$score = 100; 
//echo "Connected successfully";
//echo "<br>"; 

//save categories inputs in variables

$name = $_POST['name']; 
$country = $_POST['country']; 
$color = $_POST['color']; 
$fruit = $_POST['fruit']; 
$animal = $_POST['animal']; 
$thing = $_POST['thing']; 
$city = $_POST['city']; 




/*
//check session users
echo "PLAYER ID: <br>"; 
echo  $_SESSION['username']; 
echo "CODE: <br>"; 
echo   $_SESSION['code']; 
echo "<br>"; 
*/
$playerID = $_POST['username'];
$code = $_POST['code']; 

// QUERY TO READ CODE FROM DATABASE **************************** TO SAVE TO NEW DATABASE

$categoryAnswers = array($name, $country, $color, $fruit, $animal, $thing, $city);
$arrlength = count($categoryAnswers);

for($x = 0; $x < $arrlength; $x++) {
	
     $categoryAnswers[$x];

}

echo "<br>"; 



//turn array into string to save database
$catArray = mysql_escape_string(serialize($categoryAnswers));
//echo $catArray; 


//unturn string into array to be readable 
$UnArray = unserialize(stripslashes($catArray)); 
for($x = 0; $x < $arrlength; $x++) {
	
    $UnArray[$x];
   
}



//insert data into database 
$sql = "INSERT INTO game (playerID, answers, score, code)
VALUES ('{$playerID}', '{$catArray}', '{$score}', '{$code}')";

//check if submition was successful 
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}


/*
//get value from stop column in stop table, default to 0
$results = mysqli_query($conn , "SELECT stop FROM game WHERE userID='{$playerID}' AND code='{$code}'");
 
 

//if form is submitted change stop value to 1 to set off timer for other players, 
 if(isset($_POST["stop"])){
   
  echo "user stop value"; 
  if($results == 0){
    $stop = 1; 
    echo "<br>"; 
    //update data into database           
     $sql = "UPDATE game SET stop = 1 
              WHERE playerID='{$playerID}' AND code='{$code}' ";
     //check if submition was successful 
if ($conn->query($sql) === TRUE) {
	//echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
    
  } else {
    echo "STOP"; 
  }
  
 }





*/





//close database connection
$conn->close();
?>



