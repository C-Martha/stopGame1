<?php


  session_start();


//file to contain to database
require_once 'login.php';
require_once 'tracker.php'; 



//echo "Connected successfully";
//echo "<br>"; 

//save categories inputs in variables
/*
$name = $_POST['name']; 
$country = $_POST['country']; 
$color = $_POST['color']; 
$fruit = $_POST['fruit']; 
$animal = $_POST['animal']; 
$thing = $_POST['thing']; 
$sport = $_POST['sport']; 
*/


$playerID = $_SESSION['username'];
$code = $_SESSION['code']; 

$counter = $_SESSION['counter']; 
++$counter; 

$_SESSION['counter'] = $counter; 

//echo "counter"; 
//echo $counter; 

$letter = $_SESSION['letter'];

// QUERY TO READ CODE FROM DATABASE **************************** TO SAVE TO NEW DATABASE

/*
$categoryAnswers = array($name, $country, $color, $fruit, $animal, $thing, $sport);
$arrlength = count($categoryAnswers);

for($x = 0; $x < $arrlength; $x++) {
	
     $categoryAnswers[$x];

}

echo "<br>"; 



//turn array into string to save database
$catArray = mysql_escape_string(serialize($categoryAnswers));
//echo $catArray; 

*/

/*insert data into database 
$sql = "UPDATE Answers SET name = '{$name}', country = '{$country}', animal = '{$animal}', fruit = '{$fruit}', sport = '{$sport}', color = '{$color}', thing = '{$thing}', stop = '1'
WHERE playerID= '{$playerID}' AND code= '{$code}' "; 


//check if submition was successfull
if ($conn->query($sql) === TRUE) {
	//echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}


*/




$sql = "SELECT name, country, animal, fruit, sport, color, thing, score FROM Answers 
WHERE code = '{$code}' AND playerID = '{$playerID}' AND letter = '{$letter}'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $name = $row["name"]; 
          $country = $row["country"]; 
           $animal = $row["animal"]; 
            $fruit = $row["fruit"]; 
             $sport = $row["sport"]; 
              $color = $row["color"]; 
               $thing = $row["thing"]; 
                $score = $row["score"]; 
    }
} else {
    echo "0 results";
}




/*


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
  


//echo "<script>"; 

  //count down, go to next round when countdown is over
//echo "var count=10;"; 

///echo "var counter=setInterval(timer, 1000);"; //1000 will  run it every 1 second

 // echo "function timer()";
 // echo "{";
 // echo "count=count - 1;";
 // echo "if (count <= 0)";
 // echo "{";
 // echo " clearInterval(counter);";
  
  //go to next round when counter is over
  //echo "document.getElementById('nextRound').submit();";

  //echo "   return;";
  //echo " }";
  //send countdown in seconds to html
//echo "document.getElementById('demo').innerHTML= count + ' secs';";
 // echo "}";
     
  //echo "</script>";
  

//echo "<script>";
	
	/*
echo "if(typeof(EventSource) != 'undefined') {";
	//file where events are coming from
   echo " var source = new EventSource('mis.php');";
   echo " source.onmessage = function(event) {"; 
		
   
        echo "document.getElementById('totalScore').innerHTML += event.data + '<br>';"; 
           
           
       echo "source.close();";
      

   echo " };"; 

   echo "} else {"; 
      echo " document.getElementById('totalScore').innerHTML = 'Sorry, your browser does not support server-sent events...';";
   echo "}";





   echo "</script>";
   
   */
   
 


  
  echo "<style>";
	
	
		
	echo "#letters {text-align:center; color: #660066;}";
		
	echo "#text {color: #FF0066; }";
	
  echo " #info {color: #FF0066; }";
  
    echo "#cat {color: #FF0066; }";
    
    echo "h2  {color: #FF0066; }"; 
	
	echo "</style>";
  
  
  
