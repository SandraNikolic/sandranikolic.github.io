<?php
	function get_data($filename) {
		// Declaring return array
		$return_array = ['data' => ''];

		// Declaring json file path
		$json_file = '../data/' . $filename . '.json';

		// Get content from json file and convert it to array
		$results = json_decode(file_get_contents($json_file));

		// Check if results data exists
		if(!empty($results)) {
			$return_array['data'] = $results;
		}
		
		// Convert array to json and return it
		return $return_array;
	}

	function add_data($filename, $data) {
		// Declaring return array
		$return_array = ['success' => ''];

		// Declaring users json file path
		$json_file = '../data/' . $filename . '.json';
		$inp = file_get_contents($json_file);

		// If json file is empty add status data else append status data to existing array
		if($inp == '') {
			$tempArray[] = $data;
		} else {
			$tempArray = (array) json_decode($inp);
			array_push($tempArray, $data);
		}
		// Convert array to json data and write it to users json file
		$jsonData = json_encode($tempArray);
		file_put_contents($json_file, $jsonData);

		// Return success message
		$return_array['success'] = 'Data added.';
		
		// Convert array to json and send it to frontend
		return $return_array;
	}
?>