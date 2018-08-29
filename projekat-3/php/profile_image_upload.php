<?php
	include 'functions.php';
	
	$return_array = ['success' => '', 'error' => ''];
    
    if (isset($_FILES['image'])) {
        $path = '../img/';
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file = $path . $file_name;
        if(move_uploaded_file($file_tmp, $file)) {
			$users = get_data('users');
			if(!empty($users['data'])) {
				foreach ($users['data'] as $key => $value) {					
					if($value->id == $_GET['user_id']) {
						$users['data'][$key]->image = $file_name;
					}
				}
			}
			$jsonData = json_encode($users['data']);
			file_put_contents('../data/users.json', $jsonData);
			
			// Return success message
			$return_array['success'] = 'User profile image updated.';
        } else {
        	$return_array['error'] = 'There was error during uploading image.';
        }
    } else {
    	$return_array['error'] = 'Please select image file.';
    }

    // Convert array to json and send it to frontend
	echo json_encode($return_array);