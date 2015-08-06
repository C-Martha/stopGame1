
<?php
    
    
        session_start(); 
        
        
    require_once 'login.php';
require_once 'tracker.php';

$code = $_SESSION['code']; 




     
 $query = "SELECT userID FROM leaderboard WHERE code = 'ZTqQb' ";
    $Presentresult = $conn->query($query); 
 $num = $Presentresult->num_rows;
 
 echo $num;

?>


<!DOCTYPE html>
<html>
	<head>
		
		
</head>
<body>





</body>
</html>