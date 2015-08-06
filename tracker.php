<?php 

//file to connect to databse


	



	require_once 'login.php';





	if(isset($_SESSION['username']))

	{

		$code = $_SESSION['code'];
		
		$user = $_SESSION['username'];

		$loggedin = TRUE;

		$userstring = "$user";
		
		$totalP = $_SESSION['players']; 
		
		$counter = $_SESSION['counter']; 
		
		//$letter = $_SESSION['letter']; 

	}

	else

	{ 

		$loggedin = FALSE;

	}

?>