echo "</head>"; 
echo "<body>"; 
    echo "<!-- banner -->"; 
    echo "<div class='container'>"; 
    echo "<a href= 'index.html'>"; 
    echo "<div class='jumbotron'>"; 
     echo " <h1>STOP Game! </h1>"; 
     echo "<p> Player ID: " . $playerID . " </p> "; 
     echo "</a>";
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

//Compare answers between players 

//compare country  with other player answers
$sqlCountry = "SELECT country FROM Answers WHERE code = '{$code}' AND letter = '{$letter}' 
                AND playerID != '{$playerID}' AND country = '{$country}' ";
$resultCountry = $conn->query($sqlCountry);

if ($resultCountry->num_rows > 0) {
  
  $countryMatches = '5'; 
  
} else {
  
  $countryMatches = '0'; 
  
}

//compare color with other player answers
$sqlColor = "SELECT color FROM Answers WHERE code = '{$code}' AND letter = '{$letter}' 
              AND playerID != '{$playerID}'  AND color = '{$color}' ";
$resultColor = $conn->query($sqlColor);

if ($resultColor->num_rows > 0) {
  
  $colorMatches = '5'; 
  
} else {
  
  $colorMatches = '0'; 
  
}


//compare fruit  with other player answers
$sqlFruit = "SELECT fruit FROM Answers WHERE code = '{$code}' AND letter = '{$letter}'
               AND playerID != '{$playerID}'  AND fruit = '{$fruit}' ";
$resultFruit = $conn->query($sqlFruit);

if ($resultFruit->num_rows > 0) {
  
  $fruitMatches = '5'; 
  
} else {
  
  $fruitMatches = '0'; 
  
}



//compare animal  with other player answers
$sqlAnimal = "SELECT animal FROM Answers WHERE code = '{$code}' AND letter = '{$letter}' 
              AND playerID != '{$playerID}'  AND animal = '{$animal}'";
$resultAnimal = $conn->query($sqlAnimal);

if ($resultAnimal->num_rows > 0) {
  
  $animalMatches = '5'; 
  
} else {
  
  $animalMatches = '0'; 
  
}


//compare sport  with other player answers
$sqlSport = "SELECT sport FROM Answers WHERE code = '{$code}' AND letter = '{$letter}' 
              AND playerID != '{$playerID}'  AND sport = '{$sport}' ";
$resultSport = $conn->query($sqlSport);

if ($resultSport->num_rows > 0) {
  
  $sportMatches = '5'; 
  
} else {
  
  $sportMatches = '0'; 
  
}





//check that name answer starts with letter of current round
$letterName =  strncasecmp ( $name, $letter, 1 ); 

//if letterName is zero then word does start with given letter
if($letterName == 0 ){
  
  //check answers against other players
  $sqlName = "SELECT name FROM Answers WHERE code = '{$code}' AND letter = '{$letter}' 
              AND playerID != '{$playerID}'  AND sport = '{$thing}' ";
$resultName = $conn->query($sqlName);

if ($resultName->num_rows > 0) {
  
  $nameMatches = '5'; 
  
} else {
  
  $nameMatches = '10'; 
  
}
  
} else {
  
  $nameMatches = '0'; 
  
  
}





//check that thing answer starts with letter of current round

$letterThing =  strncasecmp ( $thing, $letter, 1 ); 
//if letterThing is zero then word does start with given letter
if($letterThing == 0 ){
  
  $sqlThing = "SELECT thing FROM Answers WHERE code = '{$code}' AND letter = '{$letter}' 
              AND playerID != '{$playerID}'  AND sport = '{$thing}' ";
$resultThing = $conn->query($sqlThing);

if ($resultThing->num_rows > 0) {
  
  $thingMatches = '5'; 
  
} else {
  
  $thingMatches = '10'; 
  
}
  
} else {
  
  $thingMatches = '0'; 
  
  
}



//check that answer for color starts with the letter of the current round
$letterColor =  strncasecmp ( $color, $letter, 1 ); 

