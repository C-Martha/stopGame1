<?php


  session_start();


//file to contain to database
require_once 'login.php';
require_once 'tracker.php'; 


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
$sport = $_POST['sport']; 

/*
//check session users
echo "PLAYER ID: <br>"; 
echo  $_SESSION['username']; 
echo "CODE: <br>"; 
echo   $_SESSION['code']; 
echo "<br>"; 
*/
$playerID = $_SESSION['username'];
$code = $_SESSION['code']; 

// QUERY TO READ CODE FROM DATABASE **************************** TO SAVE TO NEW DATABASE

$categoryAnswers = array($name, $country, $color, $fruit, $animal, $thing, $sport);
$arrlength = count($categoryAnswers);

for($x = 0; $x < $arrlength; $x++) {
	
     $categoryAnswers[$x];

}

echo "<br>"; 



//turn array into string to save database
$catArray = mysql_escape_string(serialize($categoryAnswers));
//echo $catArray; 



//insert data into database 
$sql = "UPDATE game SET answers = '{$catArray}', score = '{$score}', stop = '0' WHERE playerID= '{$playerID}' AND code= '{$code}'"; 



//check if submition was successfull
if ($conn->query($sql) === TRUE) {
	//echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "SELECT playerID, answers FROM game WHERE code = '{$code}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["playerID"]. " - Answers: " . $row["answers"]. "<br>";
    }
} else {
    echo "0 results";
}

//HTML 

echo "<!DOCTYPE html>"; 
echo "<html lang = 'en'>"; 
echo "<head>"; 
echo "<title>STOP Game</title>"; 

  echo "<meta name='viewport' content='width=device-width, initial-scale=1'>"; 
 echo  "<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>"; 
  echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>"; 
  echo "<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>"; 
  
  
  echo "<!--connect to css page-->"; 
  echo "<link rel='stylesheet' type='text/css' href='game.css'>"; 
  
  
  echo "<script>";
  
  echo "$('#div1').load('index.html #pi');";
  

     
  echo "</script>";
  
  
  
echo "</head>"; 
echo "<body>"; 
    echo "<!-- banner -->"; 
    echo "<div class='container'>"; 
    echo "<div class='jumbotron'>"; 
     echo " <h1>STOP Game! </h1>"; 
     echo "<p> </p> "; 
   echo " </div>"; 
    echo "<br><br><br><br>"; 
    echo "<!-- output userinfo -->"; 


/*
//unturn string into array to be readable 
$UnArray = unserialize(stripslashes($catArray)); 
for($x = 0; $x < $arrlength; $x++) {
	
    $UnArray[$x];
   
}

*/

//check if sport answer exist in database
$sql = "SELECT * FROM Colors WHERE name = '{$color}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  // echo "element exitst"; 
   $colorExists = 10; 
} else {
    echo "0 results";
    $colorExists = 0; 
}
 
 $UnArray = unserialize(stripslashes($catArray)); 

 //AND MAX(timeAdded) 
 
 //Calcualte Total 
 //$total = $sqlScore + $nameExist + $countryExist + $animalExist + $coloExist + $FruitExisst + $thingExist + $sportsExist; 


echo "<div class='container'>"; 
  echo "<h2>  <p>  Answers for, ";  
  
   echo $playerID; 
   echo "</p>  </h2>"; 
          
  echo "<table class='table'>"; 
    echo " <thead>";
      echo " <tr>";
       echo "  <th>Name</th>";
        echo " <th>Country</th>";
        echo " <th>Color</th>";
        echo "  <th>Fruit</th>";
        echo " <th>Animal</th>";
        echo " <th>Thing</th>";
       echo "  <th>Sports</th>";
      echo "  <th>Total</th>";
      echo " </tr>";
   echo "  </thead>";
   echo "  <tbody>";
      echo " <tr class='success'>";
       echo " <td> " .  $UnArray[0] . "</td>";
       echo "  <td> ".    $UnArray[1]  ." </td>";
       echo "  <td> ".   $UnArray[2] . "<br>" . $colorExists . " </td>";
        echo "     <td>    ".    $UnArray[3] . "</td>";
       echo "  <td>      ".    $UnArray[4] . "</td>";
       echo "  <td>  ".    $UnArray[5] .   "</td>";
       echo "  <td>  ".    $UnArray[6]  . "</td>";
          echo "  <td>  ".  $score ."</td>";
      echo " </tr>";
    echo " </tbody>";
  echo " </table>";
 echo "</div>"; 
    


	
  

$conn->close();

echo "<br><br><br>"; 
    
    echo "<!--button to start game! -->"; 
    echo " <form action='playGame.php' method = 'post'>";
     echo "<button type='submit' class='btn btn-success' id='nextL' name = 'nextL'>Next Letter</button>";
    echo " </form>"; 
    
        
echo "<div id='div1'></div>"; 

echo "</body>"; 
echo "</html>"; 
?>