<?php


  session_start();


//file to contain to database
require_once 'login.php';
require_once 'tracker.php'; 



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



$playerID = $_SESSION['username'];
$code = $_SESSION['code']; 

$counter = $_SESSION['counter']; 
++$counter; 

$_SESSION['counter'] = $counter; 

echo "counter"; 
echo $counter; 

$letter = $_SESSION['letter'];

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
$sql = "UPDATE game SET answers = '{$catArray}', score = '{$score}', stop = '1' WHERE playerID= '{$playerID}' AND code= '{$code}'"; 


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

//get playersid and answers to compare 
$sql = "SELECT * FROM game WHERE code = '{$code}' AND letter = '{$letter}' AND playerID != '{$playerID}' ";
$result = $conn->query($sql);




if ($result->num_rows > 0) {
    // output data of each row
    $x = $result->num_rows; 
    
    echo "HOW MANY RESULTS!!?? " . $x . "<br>"; 
    for($i = 0; $i <= $x; $i++){
      
   $row = $result->fetch_assoc();
         
         echo "NUMBER OF PLAYERS  ". $x . "<br>"; 
         $player[$i] = $row["playerID"]; 
         $answers[$i] = $row["answers"]; 
         
         echo "CHECKCHECKCHECK HERE!!!";
         echo "<br>";
         echo "$player[$i]";
         echo "<br>";
         echo "$answers[$i]"; 

     
    }
    
    /*
       while($row = $result->fetch_assoc()) {
       $player_id[$result->num_rows] = $row["playerID"]; 
       $player_ans[$result->num_rows] = $row["answers"]; 
       $num_players[$result->num_rows]; 
       echo $$player_ans[$result->num_rows];
       echo "<br>"; 
    }
  */
} else {
    echo "0 results";
}

//unserialize answers from other player
   echo "player ONE  " . $player[0] . "answers ONE" . $answers[0] . "<br>"; 
   
   $playerAns = $answers[0]; 

   $OtherPlayerAns = unserialize(stripslashes($playerAns)); 
  
 /*  for($t = 0; $t < 7; $t++) {
	
   echo $UnArray[$t];
   echo "<br>"; 
   
} */
   
  // echo "player TWO  " . $player[1] . "answers TWO" . $answers[1] .  "<br>"; 



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
  
 /* //timer before starting next round 
echo "setInterval(function () { 
			document.getElementById('nextRound').submit();
      
        }, 10000);";
  */
  

  //count down, go to next round when countdown is over
echo "var count=10;"; 

echo "var counter=setInterval(timer, 1000);"; //1000 will  run it every 1 second

  echo "function timer()";
  echo "{";
  echo "count=count-1;";
  echo "if (count <= 0)";
  echo "{";
  echo " clearInterval(counter);";
  
  //go to next round when counter is over
  echo "document.getElementById('nextRound').submit();";

  echo "   return;";
  echo " }";
  //send countdown in seconds to html
echo "document.getElementById('demo').innerHTML=count + ' secs';";
  echo "}";
     
  echo "</script>";
  

  
echo "</head>"; 
echo "<body>"; 
    echo "<!-- banner -->"; 
    echo "<div class='container'>"; 
    echo "<div class='jumbotron'>"; 
     echo " <h1>STOP Game! </h1>"; 
     echo "<p> Player ID: " . $playerID . " </p> "; 
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

//check if color answer exist in database

$UnArray = unserialize(stripslashes($catArray)); 
 
$sql = "SELECT * FROM Colors WHERE Name = '{$color}' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  // echo "element exitst"; 
   $colorExists = 10; 
} else {
    echo "0 results";
    $colorExists = 0; 
}


//check if animals answer exist in database
$sql = "SELECT * FROM Animals WHERE name = '{$animal}' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  // echo "element exitst"; 
   $animalExists = 10; 
} else {
    echo "0 results";
    $animalExists = 0; 
}
 
 
 //check if countries answer exist in database
$sql = "SELECT * FROM Countries WHERE Name = '{$country}' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  // echo "element exitst"; 
   $countryExists = 10; 
} else {
    echo "0 results";
    $countryExists = 0; 
}


//check if fruits answer exist in database
$sql = "SELECT * FROM Fruits WHERE Name = '{$fruit}' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  // echo "element exitst"; 
   $fruitExists = 10; 
} else {
    echo "0 results";
    $fruitExists = 0; 
}


//check if sports answer exist in database
$sql = "SELECT * FROM Sports WHERE Name = '{$sport}' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  // echo "element exitst"; 
   $sportsExists = 10; 
} else {
    echo "0 results";
    $sportsExists = 0; 
}
 
 
 
 //Calcualte Total 
$total = $countryExists + $animalExists + $colorExists + $fruitExists  + $sportsExists; 

//compare players answers!! get back index where things match 

/*
//CHECKCHECKCHECK CHECK CHECK C*******
echo $UnArray; 
echo "<br>"; 
echo $OtherPlayerAns; 
*/




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
       echo " <td> " .  $UnArray[0] . "</td>";  //name
       echo "  <td> ".    $UnArray[1]  . "<br>" . $countryExists . " </td>";//country
       echo "  <td> ".   $UnArray[2] . "<br>" . $colorExists . " </td>"; //color
        echo "     <td>    ".    $UnArray[3] . "<br>" .  $fruitExists . "</td>";  //fruit
       echo "  <td>      ".    $UnArray[4] . "<br>" .  $animalExists . "</td>"; //animal
       echo "  <td>  ".    $UnArray[5]  . "</td>";  //thing
       echo "  <td>  ".    $UnArray[6] . "<br>" .  $sportsExists . "</td>"; //sport
          echo "  <td>  " . $total . "<br>" . $total . "</td>"; //score
      echo " </tr>";
    echo " </tbody>";
  echo " </table>";
 echo "</div>"; 
   

   
echo "Next round in ..."; 
echo "<p id='demo'></p>";
	
  

$conn->close();

echo "<br><br><br>"; 
    
    echo "<!--button to start game! -->"; 
    echo " <form action='playGame.php' id= 'nextRound' method = 'post'>";
     echo "<button type='submit' class='btn btn-success' id='nextL' name = 'nextL'>Next Letter</button>";
    echo " </form>"; 
    
     
echo "<div id='div1'></div>"; 

echo "</body>"; 
echo "</html>"; 
?>