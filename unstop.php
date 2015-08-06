<?php
	
	require_once 'login.php';
	require_once 'tracker.php';
	
	$sql = "UPDATE game SET stop = '0' WHERE code = '{$code}' "; 
	
	
	?>