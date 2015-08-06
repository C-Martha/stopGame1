<?php
    
    
      session_start(); 
    
	//file to contain to database
require_once 'login.php';
require_once 'tracker.php';

  
$name = $_POST['name']; 
$country = $_POST['country']; 
$color = $_POST['color']; 
$fruit = $_POST['fruit']; 
$animal = $_POST['animal']; 
$thing = $_POST['thing']; 
$sport = $_POST['sport']; 



$playerID = $_SESSION['username'];
$code = $_SESSION['code']; 
$letter = $_SESSION['letter'];
 

//insert data into database 
$sql = "UPDATE Answers SET name = '{$name}', country = '{$country}', animal = '{$animal}', fruit = '{$fruit}', sport = '{$sport}', color = '{$color}', thing = '{$thing}', stop = '1'
WHERE playerID= '{$playerID}' AND code= '{$code}' "; 


//check if submition was successfull
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}







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
              AND playerID != '{$playerID}'  AND name = '{$name}' ";
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
              AND playerID != '{$playerID}'  AND thing = '{$thing}' ";
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
    echo "0 results";

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
    echo "0 results";
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
    echo "0 results";
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
    echo "0 results";
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
    echo "0 results";
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
    echo "Error: " . $sql . "<br>" . $conn->error;
}







    $conn->close();
    
    ?>
