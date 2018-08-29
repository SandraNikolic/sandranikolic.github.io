<?php
	include 'functions.php';

	// Accessing users data sent from frontend
	$user = (array) json_decode(key($_POST));
	
	// Convert array to json and send it to frontend
	echo json_encode(add_data('users', $user));	
?>