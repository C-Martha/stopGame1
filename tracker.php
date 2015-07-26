<?php 

//file to connect to databse


	



	require_once 'login.php';





	if(isset($_SESSION['username']))

	{

		$code = $_SESSION['code'];
		
		$user = $_SESSION['username'];

		$loggedin = TRUE;

		$userstring = "$user";

	}

	else

	{ 

		$loggedin = FALSE;

	}

?>