if($letterColor == 0){
  
  
//check if color answer exist in database

//$UnArray = unserialize(stripslashes($catArray)); 
 
$sql = "SELECT * FROM Colors WHERE Name = '{$color}' ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  // echo "element exitst"; 
   $colorExists = 10 - $colorMatches; 
} else {
  
    $animalExists = 0; 

}
  
  
} else {
  
      $colorExists = 0; 
}




// check if animal answers starts with letter of current round
$letterAnimal =  strncasecmp ( $animal, $letter, 1 ); 

if($letterAnimal == 0){
  
 
//check if animals answer exist in database
$sql = "SELECT * FROM Animals WHERE name = '{$animal}' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  // echo "element exitst"; 
   $animalExists = 10 - $animalMatches; 
} else {

    $animalExists = 0; 
}
 
  
  
} else {
  
    $animalExists = 0; 
}



 
 
 //*********************************************************************************
//check that answers start with letter of current round
 $letterCountry = strncasecmp ( $country , $letter, 1 );


if($letterCountry == 0){  // 0 if first letter matches current letter of round
 
 //check if countries answer exist in database
$sql = "SELECT * FROM Countries WHERE Name = '{$country}' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  // echo "element exitst"; 
   $countryExists = 10 - $countryMatches; 
   
} else {
   
    $countryExists = 0; 
}


}else {
   $countryExists = 0; 
} 


//first check that fruit answer starts with letter of current round
$letterFruit =  strncasecmp ( $fruit, $letter, 1 ); 

if($letterFruit == 0){
  
  
  
//check if fruits answer exist in database
$sql = "SELECT * FROM Fruits WHERE Name = '{$fruit}' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  // echo "element exitst"; 
   $fruitExists = 10 - $fruitMatches; 
} else {

    $fruitExists = 0; 
}
  
  
} else {
  
  $fruitExists = 0; 
}

//check that sport answer starts with letter of proper round
$letterSport =  strncasecmp ( $sport, $letter, 1 ); 

if($letterSport == 0){
  
  //check if sports answer exist in database
$sql = "SELECT * FROM Sports WHERE Name = '{$sport}' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
  // echo "element exitst"; 
   $sportsExists = 10 - $sportMatches;
} else {
   
    $sportsExists = 0; 
}
  
} else {
  
      $sportsExists = 0; 
}



 
 
 //Calcualte Total 
$total = $countryExists + $animalExists + $colorExists + $fruitExists  + $sportsExists + $thingMatches + $nameMatches; 

//compare players answers!! get back index where things match 

/*
//CHECKCHECKCHECK CHECK CHECK C*******
echo $UnArray; 
echo "<br>"; 
echo $OtherPlayerAns; 
*/


//insert calculated score into database 

$sql = "UPDATE Answers SET score = '{$total}' WHERE playerID = '{$playerID}' AND code = '{$code}' AND letter = '{$letter}'";

if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "SELECT SUM(score) AS value_sum FROM Answers WHERE code = '{$code}' AND playerID = '{$playerID}'  ";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     
        $totalScore = $row["value_sum"]; 
    }
} else {
    echo "0 results";
}


//echo $totalScore; 



$sql = "UPDATE leaderboard SET score = '{$totalScore}' WHERE userID = '{$playerID}' AND code = '{$code}' ";

if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}





/*
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "score: " . $row["score"] . "<br>"; 
    }
} else {
    echo "0 results";
}
*/

echo "<h2 id = 'letters' > Letter: " . $letter . "</h2>"; 

