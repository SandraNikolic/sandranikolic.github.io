<?php
	include 'functions.php';

	// Accessing users data sent from frontend
	$status = (array) json_decode(key($_POST));
	
	// Convert array to json and send it to frontend
	echo json_encode(add_data('statuses', $status));
?>