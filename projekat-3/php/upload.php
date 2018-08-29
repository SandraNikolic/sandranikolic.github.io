<?php
	include 'functions.php';
	
	$return_array = ['success' => '', 'error' => ''];
    
    if (isset($_FILES['image'])) {
        $path = '../img/';
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file = $path . $file_name;
        if(move_uploaded_file($file_tmp, $file)) {
        	$image = [
	        	'id' => uniqid(),
	        	'name' => $file_name,
	        	'link' => $file,
	        	'user_id' => $_GET['user_id'],
	        	'date_uploaded' => date('d/m/Y H:i:s'),
	        	'private' => $_GET['private'],
	        	'timestamp' => $_GET['timestamp']
	        ];

			$response = add_data('images', $image);
	
			// Return success message
			$return_array = $response;
        } else {
        	$return_array['error'] = 'There was error during uploading image.';
        }
    } else {
    	$return_array['error'] = 'Please select image file.';
    }

    // Convert array to json and send it to frontend
	echo json_encode($return_array);