echo "<div class='container'>"; 
  echo "<h3 id = 'info'> Your Answers, ";  
  
   echo $playerID; 
   echo " </h3>"; 
   
   echo "<br>"; 
   
  echo "<table class='table'>"; 
    echo " <thead>";
      echo " <tr>";
      echo "<th id='cat'> L </th>"; 
       echo "  <th id='cat'>Name</th>";
        echo " <th id='cat'>Country</th>";
        echo " <th id='cat'>Color</th>";
        echo "  <th id='cat'>Fruit</th>";
        echo " <th id='cat'>Animal</th>";
        echo " <th id='cat'>Thing</th>";
       echo "  <th id='cat'>Sports</th>";
      echo "  <th id='cat'>Round Score</th>";

      echo " </tr>";
   echo "  </thead>";
   echo "  <tbody>";
      echo " <tr class='success'>";
        echo " <td> " .  $letter . "</td>";  //name
       echo " <td> " .  $name . "<br>" . $nameMatches . "</td>";  //name
       echo "  <td> ".    $country . "<br>" . $countryExists . " </td>";//country
       echo "  <td> ".   $color . "<br>" . $colorExists . " </td>"; //color
        echo "     <td>    ".    $fruit . "<br>" .  $fruitExists . "</td>";  //fruit
       echo "  <td>      ".    $animal . "<br>" .  $animalExists . "</td>"; //animal
       echo "  <td>  ".    $thing  . "<br>" . $thingMatches .  "</td>";  //thing
       echo "  <td>  ".    $sport . "<br>" .  $sportsExists . "</td>"; //sport
          echo "  <td>  " . "<br>" . $total  . "</td>"; //score
            
      echo " </tr>";
    echo " </tbody>";
  echo " </table>";
 echo "</div>"; 
   


echo "<br>"; 
echo "<br>"; 

$sqlOtherAns = "SELECT * FROM Answers WHERE code = '{$code}' AND letter = '{$letter}' AND playerID != '{$playerID}' "; 
$resultOtherAns = $conn->query($sqlOtherAns); 
$total = $resultOtherAns->num_rows; 

for($j = 0; $j < $total; ++$j){
  
  $row = $resultOtherAns->fetch_array(MYSQLI_ASSOC); 
  
  
  
  echo "<div class='container1'>"; 
  echo "<h3>  <p>  Other players Answers, ";  
  
   echo $row['playerID']; 
   echo "</p>  </h3>"; 
          
  echo "<table class='table'>"; 
    echo " <thead>";
      echo " <tr>";
       echo " <th id='cat'> L </th>"; 
       echo "  <th id='cat'>Name</th>";
        echo " <th id='cat'>Country</th>";
        echo " <th id='cat'>Color</th>";
        echo "  <th id='cat'>Fruit</th>";
        echo " <th id='cat'>Animal</th>";
        echo " <th id='cat'>Thing</th>";
       echo "  <th id='cat'>Sports</th>";
      echo "  <th id='cat'>Round Score</th>";

      echo " </tr>";
   echo "  </thead>";
   echo "  <tbody>";
      echo " <tr class='success'>";
      echo " <td > " .  $row['letter'] . "</td>";  //name
       echo " <td > " .  $row['name'] . "</td>";  //name
       echo "  <td > " .    $row['country'] .  " </td>";//country
       echo "  <td > " .   $row['color'] .  " </td>"; //color
        echo "  <td >    " .    $row['fruit'] . "</td>";  //fruit
       echo "  <td >      " .     $row['animal'] .  "</td>"; //animal
       echo "  <td >  " .    $row['thing']  . "</td>";  //thing
       echo "  <td >  " .    $row['sport'] .  "</td>"; //sport
       echo "  <td >  " . $row['score'] . "</td>"; //score
   
      echo " </tr>";
    echo " </tbody>";
  echo " </table>";
 echo "</div>"; 
  
  
 
  
}


/*

$sql = "SELECT userID, score FROM leaderboard WHERE code = '{$code}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        
        echo "Player: " . $row["userID"]. " - Total score: " . $row["score"]. "<br>"; 
     
    }
} else {
   // echo "0 results";
}

echo "<div id = 'totalScore'></div>"; 
*/

//print out total score 

   
//echo "Next round in ...   <h3 id='demo'>Until Next Round! </h3>"; 

	
 

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